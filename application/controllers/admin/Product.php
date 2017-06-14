<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Admin_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('item_model');
    $this->load->model('product_items_model');
    $this->products_items_table = $this->db->dbprefix(products_items_table);
     $this->data['sidebar'] = 'app/admin/products/sidebar';
    
  }

	public function index()
  {
    $this->data['subtitle'] = 'المنتجات';
    $this->data["main_content"] = 'app/admin/products/index';
    $this->load->view($this->template, $this->data);
	}

  public function ajax_category_products($_cat_id)
  {
    $data['category'] = $this->product_model->get_category($_cat_id);
    $data['products'] = $this->product_model->get_category_products($_cat_id);
    echo $this->load->view('app/admin/products/category_products', $data, true);
  }
  public function ajax_cat_products($cat_id){
    $data['products'] = $this->product_model->get_category_products($cat_id);
    echo $this->load->view('app/products/c_products', $data, true);
  
  }

  public function category_products($_cat_id)
  {
    $this->data['category'] = $this->product_model->get_category($_cat_id);
    $this->data['products'] = $this->product_model->get_category_products($_cat_id);
    $this->data["main_content"] = 'app/products/category_products';
    $this->load->view($this->template, $this->data);
  }

  public function categories()
  {
    $num_rows = $this->db->get($this->categories_table)->num_rows();
    //var_dump($this->data['settings']['general_limit']->value);
    $limit = (int)$this->data['settings']['general_limit'];
    $offset = $this->uri->segment(4);

        $this->paginate($num_rows, 4, 'admin/product/categories');
    $this->data['categories'] = $this->db->limit($limit,$offset)->get($this->categories_table)->result();
    $this->data["subtitle"] = 'تعديل تصنيفات القائمة';
    $this->data["main_content"] = 'app/admin/products/categories_edit';
    $this->load->view($this->template, $this->data);
  }
  
  public function products($offset = 0){
    $num_rows = $this->db->get($this->products_table)->num_rows();
    //$limit = general_limit;
    $limit = (int)$this->data['settings']['general_limit'];//->value;


    $offset = ($offset != 0)?$this->uri->segment(4):0;
    
    $this->paginate($num_rows, 4, 'admin/product/products');
   
      $this->data['products'] = $this->db->limit($limit, $offset)
                                          ->order_by('cat_id')
                                        ->get($this->products_table)
                                        ->result();

    $this->data["subtitle"] = 'تعديل تصنيفات القائمة';
    $this->data["main_content"] = 'app/admin/products/products_edit';
    $this->load->view($this->template, $this->data);
  }
  function next_product(){}
    
    function show_product($id = 0){
    if( (int)$id == 0 )
      $id = $this->db->select_min('id')->get($this->products_table)->row()->id;
    $p = $this->product_model->get($id);
    //$p = arr_search($this->data['products'], $id);
//var_dump($p);
        $uri_segment = 4;
    $base_url = "admin/product/show_product/";
    $num_rows = $this->product_model->num_rows();
    $limit=1;   
    $offset = $this->uri->segment($uri_segment);


        $this->paginate($num_rows, 4, $base_url, $limit);


    $this->data['items'] = $this->product_model->get_product_items($id);//echo $this->db->last_query();
    $this->data['items_ids'] = simple_array($this->data['items'], 'item_id');
    $this->data['all_items'] = $this->item_model->get_items_categories();
    $this->data["product"] = $p;

    //$this->data['assigned_items'] = $this->product_model->get_product_items($id);
    $this->data["subtitle"] = "بيانات المنتج ( $p->arabic )";
    $this->data["main_content"] = 'app/admin/products/show_product';
    $this->load->view($this->template, $this->data);
  }

  function categories_arr()
  {
    /*
     * This function is to return 
     * list of categories as array
     * */
    return $this->product_model->get_categories_ddl();
  }

  public function add()
  {
    $this->data['categories'] = simple_array($this->product_model->get_categories(), 'arabic');
    $this->data['products'] = $this->product_model->get();
    $this->data['subtitle'] = 'اضافة منتج جديد';
    $this->data["main_content"] = 'app/admin/products/add_product';
    $this->load->view($this->template, $this->data);
  }

  public function adding()
  {
    $this->form_validation->set_rules('arabic', 'الاسم بالعربية', "required");
    $this->form_validation->set_rules('name', 'الاسم بالانجليزية', "required");
    $this->form_validation->set_rules('price', 'السعر', 'required|is_numeric');
    $this->form_validation->set_rules('cat_id', 'تصنيف', 'required|not_zero');
    
    if($this->form_validation->run() != false) {


      $post_arr = $this->product_model->array_from_post( array('arabic', 'name', 'price', 'cat_id') );
      $this->product_model->save($post_arr);
      $this->session->set_flashdata('message', 'تم تسجيل بيانات المنتج');

      $this->add();
    } else {
      $this->add();
    }
  }
  function update_products($cat_id){
        $this->load->library('form_validation');
    $this->form_validation->set_rules('name[]', 'الاسم بالانجليزية', "required");
    $this->form_validation->set_rules('arabic[]', 'الاسم', "required");
    $this->form_validation->set_rules('price[]', 'السعر', 'required|is_numeric');
    if($this->form_validation->run() != false) {


       $this->db->trans_start();

       foreach($this->input->post('pid', true) as $k=>$v){
         
         
         $this->db->where('id', $v)
           ->update($this->products_table, array(
             'name'   => $this->input->post("name[$k]"), 
             'arabic' => $this->input->post("arabic[$k]"), 
             'price'  => $this->input->post("price[$k]"),
             'desc'   => $this->input->post("desc[$k]")
           ));
      }
       $this->db->trans_complete();
       $this->index();
      //redirect('admin/product');
      }else{
        //$this->category_products($cat_id);
        $this->index();
      }
  }
  function assign_item_grid1($pid=0)
  {
    if( (int)$pid == 0 )
      $pid = $this->db->select_min('id')->get($this->products_table)->row()->id;
    $this->data['product'] = $this->product_model->get($pid);
    
    echo"<table>";
    foreach($this->data['products'] as $p)
    {
      echo"<tr><td>$p->id</td><td>$p->arabic</td><td>$p->cat_id</td></tr>";
    }
    echo"</table>";
  }

  function assign_item_grid($pid=0){
    if( (int)$pid == 0 )
      $pid = $this->db->select_min('id')->get($this->products_table)->row()->id;
    //$this->data['product'] = $this->product_model->get($pid);
    $this->data['product'] = arr_search($this->data['products'], $pid);

    
    $this->data['items'] = $this->product_model->get_product_items($pid);
    $this->data['all_items'] = $this->item_model->get_items_categories();
    
     
    $this->load->library('pagination');
  
    $uri_segment = 4;
    $base_url = "admin/product/assign_item_grid/";
    $num_rows = $this->product_model->num_rows();
    $limit=1;   
    $offset = $this->uri->segment($uri_segment);


        $this->paginate($num_rows, 4, $base_url, $limit);

//var_dump($this->pagination);
     $this->data['subtitle']  = "تعيين خامات للمنتجات";

    $this->data["main_content"] = 'app/admin/products/assign_item';
    $this->load->view($this->template, $this->data);
  }
