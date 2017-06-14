<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends Admin_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model(array('item_model', 'stock_model', 'stock_items_model'));
    $this->items_categories_table = $this->db->dbprefix(items_categories_table);
    $this->data['sidebar'] = 'app/admin/items/sidebar';
  }

	public function index()
  {
    $this->all();
    /* KEEP THIS
    $this->data['categories'] = $this->item_model->get_categories();
    $this->data["subtitle"] = 'الخامات';
    $this->data["main_content"] = 'app/admin/items/index';
    $this->load->view($this->template, $this->data);
     */
  }

  function ajax_showitem($item_id, $stock_id){
    $item = $this->item_model->get_item_info($item_id, $stock_id);
    $ret = "<div>$item->name</div>";
    $ret .= "<div>الكمية: $item->current_qty</div>";
    echo $ret;
  }

  public function all(){
    //shows all items in the currenrt stocks
    $stock_id = (int)$this->data['settings']['stock'];
    
    $num_rows = $this->stock_items_model->get_all_items(array('stock_id'=>$stock_id, 'num'=>true));
    
    $per_page = (int)$this->data['settings']['general_limit'];
    $offset = $this->uri->segment(4);


      $this->paginate($num_rows, 4,'admin/item/all/', $per_page  );


    $items = $this->stock_items_model->get_all_items(array('stock_id'=>$stock_id, 'limit'=>$per_page, 'offset'=>$offset));
    
//      $this->data['items'] = $this->db->limit($per_page, $offset)->get($this->items_table)->result();
      $this->data['items'] = $items;//$this->item_model->get_items( $per_page, $offset);

      $this->data['stock_name'] = $this->stock_model->get($stock_id)->name;
      $this->data['num_rows'] = $num_rows;
      $this->data['subtitle'] = $this->lang->line('items') ."($num_rows)";
      $this->data["main_content"] = 'app/admin/items/all';
    $this->load->view($this->template, $this->data);
      
  }


  public function category_items($_cat_id)
  {
    $category = $this->item_model->get_category($_cat_id);

    $this->data['category'] = $category;
    $this->data['items'] = $this->item_model->get_category_items($_cat_id);
    $links = array(
      'الخامات'=>'admin/item' 
      
    );
    $subtitle = create_urls($links,">");
    $num_rows = $this->item_model->num_category_items($_cat_id);
    $this->data['subtitle'] = $subtitle ." $category->name ($num_rows)";
    $this->data['num_rows'] = $num_rows;
    $this->data["main_content"] = 'app/admin/items/category_items';
    $this->load->view($this->template, $this->data);
  }

  function new_item(){
    //$this->data['categories'] = $this->item_model->get_categories_ddl();
    $this->data['categories'] = array('...', simple_array($this->item_model->get_categories() ));
    $this->data['units'] = $this->item_model->get_units_ddl();
    $links = array(
      'المخازن'=>'admin/inventory', 
      'قائمة المخازن'=>'admin/inventory/stock_list'
    );
    $subtitle = create_urls($links,">");
    
    $this->data["subtitle"] = $subtitle .'اذن وارد';
    $this->data["main_content"] = 'app/admin/items/new_item';
    $this->load->view($this->template, $this->data);
  }

  function update_items($cat_id){
   
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name[]', 'الاسم', "required");
    $this->form_validation->set_rules('reorder[]', 'حد الطلب', "required|is_numeric");
    //$this->form_validation->set_rules('new_qty[]', 'الكمية المضافة', "required|is_numeric");
    
    if($this->form_validation->run() != false) {
        
       foreach($this->input->post('pid', true) as $k=>$v){
         $item = $this->item_model->get($v);

         $data = array(
          items__name=>$this->input->post("name[$k]"), 
          items__reorder_level=>$this->input->post("reorder[$k]")
        );
         $this->item_model->save($data, $v);
       }
       $this->session->set_flashdata('message', 'تم تسجيل الخامة');
       $this->category_items($cat_id);
       
    }else{
      $this->category_items($cat_id);
    }
  }


  function new_item_add(){
    /*
     * perform validation
     * add the new item
     * */
        $this->load->library('form_validation');

    $rules = $this->item_model->new_rules;
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()){
      //var_dump($this->input->post(null, true) );

      $item = $this->item_model->array_from_post(
        array(
          items__name,
          items__desc,
          items__reorder_level,
          items__item_category,
          items__item_unit
        )
      );
    $this->item_model->save($item);
      $this->session->set_flashdata('message', 'تم تسجيل الخامة');
      $this->new_item();

    }else{
        $this->new_item();
    }
  }


  function categories(){
    $this->data['categories'] = $this->item_model->get_categories();

    $this->data["subtitle"] = 'تصنيفات الخامات';
    $this->data["main_content"] = 'app/admin/items/categories';
    $this->load->view($this->template, $this->data);  
  }

  function add_edit(){
    foreach($this->input->post('name') as $k=>$v){
        $id = $this->input->post("cat_id[$k]");
        $this->db->where('id',$id)
          ->update($this->items_categories_table, array('name'=> $v));

        //echo "<div class='query'>" .$this->db->last_query() ."</div>";
    }

        $new = $this->input->post('new');
        if($new !='')
          $this->db->insert( $this->items_categories_table, array('name'=> $new) );

        //echo "<div class='query'>=====" .$this->db->last_query() ."</div>";
        $this->categories();
  }

  function increment(){
      /*not implemented yet*/
    $this->items = $this->item_model->get();
    $this->data["main_content"] = 'app/items/items_increment';
    $this->load->view($this->template, $this->data);
  
  }
  function decrement(){}

}
?>
