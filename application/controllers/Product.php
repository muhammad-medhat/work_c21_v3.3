<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Frontend_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('item_model');
    $this->load->model('product_items_model');
    $this->products_items_table = $this->db->dbprefix(products_items_table);
    $this->data['sidebar'] = 'app/products/sidebar';
  }

	public function index()
  {
    $this->products();
	}

  public function ajax_category_products($cat_id){
    $data['products'] = $this->product_model->get_category_products($cat_id);
    echo $this->load->view('app/products/c_products', $data, true);
  
  }
  ################################################################################################yypppp
  ################################################################################################yypppp
  ################################################################################################yypppp
 
  public function products($offset = 0){
    $num_rows = $this->db->get($this->products_table)->num_rows();
    //$limit = general_limit;
    $limit = (int)$this->data['settings']['general_limit'];


    $offset = ($offset != 0)?$this->uri->segment(3):0;
    
    $this->paginate($num_rows, 3, 'product/products');
   
      $this->data['products'] = $this->db->limit($limit, $offset)
                                          ->order_by('cat_id')
                                        ->get($this->products_table)
                                        ->result();

    $this->data["subtitle"] = 'تعديل تصنيفات القائمة';
    $this->data["main_content"] = 'app/products/products_edit';
    $this->load->view($this->template, $this->data);
  }

  function show_product($id = 0){
    if( (int)$id == 0 )
      $id = $this->db->select_min('id')->get($this->products_table)->row()->id;
    $p = $this->product_model->get($id);

        $uri_segment = 3;
    $base_url = "product/show_product/";
    $num_rows = $this->product_model->num_rows();
    $limit=1;   
    $offset = $this->uri->segment($uri_segment);


        $this->paginate($num_rows, 3, $base_url, $limit);


    $this->data['items'] = $this->product_model->get_product_items($id);//echo $this->db->last_query();
    $this->data['items_ids'] = simple_array($this->data['items'], 'item_id');
    $this->data['all_items'] = $this->item_model->get_items_categories();
    $this->data["product"] = $p;

    //$this->data['assigned_items'] = $this->product_model->get_product_items($id);
    $this->data["subtitle"] = "بيانات المنتج ( $p->arabic )";
    $this->data["main_content"] = 'app/products/show_product';
    $this->load->view($this->template, $this->data);
  }

  public function add_category(){
    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'اسم القائمة', 'required');
      if($this->form_validation->run() ==true){
        $name =  $this->input->post('name');
        $this->product_model->add_category(array('arabic'=>$name));
      }
    } 
    $this->display_view('app/products/categories_add', 'اضافة قائمة');
  
  }

  public function add()
  {
    $this->data['categories'] = simple_array($this->product_model->get_categories(), 'arabic');
    $this->data['products'] = $this->product_model->get();
    $this->data['subtitle'] = 'اضافة منتج جديد';
    $this->data["main_content"] = 'app/products/add_product';
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
  ########################################## CATEGORIES######################################################yypppp
 public function categories()
  {
    $num_rows = $this->db->get($this->categories_table)->num_rows();
    //var_dump($this->data['settings']['general_limit']->value);
    $limit = (int)$this->data['settings']['general_limit'];
    $offset = $this->uri->segment(3);

        $this->paginate($num_rows, 3, 'product/categories');
    $this->data['categories'] = $this->db->limit($limit,$offset)->get($this->categories_table)->result();
    $this->data["subtitle"] = 'تعديل تصنيفات القائمة';
    $this->data["main_content"] = 'app/products/categories_edit';
    $this->load->view($this->template, $this->data);
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
################################ MAIN PRODUCTS PAGE ###################################3
#######################################################################################3
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
  ####################### edit product items###########################
  #####################################################################
  function show_item_window($product_id, $item_id){
    $product_item_obj = $this->product_model->get_product_item($product_id, $item_id);
    $this->data['item'] = $product_item_obj[0];
    $this->data['product_id'] = $product_id;
    echo $this->load->view('app/products/items_div', $this->data, true );
    //var_dump($product_item_obj);
  }
  function unassign($product_id, $item_id){
    // removes the record that assignes item with product from db
    $this->product_model->unassign($product_id, $item_id);
  }
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
#######################################################################
function change_price(){

    //var_dump($_POST);
      switch(true){

         case  $this->input->post('submit') !='' :
         $temp = array();

      
            $this->form_validation->set_rules('opration', 'عملية الحساب', "required");
            $this->form_validation->set_rules('val', 'قيمة السعر', 'required|is_numeric');
            
            if($this->form_validation->run() != false) {
              $op = $this->input->post('opration');
              $val = $this->input->post('val');
              $per = $this->input->post('per');

               $this->product_model->temp_products();
               $this->product_model->fill_data();
               $temp_products = $this->product_model->get_temp();
    
               foreach ($temp_products as $p) {
                 if($per){
                   $new_price = round($this->calc($p->price, $p->price * $val / 100, $op), 2); 
                 } else{
                   $new_price = round($this->calc($p->price, $val, $op), 2); 
                 }
                 $this->product_model->update_temp($p->id, $new_price);
                 $prod = $this->product_model->get_temp_product($p->id);
                 //echo $this->db->last_query(). '<br />';
                 $temp[] = $prod; 
               }
            }
         
         break;

         case  $this->input->post('update') != '': 
            $temp = array();

            $temp = $this->product_model->get_temp();
            foreach ($temp as $p) {
              $this->product_model->apply_changes($p->id, $p->new_price);
            }
            $this->product_model->end_temp('temp_products');
            $temp = $this->product_model->get(); // to get the updated products
            $this->data['done_update'] = true;
            break;

         default: break;
      }

    (isset($temp))? $this->data['temp'] =  $temp: $this->data['temp'] = null;

    $this->display_view('app/products/products_price', 'تعديل اسعار المنتجات');
  }

  function apply_updates(){}

  function calc($original,$val, $op){
   // echo "$original __ $op __ $val <br>";
          switch ($op) {
          case '1' : // +
            $res = $original + $val;
            break;
          case '2': // -
            $res = $original - $val;
            break;
          case'3': // *
            $res = $original * $val;
            break;
          case '4' : // ÷
            $res = $original / $val;
            break;
          default:
            $res='0';
            break;
          }
          return my_round($res);

  }

}
