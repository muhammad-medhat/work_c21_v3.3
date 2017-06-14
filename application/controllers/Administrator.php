<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends Admin_Controller {

  function __construct(){
    parent::__construct();
    $this->output->enable_profiler(false);

    $this->load->model( array( 'item_model', 
      'stock_model', 'stock_items_model', 
        'deffered_item_model', 'order_admin_model') );

    $this->stock_items_table = $this->db->dbprefix(stock_items_table);

     $this->data['sidebar'] = 'app/admin/settings/sidebar';
    
  }

  function index(){
     $this->data['subtitle'] = 'ادارة النظام';

      $this->sales_invoices();
      $this->reorder_items();
      $this->stock_items();

    $this->data['main_content'] = $this->admin_view .'index';
    $this->load->view("$this->template", $this->data);
  }

  function sales_invoices(){
    $date = date(date_format,strtotime("-1 days"));
    $this->data['sales'] = $this->order_admin_model->get_orders($date);

   // echo "<div class='query'>" .$this->db->last_query() ."</div>";
  }

  function reorder_items(){
    // show items less than the reorder level
    
    $this->data['items'] = $this->stock_items_model->get_items_reorder_level_limit();

    //$this->load->view('app/admin/dashboard/reorder_level', $this->data, false);

  }

  function stock_items(){
    //show deffered items to deduct from the stock in the current shift
    $this->data['stock_items'] = $this->deffered_item_model->get_top_deffered_items();

 //   echo "<div class='query'>" .$this->db->last_query() ."</div>";
  }
    

}
