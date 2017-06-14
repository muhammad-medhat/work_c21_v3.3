<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Frontend_Controller {

  function __construct(){
    parent::__construct();
    $this->ext = 'jpg';
    $this->load->model(
      array('shift_model', 'order_details_model', 'product_items_model', 'stock_items_model', 'table_model'));
    $this->output->enable_profiler(false);

    $this->views_folder  = 'app/orders/';
    $this->data['sidebar'] = 'app/orders/main_sidebar';

    if($this->session->userdata('shift_id') == '')
      redirect('shift');
  }

  function index(){
    $this->data['subtitle'] = 'الترابيزات';
    $this->data['sidebar'] = 'app/orders/main_sidebar';
    
    $this->data['main_content'] = 'app/orders/tables';
    $this->load->view($this->template, $this->data);
  }




  function new_order($customer_id){
    $shift_id = $this->session->userdata('shift_id');
    $this->order_model->occupy_table($customer_id);
    $this->order_model->create_order($customer_id, $shift_id);
    $order_id = $this->db->insert_id();
    redirect("order/edit/$customer_id");
  }

  function edit_order($order_id){
    //GET ORDER BY ID
    /**************************************************/
    /**/$order = $this->order_model->get($order_id);/**/
    /**************************************************/
    $order_shift = $this->shift_model->get($order->shift_id);
    $order->shift_date = $order_shift->date;
    if($order){
      $table = $this->order_model->get_table($order->customer_id);
      $order->order_id = $order->id; //because we use it in the function edit
      $order_details = $this->order_details_model->get_order_details($order->id);
      $this->data['order']          = $order;
      $this->data['order_id']       = $order->id;    
      $this->data['table']          = $table;
      $this->data['tables']         = $this->table_model->get_free();
      $this->data['order_details']  = $order_details;
      $this->data['order_types']    = $this->order_model->get_order_types();      
    }
    $this->data['sidebar'] = 'app/orders/sidebar';
    $this->_display_view('order_details', 'الفواتير');
  }


  function edit($table_id, $new_table=false){
    //this function gets the current order at the given table

    /********************************************************/
    /**/$order = $this->order_model->get_order($table_id);/**/
    /********************************************************/
    if($order){
        $table = $this->order_model->get_table($table_id);
        $order_details = $this->order_details_model->get_order_details($order->order_id);
    
        $this->data['order']          = $order;
        $this->data['order_id']       = $order->order_id;    
        $this->data['table']          = $table;
        $this->data['tables']         = $this->table_model->get_free();
        $this->data['order_details']  = $order_details;
        $this->data['order_types']    = $this->order_model->get_order_types();
        $this->data['sidebar'] = 'app/orders/sidebar';
        $this->_display_view('order_details', 'الفواتير');
    }
    else
       show_error('No Order Found', '404', $heading = 'An Error Was Encountered');
  }

  function change_type($order_id, $type_id){
    $this->order_model->change_type($order_id, $type_id);
    $this->edit_order($order_id);
  }

  function show_order($order_id){
    $this->data['subtitle'] = 'الطلبات';
    //$this->data['sidebar'] = 'app/orders/sidebar';
    
    $order = $this->order_model->get($order_id);
//
    if($order){
        $table = $this->table_model->get($order->customer_id);
        $order_details = $this->order_details_model->get_order_details($order_id);
    
        $this->data['order']          = $order;
        $this->data['order_id']       = $order_id;    
        $this->data['table']          = $table;
        //$this->data['tables']         = $this->table_model->get_free();
        $this->data['order_details']  = $order_details;
        $this->data['main_content']   = 'app/orders/show_order';
      } else {
        show_error('No Order Found', '404', $heading = 'An Error Was Encountered');
        $this->data['main_content']   = 'errors/html/error_404';
      }
    $this->load->view($this->template, $this->data);  
  }

  function add_product($order_id, $product_id, $qty){
    $exist = $this->order_model->check_product($order_id, $product_id);
    if($exist){ // if exists update quentity
      $this->order_model->update_order($order_id, $product_id, $qty);
      $order_details_id = $exist->id;
    } else { // if not exists add product to order
      $this->order_model->add_product($order_id, $product_id, $qty);
      $order_details_id = $this->db->insert_id() ;
    }
    echo $order_details_id;
   }
  function end($order_id, $total){
    $this->db->trans_start();

      $order = $this->order_model->get($order_id, true);
 
      $this->order_model->end_order($order_id, $total);

      $this->db->insert('finances_moneycase', array(
        'shift_id'=>$this->session->userdata('shift_id'), 
        'total'=>$total
      ) );
      $this->order_model->free_table($order->customer_id);
   ######### STOCS WORK ############### 
      $order_details = $this->order_details_model->get_order_details($order_id);
  
      foreach ($order_details as $od) {

        $product = $this->product_model->get($od->product_id);
        $this->product_items_model->product_decrease_items($product->id, $od->quantity);
      }

   ######### STOCS WORK ############### 
    $this->db->trans_complete();
  }

  function delete_item($order_details_id){
    $this->order_details_model->delete($order_details_id);

    //echo "<div class='query'>" .$this->db->last_query() ."</div>";
  }

  function minus($order_id, $product_id){
    $this->order_details_model->decrease_product($order_id, $product_id);
    //echo $this->db->last_query();
  }
  
  function print_invoice($order_id, $end=0){
    $order = $this->order_model->get($order_id);
    $od = $this->order_details_model->get_order_details($order_id, true);
    $inv = array();
    $total = 0;
    foreach ($od as $key) {
      $inv[$key->id]['name'] = $key->arabic;
      $inv[$key->id]['eng'] = $key->eng;
      $inv[$key->id]['price'] = $key->price;
      $inv[$key->id]['qty'] = $key->quantity;
      $inv[$key->id]['total_line'] = $key->quantity*$key->price;
      $total += $inv[$key->id]['total_line'];
    }
    $items_table =  to_table($inv);

    $this->data['items_table'] = $inv;
    $this->data['total'] = $total;
    switch ($order->order_type) {  
      case '1': //dine in
        $s = (int)$this->data['settings']['service'];
        break;
      
      case '3': //delivery
        $s = (int)$this->data['settings']['delivery_service'];
        break;
      default:// take away
        $s = 0;
    }
    $service = $total * $s / 100;
    $grand_total = $total+$service;
//var_dump($grand_total);
    $this->data['grand_total'] = $grand_total;
    $this->data['service_value'] = ($service)? $service : 0;
    $this->data['ratio'] = $s;
    $this->data['order'] = $order;

    if($end == 1 )
      $this->end($order_id, $grand_total);
    /**********************************************************************************************/
    /**/  $html = $this->load->view('app/orders/invoice', $this->data, true);                   /**/
    echo $html.'<br>===============<br>';
    /**/  $invID = str_pad($order->id, 5, '0', STR_PAD_LEFT);                                   /**/
    /**/  //convert inv to pdf                                                                  /**/
    /**/  $inv = $this->_pdf( $html, "inv_$invID.pdf");                                         /**/
    /**/  //$this->print_pdf($inv);                                                             /**/
    /**/  //$this->temp_print( $this->data);                                                    /**/
    /**/  $this->pdf_image(APPPATH ."invoice/inv_$invID.pdf");                                  /**/
    /**/  $this->load->library('ReceiptPrint');                                                 /**/
    /**/  $this->receiptprint->connect('192.168.0.110', 9100);//any ip and port                 /**/
    /**/                                                                                        /**/
    /**/  $this->receiptprint->print_image(APPPATH ."invoice/inv_$invID.pdf.$this->ext");       /**/
    /**/  unlink(APPPATH ."invoice/inv_$invID.pdf.$this->ext");                                 /**/
    /**********************************************************************************************/
    return $html;
  }

  function pdf_image($pdf_path){
   // convert pdf to image using cmd

    $cmd  = "convert $pdf_path $pdf_path.$this->ext" ;
    exec($cmd);
  }

  function cancel($order_id){
    $order_details = $this->order_details_model->get_order_details($order_id);
    if($order_details){
      //var_dump($order_details);
      $this->order_details_model->clear_order($order_id);
    }
    $this->end($order_id, 0);
    redirect('order');
  }

  function invoice_test($order_id){
    $this->print_invoice($order_id);
    $this->data['main_content'] = 'app/orders/invoice';
    $this->load->view($this->template, $this->data);
  
  }
  function update_total($order_id, $total){
    $this->db->where('id', $order_id)
      ->set('total', $total)
      ->update($this->orders_table);
  }

  function edit_new($table_id){
    $this->load->model('table_model');
    $table = $this->table_model->get($table_id);
    if($table->is_available==0)
      redirect("order/edit/$table_id");
  }
  function general_settings(){
    $this->load->model('settings_model');
    $s = $this->settings_model->get_gs();
   // var_dump($this->settings_model->get());
  }

  function change_table($t_from, $t_to){
    $this->db->trans_start();

    $order = $this->order_model->get_order($t_from);
    if($order){
      $this->order_model->save( array('customer_id'=>$t_to), $order->order_id );
      $this->order_model->free_table($t_from);
      $this->order_model->occupy_table($t_to);
    }
    $this->db->trans_complete();
  }
  
  
  function _display_view($view, $subtitle){
    $this->data["subtitle"] = $subtitle;
    $this->data['main_content'] = $this->views_folder .$view;
    $this->load->view($this->template, $this->data);
  }

  function get_orders($is_checked=2, $limit=100){
    if( $this->input->post('ordersnum') !== null)
      $limit = $this->input->post('ordersnum');
    if( $this->input->post('datepicker') !== null)
      $date =  $this->input->post('datepicker');
    else $date='';

    $orders = $this->order_model->get_orders($is_checked, $limit, $date);
 //   echo $this->db->last_query();
    $this->data['is_checked'] = $is_checked;
    $this->data['orders'] = $orders;
    $subtitle = $this->get_name($is_checked);
    $this->_display_view('orders', $subtitle);
  }
  
  function get_name($is_checked){
    switch ($is_checked) {
      case 1:
        return 'تم التسليم';
        break;
      case 0:
        return 'جديد';
      break;

      default:
          return 'كل اففواتير';
        break;
    }
  }

  function print1($text){
    $this->load->library('ReceiptPrint');
    try {
      $this->receiptprint->connect('192.168.0.110', 9100);//any ip and port
      //echo"encoding is "  .iconv("UTF-8", "CP1256", 'شسيب');
      $this->receiptprint->print_receipt($text);//'title', 'Hello World!');
    } catch (Exception $e) {
      log_message("error", "Error: Could not print. Message ".$e->getMessage());
      $this->receiptprint->close_after_exception();
    }
  }
  function temp_print($array){

    $this->load->library('ReceiptPrint');
      $this->receiptprint->connect('192.168.0.110', 9100);//any ip and port
    $this->receiptprint->my_receipt($array);
  }


  
  function print_pdf($pdf){
    $this->load->library('ReceiptPrint');
    $this->receiptprint->connect('192.168.0.110', 9100);//any ip and port
    $this->receiptprint->print_pdf($pdf);
    $size='';

  }
  function _pdf($order_id, $html, $file_name, $head){
    // generates invoice for the given order id
    $this->load->library('pdf');
    $od = $this->order_details_model->get_count($order_id);
    $size ='';// $od ." ___ " .PDF_PAGE_FORMAT;

        switch (true) {
          case $od>3 and $od <=5:
            $size = "<h1>$od recipt A5</h1>";
            $this->pdf->changePageFormat('A5');
            break;
          case $od>5 and $od<9: 
            $size = "<h1>$od recipt2</h1>";
            $this->pdf->changePageFormat('RECIPT2');
          default:
            $size = "<h1>$od recipt def</h1>";
        
            break;
        }

    return $this->pdf->html($html, $file_name, $head);
  }

  ##############################################################
  /**/                                                       /**/
  /**/                                                       /**/
  ##############################################################

  function pdf_convert($order_id){}

  function enhanced_invoice($order_id){
    $order = $this->order_model->get($order_id);
    $order_type = $this->order_model->get_order_type($order->order_type);
    $od = $this->order_details_model->get_order_details($order_id, true);

    $inv = array();
    $total = 0;
    foreach ($od as $key) {
      $inv[$key->id]['name'] = $key->arabic;
      $inv[$key->id]['eng'] = $key->eng;
      $inv[$key->id]['price'] = $key->price;
      $inv[$key->id]['qty'] = $key->quantity;
      $inv[$key->id]['total_line'] = $key->quantity*$key->price;
      $total += $inv[$key->id]['total_line'];
    }
    //$items_table =  to_table($inv);



    switch ($order->order_type) {  
      case '1': //dine in
        $s = (int)$this->data['settings']['service'];
        break;
      
      case '3': //delivery
        $s = (int)$this->data['settings']['delivery_service'];
        break;
      default:// take away
        $s = 0;
    }
    $service = $total * $s / 100;
    $grand_total = $total+$service;
    
    $this->data['grand_total'] = $grand_total;
    $this->data['service_value'] = ($service)? $service : 0;
    $this->data['ratio'] = $s;
    $this->data['total'] = $total;
    $this->data['table'] = $this->order_model->get_table($order->customer_id);
    $this->data['order'] = $order;
    $this->data['order_type'] = $order_type;
    $this->data['items_table'] = $inv ;

    $invID = str_pad($order->id, 5, '0', STR_PAD_LEFT);  

$h_image = $this->load->view('app/orders/invoice/header_image',$this->data, true);
$header  = $this->load->view('app/orders/invoice/header',$this->data, true);
$items   = $this->load->view('app/orders/invoice/items', $this->data, true);
$footer  = $this->load->view('app/orders/invoice/footer',$this->data, true);

    $this->load->library('pdf');
    $od = $this->order_details_model->get_count($order_id);


      switch (true) {
          case  $od <=5:
            $size = "<h1>$od recipt REV_A5</h1>";
            $this->pdf->changePageFormat('REC_A5');
            break;
          case $od>=6 and $od<=15: 
            $size = "<h1>$od recipt1</h1>";
            $this->pdf->changePageFormat('RECIPT1');
            $this->pdf->lib_setHeaderMargin(0);
            break;
          case $od>15 and $od<25:
            $size = "<h1>$od recipt2</h1>";
            $this->pdf->changePageFormat('RECIPT2');
            $this->pdf->lib_setHeaderMargin(-50);
            break;
          default:
            $size = "<h1>$od  recipt3</h1>";
            $this->pdf->changePageFormat('RECIPT3');
            $this->pdf->lib_setHeaderMargin(-200);

            $this->pdf->lib_Cell(0, 10, 'margin change' .$this->pdf->lib_getHeaderMargin(), 1, 1, 'C');
            
        
            break;
        }
    $page_size = "A$od";
    //$this->pdf->changePageFormat($page_size);
//$size = "page size is $page_size";

$this->pdf->lib_Cell(0, 10, $order_type->name, 1, 1, 'C');

    $this->pdf->html_cell($size);
    //$this->pdf->html_cell($h_image);
    $this->pdf->html_cell($header);
    $this->pdf->html_cell($items);
    $this->pdf->html_cell($footer);

    $this->pdf->lib_output(APPPATH ."invoice/inv_$invID.pdf");
     $this->pdf_image(APPPATH ."invoice/inv_$invID.pdf");                                  
     $this->load->library('ReceiptPrint');                                                 
     $this->receiptprint->connect('192.168.0.110', 9100);//any ip and port                 
     $this->receiptprint->print_image(APPPATH ."invoice/inv_$invID.pdf.$this->ext");       



    /**********************************************************************************************/
    /**/ ////////$html = $this->load->view('app/orders/invoice/index', $this->data, true);             /**/
    /**/ ////////$invID = str_pad($order->id, 5, '0', STR_PAD_LEFT);                                   /**/
    /**/ //////////convert inv to pdf                                                                  /**/
    /**/ ////////$inv_pdf = $this->_pdf( $order->id, $html, "inv_$invID.pdf", $order_type->name);                         /**/
    /**/ ////////$this->pdf_image(APPPATH ."invoice/inv_$invID.pdf");                                  /**/
    /**/ ////////$this->load->library('ReceiptPrint');                                                 /**/
    /**/ ////////$this->receiptprint->connect('192.168.0.110', 9100);//any ip and port                 /**/
    /**/ ////////                                                                                      /**/
    /**/ ////////$this->receiptprint->print_image(APPPATH ."invoice/inv_$invID.pdf.$this->ext");       /**/
    /**/  ////////unlink(APPPATH ."invoice/inv_$invID.pdf.$this->ext");                                 /**/
    /**********************************************************************************************/
    //$this->_display_view('invoice/index', '');

  }
}
