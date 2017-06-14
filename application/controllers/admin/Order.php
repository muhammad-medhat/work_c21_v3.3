<?php
//dont know what is the problem when using pagination
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {

  function __construct(){
    parent::__construct();
    //$this->output->enable_profiler(false);

    $this->load->model(array('order_admin_model', 'shift_model'));
    $this->data['sidebar'] = 'app/admin/orders/sidebar';


     $this->per_page = (int)$this->data['settings']['general_limit'];
  }

  function index(){
    $num_rows = $this->order_admin_model->get_orders_num();

      $this->paginate($num_rows, 4, 'admin/order/get_orders', $this->per_page);

    $this->data['orders'] = $this->order_admin_model->get_orders(array('limit'=>$this->per_page));
    //echo $this->db->last_query();
      $this->data['subtitle'] = 'الفواتير';
     $this->data['sidebar'] = 'app/admin/settings/sidebar';


    $shifts = $this->shift_model->get();
    $s = array();
    foreach ($shifts as $key) {
      $s[$key->id] = $key->id .' | ' .$key->date .' | ' .$key->username;
    }
    $this->data['shifts'] = $s;

    
    
    $this->data['main_content'] = $this->admin_view .'orders/index';
    $this->load->view("$this->template", $this->data);
    
  }

  function get_orders($offset=1){
    $date = $this->input->post('datepicker');
    $num_rows = $this->order_admin_model->get_orders_num();
    $per_page = (int)$this->data['settings']['general_limit'];//->value;


      $this->paginate($num_rows, 4, 'admin/order/get_orders', $per_page);
    
    $orders = $this->order_admin_model->get_orders(array('start'=>$date, 'limit'=>$this->per_page, 'offset'=>$offset));
     $this->data['sidebar'] = 'app/admin/settings/sidebar';
    echo $this->db->last_query();
    
    $this->data['orders'] = $orders;
    //$this->load->view("app/admin/orders/orders_grid", $this->data,true);


    $shifts = $this->shift_model->get();
    $s = array();
    foreach ($shifts as $key) {
      $s[$key->id] = $key->id .' | ' .$key->date .' | ' .$key->username;
    }
    $this->data['shifts'] = $s;

    $this->data['subtitle'] = 'الفواتير';
    $this->data['main_content'] = $this->admin_view .'orders/index';
    $this->load->view("$this->template", $this->data);
  }
  /*
  function get_orders_grid($offset){
    $date = $args['date'];
    $orders = $this->order_admin_model->get_orders(
      array('start'=>$date, 
        'limit'=>$this->per_page,, 
        'offset'=>$offset
      )
    );
  }
   */
  function get_orders_limit(){
    
    $date = date(date_format,strtotime("-1 days"));
    $orders = $this->order_admin_model->get_orders($date);

    //$this->data['sidebar'] = 'app/admin/settings/sidebar';
    
    //$this->data['orders'] = $orders;
  }

  


}