/*********************
  function assign_item_preview(){
    $this->data['items'] = $this->item_model->get();


    $this->data['products_items'] = $this->db->get($this->products_items_table)->result();
    $this->data["main_content"] = 'app/products/assign_item_preview';
    $this->load->view($this->template, $this->data);

    //$this->product_model->assign_item($pid, $item_id, $amount);
  }
  ************************/
  function show_item_window($product_id, $item_id){
    $product_item_obj = $this->product_model->get_product_item($product_id, $item_id);
    $this->data['item'] = $product_item_obj[0];
    $this->data['product_id'] = $product_id;
    echo $this->load->view('app/admin/products/items_div', $this->data, true );
    //var_dump($product_item_obj);
  }

  function assigning(){
    
       foreach($this->input->post('pid', true) as $k=>$v){
         
         $data = array(
           products_items__product_id=>(int)$this->input->post("product_id[$k][$v]"),
            products_items__item_id=>(int)$this->input->post("item_id[0][$k]"),
            products_items__amount=>$this->input->post("amount['$k']")
          );
         //var_dump($data);
         $this->db->insert($this->products_items_table, $data);
       }
  }
  /*****************************************
  function assign1111111111111(){
    //$this->make_table($this->input->post(null, true));
        $this->load->library('form_validation');

    $this->form_validation->set_rules('amount[]', 'الكمية', "required|is_numeric");
      $pid = $this->input->post('product');
    
    if($this->form_validation->run() != false) {
    
      foreach( $this->input->post('item_id', true) as $k=>$v ){
        $this->product_model->assign_item(
          $pid, 
          $this->input->post("item_id[$k]"),
          $this->input->post("amount[$k]")
        ) ;
      }
      $this->session->set_flashdata('message', 'done');
      $this->assign_item_grid($pid);
    }else{$this->assign_item_grid($pid);}
  }
  ********************************************/



  function assign_ajax($product_id, $item_id){
    $this->product_model->assign_item($product_id, $item_id, 0.1);
    echo $this->db->last_query();
  }

  function assign($product_id, $item_id){
    $this->form_validation->set_rules('amount', 'الكمية', "required|is_numeric");

    if($this->form_validation->run() != false) {
        $this->product_model->assign_item($product_id, $item_id, $this->input->post('amount'));
    }
        $this->show_product($product_id);
  }

  function unassign($product_id, $item_id){
    // removes the record that assignes item with product from db
    $this->product_model->unassign($product_id, $item_id);
  }
