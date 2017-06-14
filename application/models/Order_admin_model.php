<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Order_admin_model extends MY_Model {

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
    

    $this->load->model('order_details_model');
  }
  
  function get_orders_num(){
    return $this->db->where('is_checked', 1)->count_all_results($this->_table_name);
  }

  //function get_orders($start_date='', $end_date='', $limit=general_limit){
  function get_orders($array){
    //var_dump($array);
    $start_date = isset($array['start'])?$array['start']:'';
    $limit = isset($array['limit'])?$array['limit']: '';
    $offset = isset($array['offset'])?$array['offset']: 0;

    $this->db->select('o.id as order_id, o.shift_id,o.total,c.name as table,o.is_checked, s.date, s.start_time, s.end_time')
             ->from("$this->orders_table o")
             ->join("$this->work_shifts_table s", 'o.shift_id=s.id')
             ->join("$this->customers_table c", 'o.customer_id=c.id')
             ->where('o.is_checked', 1);
    if($start_date!=''){
     $q = $this->db->where('s.date>=', $start_date) 
       ->limit($limit, $offset)
       ->get()
              ->result();
    }
    else
      $q = $this->db->limit($limit)->get()->result();

    //echo "<div class='query'>" .$this->db->last_query() ."</div>";
    return $q;

  }
}
