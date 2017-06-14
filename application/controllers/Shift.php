<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends Frontend_Controller {

  function __construct(){
    parent::__construct();
    
    $shift_id = (int)$this->session->userdata('shift_id');
    $this->load->model(array('shift_model', 'stock_items_model', 'deffered_item_model') );
    
/*    if(!$shift_id)     redirect('shift');*/
  }


  function index(){
    $last_shift = $this->shift_model->get_last_shift();
    //echo"<h1>".$this->db->last_query()."</h1>";
    $this->data['shift'] = $last_shift;
//    $this->data['active_shifts'] = $this->shift_model->get_active_shifts();
//var_dump($this->data['active_shifts'] );
    $this->data['sidebar'] = 'app/shifts/sidebar';
    $this->data['subtitle'] = 'ورديات العمل';

    //$this->data['open'] = $this->shift_model->get_open_orders_num($last_shift->id);// getting count of open orders
    $this->data['main_content'] = 'app/shifts/index';

    $this->load->view($this->template, $this->data);
  }

  function new_shift(){
    $shift_id = $this->session->get_userdata('shift_id');
    //var_dump($this->session->userdata);
    if(!$this->has_open_orders($shift_id)){

       //$this->session->set_flashdata('warning', $this->db->last_query());  
       $this->session->set_userdata('shift_id', $this->shift_model->new_shift());
       $shift_id = $this->session->userdata('shift_id');
       $this->session->set_flashdata('message', "تم عمل وردية جديدة رقم: $shift_id");  
    }else{
       $num_orders = $this->shift_model->get_open_orders_num();
       $this->session->set_flashdata('warning', "لا يمكن عمل وردية جديدة ($num_orders) ");  
    }
  }

  function end_shift(){
    $shift_id = $this->session->userdata('shift_id');
    if(isset($shift_id) || $shift_id!=''){
      
     
      if( !$this->has_open_orders($shift_id) ) {

        $this->db->trans_start();
            //??$this->shift_model->end_shift($shift_id);
            $this->stocks_managment($shift_id);
            $this->session->unset_userdata('shift_id');
        $this->db->trans_complete();
        $this->session->set_flashdata('message', 'تم انهاء الوردية');

      } else{
        $num_orders = $this->shift_model->get_open_orders_num();
        $this->session->set_flashdata('warning', "لا يمكن  انهاء الوردية ($num_orders) ");
      }
    } else{
         $this->session->set_flashdata('warning', 'برجاء تسجيل الخروج'); 
  }

  $this->current_shift();
  }

  function resume_shift(){
    $last_shift = $this->shift_model->get_last_shift();
    var_dump($last_shift);
    $shift_id = $this->session->userdata('shift_id');
    echo "shift is $shift_id";
    if(null !== $last_shift ) {
      $this->session->set_userdata('shift_id', $last_shift->id);
    }
    return $last_shift;
  }

  function current_shift(){
    //display the total of orders
    //and will allow the user to end the shift

    //$shift = $this->shift_model->get_last_shift();
    $shift_id = $this->session->userdata('shift_id');
    if($shift_id){
      $shift = $this->shift_model->get($shift_id);
      if($shift->closed ==1){
        $this->session->set_flashdata('message', $this->lang->line('noshift'));
        redirect('shift');
      }
      $this->data['shift'] = $shift;
      $total = $this->shift_model->get_shift_total($shift_id);
      $this->data['total'] = $total;
      $this->data['orders_count'] = $this->shift_model->get_orders_num($shift_id, 2);
      $this->data['sidebar'] = 'app/shifts/sidebar';
      $this->data['subtitle'] = 'ملخص الوردية';
      $this->data['main_content'] = 'app/shifts/summery';
      $this->load->view($this->template, $this->data);
    } 
    else
      redirect('shift');

  }
  function has_open_orders($shift_id){

   $q = $this->shift_model->get_orders_num($shift_id);
   return $q != 0; 
  }
  #################### STOCK MANAGMENT ################
  #
  function stocks_managment($shift_id){
  
      ##########################
        //stock items deduct
        ####################
        //$shift_id = (int)$this->session->userdata('shift_id') ;
        $deffered = $this->deffered_item_model->get_deffered_items_list($shift_id);
        $stock_id =(int)$this->data['settings']['stock'];//->value;
        if(isset($deffered)){
          foreach ($deffered as $def) {
          //update stock items quantity
            $this->stock_items_model->update_item_qty(
              $stock_id, 
              $def->item_id, 
              $def->amount
            );
            // update the flag is_stock_deduct
            $this->deffered_item_model->update_deffered_item($def->id);
          }
        }
    ####################  
  }


  function stock_managment(){
    $shift_id = $this->session->userdata('shift_id');
    $working_stock = 2;
    //$working_stock = $this->session->userdata('stock_id');
  
    $items = $this->deffered_item_model->get_deffered_items($shift_id);
    if ($items) {
      switch (true) {
      case is_array($items):
          echo "<h1>Array of items</h1>";
          foreach ($items as $i) { 
            $this->stock_items_model->decrease_item($working_stock, $i->id, $i->amount);

            //echo "<div class='query'>" .$this->db->last_query() ."</div>";
          }
          break;
        case is_object($items):
            echo "<h1>object</h1>";
            $this->stock_items_model->decrease_item($working_stock, $item->id, $item->amount);
          break;
        default:
          echo"<h1>no items</h1>";
          break;
      }
    }
  }
}
