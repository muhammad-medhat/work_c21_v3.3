<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends Admin_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model(
      array('item_model', 'stock_model', 'stock_items_model', 'transaction_model')
    );
    $this->items_transactions_table = $this->db->dbprefix(items_transactions_table);
    $this->stock_items_table = $this->db->dbprefix(stock_items_table);
    $this->items_categories_table = $this->db->dbprefix(items_categories_table);

     $this->data['sidebar'] = 'app/admin/settings/sidebar';
    
  }

  public function index(){

    $num_rows = $this->transaction_model->num_rows();
    $per_page = (int)$this->data['settings']['general_limit']->value;

    $this->load->library('pagination');

    $offset = $this->uri->segment(4);

      $config['base_url']     = site_url('admin/transaction/index/'  );
      $config['total_rows']   = $num_rows;
      $config['per_page']     = $per_page;
      $config['uri_segment']  = 4;
      $this->pagination->initialize($config);
      $this->data['pagination'] = $this->pagination->create_links();

      $this->data['transactions'] = $this->transaction_model->get_limit($per_page, $offset);

      $this->data["subtitle"] = 'عمليات المخزن';
      $this->data["main_content"] = 'app/admin/transactions/index';
    $this->load->view($this->template, $this->data);
  }


  function import(/*import from stock*/$id){

    $this->data['items'] = simple_array_comp( $this->stock_model->get_items_categories_stock($id),'category_name', 'item_name' );
    
    $stock = $this->stock_model->get($id);
    $this->data['stock'] = $stock;
    $stocks = simple_array($this->stock_model->get());
    unset($stocks[$id]);

    $this->data['stocks'] = $stocks;
    $links = array(
      'المخازن'=>'admin/inventory', 
      'قائمة المخازن'=>'admin/inventory/stock_list',
      $stock->name=>'admin/inventory/stock/' .$stock->id
    );
    $subtitle = create_urls($links,">");


    $this->data['subtitle'] = $subtitle .' صرف من '.$this->data['stock']->name;
    $this->data['main_content'] = $this->admin_view .'stocks/import';
    $this->load->view("$this->template", $this->data);
  }

  function importing(){
        $this->load->library('form_validation');
        $rules = $this->stock_items_model->import_rules;
        $this->form_validation->set_rules($rules);
        
        
       $post_arr = $this->input->post(null, true);
       $exceptions = array('submit', 'stock');
       $ins_arr = _remove_items($exceptions, $post_arr);
       
       $stock_from = $post_arr['stock_id'];
       $stock_to = $post_arr['stock'];
       $item_id = $post_arr['item_id'];
       $qty = $post_arr['qty'];
       $type=$post_arr['type'];

       $stock_item_from = $this->stock_items_model->get_record($item_id, $stock_from);
$transaction_type = $this->transaction_model->get_type($type);

    $notes = "$transaction_type->name;";
    $notes .= $this->item_model->get($stock_item_from->item_id)->name .';';
    $notes .= $this->stock_model->get($stock_item_from->stock_id)->name .';';
    $notes .= $qty .';';
      $ins_arr['notes']=$notes;
    
// validation
    if($this->form_validation->run()){

       $this->db->trans_start();
       
       $this->stock_items_model->move_to_stock($item_id, $qty, $stock_from, $stock_to);
       $this->transaction_model->save($ins_arr); 

      $this->db->trans_complete();


       //redirect("admin/inventory/stock/" .$post_arr['stock']);
       $this->import($stock_from);
    }else{
      //$this->db->trans_rollback();
      
      $this->import($stock_from);
    }

  }

  function check_qty(){
    $this->form_validation->set_message('check_qty', 'كمية غير كاقية"');
    $item_id = $this->input->post('item_id');
    $stock_from = $this->input->post('stock_id');
    $stock_to = $this->input->post('stock');
    $qty = $this->input->post('qty');

       $stock_item_from = $this->stock_items_model->get_record($item_id, $stock_from);
       $stock_item_to = $this->stock_items_model->get_record($item_id, $stock_to);
       if( $stock_item_from->current_qty>=$qty ){
      return true;
    }
    return false;
  }
  
  function check_item($item_id){
    //check if item exists
    $stock_id =  $this->input->post('stock_id');
       $stock_item_from = $this->stock_items_model->get_record($item_id, $stock_id);
    return $stock_item_from != null;
  }
         



   // return false;
  }

  function paginate(){
  //apply in model
  }



?>
