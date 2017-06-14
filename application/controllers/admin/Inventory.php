<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inventory extends Admin_Controller {

  function __construct(){
    parent::__construct();
    $this->output->enable_profiler(false);

    $this->load->model( array('stock_model', 'stock_items_model', 'item_model') );

    $this->stock_items_table = $this->db->dbprefix(stock_items_table);

    //$this->active_menu='inventory';

    $this->data['sidebar'] = 'app/admin/settings/sidebar';
  }

  function index(){
     $this->data['subtitle'] = 'اعدادات المخازن';

    $this->data['main_content'] = $this->admin_view .'stocks/dashboared';
    $this->load->view("$this->template", $this->data);
  }

  public function add()
  {
 
    $this->data['stocks'] = $this->stock_model->get();
    $this->data["subtitle"] = 'اضافة و تعديل المخازن';
      $this->data["main_content"] = 'app/admin/stocks/index';
    $this->load->view($this->template, $this->data);
  }
  function stock_list(){
      $this->data['stocks'] = $this->stock_model->get();

    $links = array(
      'المخازن'=>'admin/inventory' 
    );
    $subtitle = create_urls($links,">");
     $this->data['subtitle'] = $subtitle .' > قائمة الخازن';

    $this->data['main_content'] = $this->admin_view .'stocks/stock_list';
    $this->load->view("$this->template", $this->data);
  }

  function stock($id){
        /*
        $this->load->helper('datagrid');
        $this->load->helper('datagrid_details');

         $this->Datagrid = new Datagrid($this->stock_items_table,'id'); 
        $this->Datagrid_details = new Datagrid_details($this->stock_items_table,$this->items_table, 'item_id', 'stock_id'); 
         //var_dump($this->Datagrid_details);
        //$this->Datagrid->setHeadings(array('item_id'=>'item', 'stock_id'=>'stock'));
         echo $this->Datagrid->generate();
         echo $this->Datagrid_details->generate();
         echo Datagrid::createButton('delete','Delete');
         */
    $stock = $this->stock_model->get($id);
    $this->data['items'] = $this->stock_model->get_items($id);
    $links = array(
      'المخازن'=>'admin/inventory', 
      'قائمة المخازن'=>'admin/inventory/stock_list'
    );
    $subtitle = create_urls($links,">");
    $this->data['subtitle'] = $subtitle .$stock->name;
    $this->data['stock'] = $stock;
    $this->data['main_content'] = $this->admin_view .'stocks/stock_items';
    $this->load->view("$this->template", $this->data);

  }



  function new_stockitem($id){
    //add items from our system to the stock 
/*
    //load items not in the stock
    $this->data['items'] = simple_array_comp( $this->item_model->get_items_categories_stock($id, false),'category_name', 'item_name' );
 */
    $this->data['items'] = simple_array_cnt( 
      $this->item_model->get_items_categories(), 
      array( 'id', /*'category_name',*/  'item_name' ) 
    );

    //echo "<div class='query'>" .$this->db->last_query() ."</div>";
    $stock = $this->stock_model->get($id);
    $this->data['stock'] = $this->stock_model->get($id);

    $links = array(
      'المخازن'=>'admin/inventory', 
      'قائمة المخازن'=>'admin/inventory/stock_list',
      $stock->name=>"admin/inventory/stock/$stock->id"
    );
    $subtitle = create_urls($links,">");
    
    $this->data["subtitle"] = $subtitle .'اذن توريد';
    $this->data["main_content"] = 'app/admin/items/new_stockitem';
    $this->load->view($this->template, $this->data);
  }
    
  function new_stockitem_add(){
    var_dump($_POST);
    
    /*
     * perform validation
     * add the new item
     * */

        $this->load->library('form_validation');
    $rules = $this->stock_items_model->new_rules;
    $this->form_validation->set_rules($rules);
       $stock_id = $this->input->post('stock_id');
    
    if($this->form_validation->run()){
           

       //$stock_id = $this->input->post('stock_id');
       $item_id = $this->input->post('item_id');
       $qty = $this->input->post('current_qty');
         $arr = $this->item_model->array_from_post(array( 'stock_id', 'item_id', 'current_qty' ) );
       if($this->stock_items_model->check_item($item_id, $stock_id)){
         //echo"<h1>item exists and increasing$qty</h1>";
         $this->stock_items_model->increase_item($stock_id, $item_id, $qty);
       }
       else
         $this->stock_items_model->save($arr);
       //echo "<div class='query'>" .$this->db->last_query() ."</div>";
    
      $this->session->set_flashdata('message', 'تم تسجيل الخامة'.$this->db->last_query());
         $this->new_stockitem($stock_id);
    }else{
      $this->session->set_flashdata('error', 'error'.$this->db->last_query());
      $this->new_stockitem($stock_id);
    
    }
  }
}

/*

  public function manage111111111()
  {
        $this->load->library('form_validation');

    $this->form_validation->set_rules('name[]', 'الاسم', "required");
    
    if($this->form_validation->run() != false) {
      foreach ($this->input->post('stock_id') as $key=>$val) {
        $id = $val;
        $name = $this->input->post("name[$key]");
        $desc = $this->input->post("description[$key]");
        $this->stock_model->save(array('name'=>$name, 'description'=>$desc), $id);
      }
      $this->add();
    } else {
      $this->add();
    }
  }


 *
 *
 *
 *
 *
 *
 * */
