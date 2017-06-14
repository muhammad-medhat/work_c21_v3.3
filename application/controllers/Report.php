<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends Frontend_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model(array('order_model', 'shift_model', 'table_model'));
    
    $this->views_folder = 'app/reports/';
    $this->data['sidebar'] = $this->views_folder .'sidebar';
    
    $this->load->library('unit_test');
  }

	public function index()
	{
    $this->data["subtitle"] = 'تعديل تصنيفات القائمة';
    
    $this->data['main_content'] = $this->views_folder .'index';
    $this->load->view($this->template, $this->data);

	}

  function _display_view($view, $subtitle){
    $this->data["subtitle"] = $subtitle;
    $this->data['main_content'] = $this->views_folder .$view;
    $this->load->view($this->template, $this->data);
  }

  function users(){

    $this->data['users'] = $this->user_model->get();
    $this->_display_view('users', 'تقرير المستخدمين');
  }
  
  function details(){
    $shift_id = $this->input->post('shift_id');
    if (!empty($shift_id)) {
      $this->data['shift'] = $this->shift_model->get($shift_id);
      $this->data['details'] = $this->shift_model->get_shift_details($shift_id);
      $this->data['shift_orders'] = $this->shift_model->get_orders($shift_id);
    }
    $this->data['shifts'] = $this->shift_model->get_limit_shifts();

    $this->_display_view('details', 'تقرير وردية مفصل');
  }


  function tables(){
    $this->_display_view('tables', 'تقرير مبيعات الترابيزات');
  }

  function simple(){
    $shift_id = $this->input->post('shift_id');
    if (!empty($shift_id)) {
      $this->data['shift'] = $this->shift_model->get($shift_id);
      $this->data['details'] = $this->shift_model->get_shift_details($shift_id);
    }
    $this->data['shifts'] = $this->shift_model->get_limit_shifts();
    echo $this->db->last_query();
    $this->_display_view('simple', 'تقرير وردية مختصر');
  }

  function simple_print($shift_id){

      $this->data['shift'] = $this->shift_model->get($shift_id);
      $this->data['details'] = $this->shift_model->get_shift_details($shift_id);

    $this->load->view($this->views_folder .'print_simple_shift', $this->data);    
  }


  function show_order($order_id){
    $this->data['subtitle'] = 'الطلبات';
    //$this->data['sidebar'] = 'app/orders/sidebar';
    
    $order = $this->order_model->get($order_id);//var_dump($order);
    $table = $this->table_model->get($order->customer_id);
//
    if($order){
        $order_details = $this->order_details_model->get_order_details($order_id);
    
        $this->data['order']          = $order;
        $this->data['order_id']       = $order_id;    
        $this->data['table']          = $table;
        //$this->data['tables']         = $this->table_model->get_free();
        $this->data['order_details']  = $order_details;
        $this->data['main_content']   = 'app/orders/show_order';
      }
    $this->load->view($this->template, $this->data);  
  }



}