/************************************
  function ajax_product_items($pid){
    $items = $this->product_model->get_product_items($pid) ;
    $ret = '';
    if($items!=0){
      foreach ($items as $key) {
        $ret .= "<tr><td>$key->name</td> <td>$key->amount</td></tr>";
      }
    }
    echo $ret;
  }
  ************************************/
  function ajax_assign($pid, $iid, $amount){}

  function add_edit(){
    $this->data['categories'] = $this->db->limit(5,1)
      ->get($this->categories_table)->result();
    $this->data['products'] = $this->db->limit(2,1)
      ->get($this->products_table)->result();
    $this->data['main_content'] = 'app/products/add_edit';
    $this->load->view($this->template, $this->data);
  }
  function editing_products($offset=0){

   //var_dump($this->input->post(null, true));
    foreach ($this->input->post('pid', true) as $key=>$val) {
      $p_data = array(
        'name'   => $this->input->post("pname[$key]"),
        'arabic' => $this->input->post("parabic[$key]"),
        'price'  => $this->input->post("price[$key]")
      );
      $this->db->where('id', $val);
      $this->db->update($this->products_table, $p_data);
      //echo'<div>' .$this->db->last_query() .'</div>';
    }
    $this->products($offset);
  }

  
  function editing(){
    
    foreach ($this->input->post('cid', true) as $key=>$val) {
      $cat_data = array(
        'name' =>$this->input->post("cname[$key]"),
        'arabic' =>$this->input->post("carabic[$key]")
      );
      $this->db->where('id', $val);
      $this->db->update($this->categories_table, $cat_data);
      //echo "<div class='query'>" .$this->db->last_query() ."</div>";
    }
    $this->categories();
    //$this->add_edit();
  }

  function product_info(){ }

  function inv_materials(){}

  function inv_increment($amount){}

  function make_table($array){
    echo '<table><tr>';
    foreach ($array as $key) {
      echo '<td>';
      var_dump($key);
      echo '</td>';
    }
    echo '</tr></table>';
  }

  function delete($id){
    $this->product_model->delete($id);
    echo $this->db->last_query();
  }

  function delete_product_items($id){
    //deletes the association between product and items
    $this->product_items_model->delete_product_item($id);
  }

  function test_p($pid){
 
    $uri_segment = 4;
    $base_url = "admin/product/test_p/";
    $num_rows = $this->product_model->num_rows();
    $limit=10;   
    $offset = $this->uri->segment($uri_segment);

     $this->paginate($num_rows, 4, $base_url, $limit);


    $this->data['products'] = array_slice($this->data['products'], $pid, $limit);

    $this->data["subtitle"] = 'test';
    $this->data["main_content"] = 'app/admin/products/temp/test';
    $this->load->view($this->template, $this->data);

  }

  function p_paginate($pid = 0){
    if( (int)$pid == 0 )
      $pid = $this->db->select_min('id')->get($this->products_table)->row()->id;
    $product = arr_search($this->data['products'], $pid);
    $items = $this->product_model->get_product_items($pid);
  }
}
