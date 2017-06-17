<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Order_model extends MY_Model {

  protected $_table_name=orders_table;

  function __construct()
  {
    parent::__construct();
    
    $this->products_table           = $this->db->dbprefix(products_table);
    $this->categories_table         = $this->db->dbprefix(categories_table);
    $this->customers_table          = $this->db->dbprefix(customers_table);
    $this->customers_sections_table = $this->db->dbprefix(customers_sections_table);
    $this->work_shifts_table        = $this->db->dbprefix(work_shifts_table);

    $this->orders_table             = $this->db->dbprefix(orders_table);
    $this->order_details_table      = $this->db->dbprefix(order_details_table);
    $this->order_types_table        = $this->db->dbprefix('order_types');
    if($this->session->userdata('shift_id') == ''){
      //you can choose from creating a new shift
      //or complete the existing shift
      //must be done in the db
    }

    $this->load->model('order_details_model');
  }
  function get_sections(){
    return $this->db->get($this->customers_sections_table)->result();
  }

  function get_tables($is_available=2){
    /*
     * is_available = 0 empty table
     * is_available = 1 available table
     * is_available = 2 all tables
     * */
    if($is_available!=2){
      $this->db->where(customers__is_available, $is_available);
    }
    
    $query = $this->db->order_by(customers__id)->get($this->customers_table);
    return $query->result();
  }

  function get_table($table_id){
    return $this->db->where('id', $table_id)->get($this->customers_table)->row();
  }

  function get_tables_total($is_available=2){
    if($is_available!=2){
      $this->db->where(customers__is_available, $is_available);
    }
    $select=array(
      'o.' .orders__id  .' as order_id', 
      'o.' .orders__total, 
      't.' .customers__name,
      't.' .customers__id .' as table_id',
      't.' .customers__is_available
    ); 

    $query = $this->db->select($select, true)
                  ->from("$this->customers_table t")
                  ->join("$this->orders_table o", 'o.' .orders__customer_id .'=' . 't.' .customers__id, 'left')
//                  ->where('o.' .orders__is_checked, 0)
                  ->order_by('table_id')
                  ->get();
    //echo 'tables query ' .$this->db->last_query();
    return $query->result();

  }

  function check_table($table_id){
    /* check the table if it is empty
     * checking the attribute is_available == 1 
     * */
    $q = $this->db->where(customers__is_available, 1)
          ->where(customers__id, $table_id)
          ->get($this->customers_table);
    return($q->num_rows() == 1);
  }

  function occupy_table($table_id, $set_available=0){
    //if argument set_available is 0 
    //then i would like to occupy the table
    //(the table will not be available)
    if($this->check_table($table_id)){
      //$this->db->where(customers__is_available, 1);
      $this->db->where(customers__id, $table_id);
      $this->db->update($this->customers_table, array(customers__is_available=>$set_available));

    }
    
  }
  
  function free_table($table_id){
      //$this->db->where(customers__is_available, 1);
      $this->db->where(customers__id, $table_id);
      $this->db->update($this->customers_table, array(customers__is_available=>1));
  }

  function create_order($customer_id, $shift_id, $order_type=1){
    // order_type=1 is the dinein 
    $ins = array(
      orders__customer_id => $customer_id, 
      orders__shift_id =>$shift_id,
      'order_type'=>$order_type,
      'total'=>0,
      orders__start_time =>date(time_format), 
      orders__end_time =>date(time_format) - date(time_format)
    );
    $this->db->insert($this->orders_table, $ins);
  }

  function get_order($table_id){
    
    /*Gets the order using the table_id*/

    $shift_id = $this->session->userdata('shift_id');

    $select = array(
      'o.id'             => 'as order_id',
      't.id'             => 'as table_id', 
      's.date'           => 'as shift_date',
      'o.total'          => 'as order_total',
      'o.start_time'     => 'as start_time',
      'o.order_type'     => 'as order_type',
      'o.client_address' => 'as client_address',
      'o.is_checked'     => 'as order_checked'
    );
      foreach ($select as $key=>$value) {
        $this->db->select("$key $value", false);
      }
      $this->db->select('o.*');
      $this->db->from("$this->orders_table o");
      $this->db->where('customer_id', $table_id); 
 
      $this->db->join("$this->customers_table t",'t.id=o.customer_id');
      $this->db->join("$this->work_shifts_table s",'o.shift_id=s.id');
      $this->db->where('o.is_checked', 0  );
      $query = $this->db->get();

  
    if($table_id!= 0){
      return $query->row();
    }else{
      return $query->result();    
    }
  }



  function get_order_details111($order_id, $info=true){

    $select = array(
      'od.' .order_details__order_id, 
      'od.' .order_details__product_id, 
      'od.' .order_details__quantity
    );
    $info_arr = array(
      'p.' .products__name, 
      'p.' .products__price  
    );
    $ss = array();
    if($info ){
      $select = array_merge($select, $info_arr);
    }
    
    $this->db->select($ss);
    $this->db->from("$this->order_details_table od");

    $this->db->join("$this->products_table p", 'p.id=od.product_id');
    $this->db->where('od.order_id', $order_id);

    $query = $this->db->get();

    return $query->result();
  }

  function check_product($order_id, $product_id){
    $this->db->where(order_details__order_id, $order_id)
      ->where(order_details__product_id, $product_id);
    $q = $this->db->limit(1)->get($this->order_details_table);
    return $q->row();  
  }

  function update_order($order_id, $product_id, $qty){
    /*increments the  quantity of the given product*/
     $q = "update $this->order_details_table ";
     $q .= 'set ' .order_details__quantity .'=' .order_details__quantity ."+$qty " ;
     $q .= 'where '.order_details__order_id ."=$order_id ";
     $q .= 'and '.order_details__product_id ."=$product_id ";
     $query = $this->db->query($q); 
     //get the product data
     $product = $this->product_model->get($product_id, true);
     $this->update_total($order_id, $product->price);
  }

  function update_total($_order_id, $_amount){
    //updates the total of the given order id
    $q = "update $this->orders_table ";
    $q .= "set " .orders__total ."=" .orders__total .'+' .$_amount;
    $q .= " where " .orders__id .'=' . $_order_id;
    $query = $this->db->query($q);
  }

  function add_product($order_id, $product_id, $qty){
    
    $ins = array(
      order_details__order_id => $order_id, 
      order_details__quantity => $qty, 
      order_details__product_id => $product_id
    );
      $this->db->insert($this->order_details_table, $ins);
  }

  function update_product_order11($order_id, $product_id, $qty){
    //removes a product from the order
    $data = array(
      order_details__order_id => $order_id, 
      order_details__quantity => $qty, 
      order_details__product_id => $product_id
    );
    $this->db->where();
      $this->db->update($this->order_details_table, $data);
  }
  function end_order($order_id, $total=0){
    $this->db->where(orders__id, $order_id)
      ->update($this->orders_table, array(orders__is_checked=>1, orders__total=>$total, orders__end_time=>date(time_format) ));

  }

/*
 __      __________ __________ ____  __.   _________ ___ ___ .____________________________________________
/  \    /  \_____  \\______   \    |/ _|  /   _____//   |   \|   \_   _____/\______   \__    ___/   _____/
\   \/\/   //   |   \|       _/      <    \_____  \/    ~    \   ||    __)   |       _/ |    |  \_____  \ 
 \        //    |    \    |   \    |  \   /        \    Y    /   ||     \    |    |   \ |    |  /        \
  \__/\  / \_______  /____|_  /____|__ \ /_______  /\___|_  /|___|\___  /    |____|_  / |____| /_______  /
       \/          \/       \/        \/         \/       \/          \/            \/                 \/ 


*/
  function get_shift($id){
 //`   $this->db->select('s.id, s.start_time, s.end_time, s.date, ')
  }
 /* function get_shift_total($id){
    $total = $this->db->select_sum('total')
      ->from("$this->orders_table o")
      ->join("$this->work_shifts_table s", 'o.shift_id=s.id')
      ->where('s.id', $id)
      ->where('o.is_checked', 1)
      ->get()->row()->total;

    return mg_round($total, approximation);
 }*/
##############################################
/*

.___      _______    ____   ____ ________       .___    _________      ___________
|   |     \      \   \   \ /   / \_____  \      |   |   \_   ___ \     \_   _____/
|   |     /   |   \   \   Y   /   /   |   \     |   |   /    \  \/      |    __)_ 
|   |    /    |    \   \     /   /    |    \    |   |   \     \____     |        \
|___| /\ \____|__  / /\ \___/ /\ \_______  / /\ |___| /\ \______  / /\ /_______  /
      \/         \/  \/       \/         \/  \/       \/        \/  \/         \/ 
 */
  function get_invoice($order_sum, $custom){
    //get sum of all items in order
    //$sum = $this->order_details_model->get_order_sum($order_id);
    return $order_sum + $custom;
  }
/*  
  function get_invoice_items($order_id){
    $od = $this->order_details_model->get_order_details($order_id);
    $ret = array();
    $i = 0;
    foreach($od as $k){
      if(in_array($k->product_id, $ret) ){
      $ret[$i][/
      }
    }
  }
 */
  //-------------------------------------------------------------------------------------------------------
  function get_orders($is_checked=2, $limit=100, $date=''){
   // $q = $this->db->select('o.*,s.*, c.name as customer, t.name  as type')
    $q = $this->db->select('o.id as id_order, o.*,s.id as id_shift, s.*, c.name as customer, t.name  as type, t.css as css_class')
      ->from("$this->orders_table o")
      ->join("$this->work_shifts_table s", 's.id=o.shift_id', 'left')
      ->join("$this->order_types_table t", 't.id=o.order_type', 'left')
      ->join("$this->customers_table c", 'o.customer_id=c.id', 'left');
    if($is_checked!=2){ $q = $this->db->where('is_checked', $is_checked); }
    if($date != ''){ $q = $this->db->where("s.date > '$date'"); }
    $q = $this->db->order_by('id_order')->limit($limit)->get();
    //var_dump($q->result());
    //echo $this->db->last_query();
    return $q->result();
  }

  function get_order_types(){
    return $this->db->get('order_types')->result();
  }

  function change_type($order_id, $type_id){
    $order = $this->get($order_id);
    $this->free_table($order->customer_id);
    $this->save(array('customer_id'=>0,'order_type'=>$type_id), $order_id);
  }

  function get_order_type($order_type_id){
    $q = $this->db->where('id', $order_type_id)->get( 'order_types') ;
    //var_dump($q);
    return $q->row();
  }

  function discount($order_id, $value){
    $this->db->where('id', $order_id)
      ->update( 
        $this->_table_name, array('order_discount_value'=>$value) 
      );

  }

  function update_order_info($order_id, $name, $value){
    $this->db->where('id', $order_id)
      ->update( 
        $this->_table_name, array($name=>urldecode($value)) 
      );
  }
}
