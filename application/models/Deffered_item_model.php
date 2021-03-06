<?php

class Deffered_item_model extends MY_Model {

    protected $_table_name = deffered_stock_items_table;
  function __consrtruct(){
    parent::__construct();
  }

  function get_deffered_items($limit=general_limit){
    $this->db->where('is_stock_deduct', 0);
    //if($limit)
      $this->db->limit($limit);
    $this->db->select('si.id, sum(si.amount) as amount, si.time, si.shift_id, i.name')
      ->from("$this->_table_name si")
      ->join("$this->items_table i", 'i.id=si.item_id')
      ->group_by('si.item_id');
    $q = $this->db->limit($limit)->get();
    return $q->result();
    //return $this->result_ret($q);
  }
  function get_top_deffered_items($limit=general_limit){
    return $this->db->select('si.id, sum(si.amount) as amount, si.time, si.shift_id, i.name')
      ->from("$this->_table_name si")
      ->join("$this->items_table i", 'i.id=si.item_id')
      ->group_by('si.item_id')
      ->limit($limit)->get()->result();
    //return $this->db->limit($limit)->get('deffered_stock_items')->result();
  }
   function get_deffered_items_list($shift_id){
    $this->db->select('si.id, si.item_id, sum(si.amount) amount, si.shift_id')
          ->from("$this->_table_name si")
          ->group_by('si.item_id')
          ->where('si.is_stock_deduct', 0)
          ->where('si.shift_id', $shift_id);
    $q = $this->db->get();
    //echo $this->db->last_query();
    return $this->result_ret($q);
  }
 
    function update_deffered_item($def_id)
    {
      $this->db->where('id', $def_id)
          ->set('is_stock_deduct', 1)
          ->update($this->_table_name);
    }
  
}

