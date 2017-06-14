<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Shift_model extends MY_Model {

   //protected $_table_name = 'articles';
  
  function __construct()
  {
    parent::__construct();

    $this->orders_table                   = $this->db->dbprefix(orders_table);
    $this->items_categories_table         = $this->db->dbprefix(items_categories_table);
    $this->items_units_table              = $this->db->dbprefix(items_units_table);
    $this->items_transactions_table       = $this->db->dbprefix(items_transactions_table);
    $this->items_transactions_types_table = $this->db->dbprefix(items_transactions_types_table);
    
    $this->_table_name = $this->db->dbprefix(work_shifts_table);
    $this->_order_by = 'id desc';
  }


  function get_orders($shift_id){
    $q = $this->db->where('shift_id', $shift_id)
      ->get($this->orders_table);
    return $q->result();

    switch (true) {
      case $q->num_rows() == 1:
        return $q->row();
        break;
      case $q->num_rows()>1:
        return $q->result();
      default:
        return null;
        break;
    }
  }
  function get_last_shift(){
    return $this->db->where('id = (select max(id) from ' .$this->_table_name .')' )
          ->get($this->_table_name)->row();
  }

  function new_shift(){
    $ins = array(
      work_shifts__date  => date(date_format), 
      work_shifts__start => date(time_format), 
      work_shifts__username=>$this->session->userdata('username')
    );
    $this->db->insert($this->_table_name, $ins);
    return $this->db->insert_id();
  }

  function end_shift($id){
    //$open = $this->get_open_orders($id);
    //if( count( $open )  < 1 ) {
      $data = array(
        work_shifts__end => date(time_format),
        work_shifts__closed=>1
      );
      $this->db->where('id', $id)
        ->update($this->_table_name, $data);
      $this->db->insert('finances_shifts', 
        array('shift_id'=>$id, 'total'=>$this->get_shift_total($id)
      ));
    //}
  }

  function get_shift_total($id){
    //GETS THE TOTAL MONEY IN THE CASE
    $total = $this->db->select_sum('total')
      ->from('finances_moneycase')
      ->where('shift_id', $id)//this->session->userdata('shift_id')
      ->get()->row()->total;
    return mg_round($total, approximation);

  }
  function get_shift_sum($id){
    //gets the total sum of orders during the shift
    $total = $this->db->select_sum('total')
      ->from($this->orders_table)
      ->where('shift_id', $id)
      ->get()->row()->total;
    return mg_round($total, approximation);
  }
  ###########################################################################3333

  function get_open_orders($shift_id){
    //select s.id, o.id from c21_work_shifts s
    //left join c21_orders o on o.shift_id = s.id
    //where s.id=144 and o.is_checked = 0
    $q = $this->db->select('o.id')
      ->from("$this->_table_name s")
      ->join("$this->orders_table o", 'o.shift_id=s.id', 'left')
      ->where('s.id', $shift_id)
      ->where('o.is_checked', 1)
      ->get();
      echo"<div>" .$this->db->last_query() ."</div>";
      return $this->result_ret($q);
  }
/*
  function get_orders($shift_id, $is_checked=1){
    //GET ORDERS  IN SHIFT
    //IS_CHECKED=0 OPEN ORDERS
    //IS_CHECKED=1 CLOSED ORDERS
    //IS_CHECKED=2 ALL ORDERS    
    $q = $this->db->select('o.* ')
      ->from("$this->_table_name s")
      ->join("$this->orders_table o", 'o.shift_id=s.id', 'left')
      ->where('s.id', $shift_id);
    if($is_checked!=2)
      $q->where('o.is_checked', $is_checked);
    
    $q->get();
      echo"<div>" .$this->db->last_query() ."</div>";
      return $this->result_ret($q);
  }
 */
  ###################################################################################33
  function get_orders_num($shift_id, $is_checked=0){
    //GET ORDERS NUM IN SHIFT
    //IS_CHECKED=0 OPEN ORDERS
    //IS_CHECKED=1 CLOSED ORDERS
    //IS_CHECKED=2 ALL ORDERS
    $q = $this->db->
      select('count(id) as count_id')
      ->from($this->orders_table);
    if ($is_checked!=2) {
      $q->where('is_checked', $is_checked);
    }      
    $q->where('shift_id', $shift_id);
    $query = $q->get();
    //var_dump($q);
     // echo"<div>" .$this->db->last_query() ."</div>";

    return $query->row('count_id');
  }

  function get_open_orders_num(){
    $q = $this->db->
      select('count(id) as count_id')
      ->from($this->orders_table)
      ->where('is_checked', 0)       
      ->get();
//    $this->session->set_userdata('num_orders', $q->row()['counr(id)']);
      return $q->row()->count_id;
  }

  function get_limit_shifts($limit=''){
    if(empty($limit))
     $limit =$this->data['settings']['general_limit']; 
    $q = $this->db->limit($limit)->order_by('id desc')->get($this->_table_name );
    return $q->result();
  }
  
  function get_shift_details($shift_id){
    $num_orders = $this->get_orders_num($shift_id, 2);
    $total = $this->get_shift_sum($shift_id);
    $user = $this->user_model->get_by_username($this->get($shift_id)->username);
    
    $ret = array();
    $ret['num'] = $num_orders;
    $ret['total'] = $total;
    $ret['user'] = $user;
    return (object)$ret;
  }

  function get_active_shifts(){
    return $this->db->where('closed', 0)->get($this->_table_name)->result();
  
  }

  function has_ordes_open($shift_id){

    return $this->get_open_orders_num($shift_id) != 0;


  }

}

