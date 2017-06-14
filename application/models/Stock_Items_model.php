<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Stock_Items_model extends Details_Model {

  function __construct()
  {
    parent::__construct();

    $this->items_categories_table     = $this->db->dbprefix(items_categories_table);
    $this->items_units_table          = $this->db->dbprefix(items_units_table);
    $this->deffered_stock_items_table = $this->db->dbprefix('deffered_stock_items');
    $this->_table_name = $this->db->dbprefix(stock_items_table);
    $this->_table1_name = $this->db->dbprefix(stocks_table);
    $this->_table2_name = $this->db->dbprefix(items_table);
    $this->_table1_id = 'stock_id';
    $this->_table2_id = 'item_id';
  }
    public $new_rules = array(
      'item_id'=>array(
        'field'=>'item_id', 
        'label'=>' الخامة', 
        'rules'=>'required'
      ),
      'current_qty'=>array(
        'field'=>'current_qty', 
        'label'=>'الكمية', 
        'rules'=>'trim|required|is_numeric'
      )
    );
  public $import_rules = array(
      'item_id'=>array(
        'field'=>'item_id', 
        'label'=>' الخامة', 
        'rules'=>'callback_check_item|callback_check_qty'
      ),
      'qty' => array(
        'field'=>'qty', 
        'label'=>'الكمية', 
        'rules'=>'trim|required'
      )
  );

  function get_record($item_id, $stock_id){
  
    $q = $this->db->where('stock_id', $stock_id)
      ->where('item_id', $item_id)
      ->get($this->_table_name);
 //   var_dump($q->result());
    if($q->num_rows() == 1)
      return $q->row();
    else
      return $q->result();//this can be more than 1 or null
  }


  function increase_item($stock_id, $item_id, $qty){
    $rec = $this->get_record($item_id, $stock_id);
    //var_dump($rec);
    $this->db->where('stock_id', $stock_id)
      ->where('item_id', $item_id)
      ->set('current_qty', "current_qty+$qty", false)
      ->update($this->_table_name);
  }

  function decrease_item($stock_id, $item_id, $qty){

    $rec = $this->get_record($item_id, $stock_id);
  
      $this->db->where('stock_id', $stock_id)
        ->where('item_id', $item_id)
        ->set('current_qty', "current_qty-$qty", false)
        ->update($this->_table_name);
  }
  
  function move_to_stock($item, $qty, $stock_from, $stock_to){
    $this->decrease_item($stock_from, $item, $qty);

    if($this->check_item($item, $stock_to)){
      $this->increase_item($stock_to, $item, $qty);
    }
    else{
      $this->save( array('stock_id'=>$stock_to, 'item_id'=>$item, 'current_qty'=>$qty) );
    }
  }
 
  function get_item_stock($item_id, $stock_id){
    $q = $this->db->where('stock_id', $stock_id)
      ->where('item_id', $item_id)
      ->get($this->_table_name);
    if($q->num_rows() == 1)
      return $q->row();
    return null;
  }
  //function get_all_items($stock_id, $limit='', $offset='', $num = false)
  function get_all_items($args = array())
  {
    $select = "i.id iditem, i.name item_name,ic.id as idcat, ic.name as cat_name, s.name stock_name, si.stock_id as idstock, si.current_qty";
    $q = $this->db->select($select)
      ->from("$this->items_table i")
      ->join("$this->_table_name si", 'i.id=si.item_id', 'left')
      ->join("$this->stocks_table s", 's.id=si.stock_id', 'left')
      ->join("$this->items_categories_table ic", 'i.item_category=ic.id');
    if(isset($args['limit']))
      $this->db->limit($args['limit'], $args['offset']);
    $q = $this->db->where('si.stock_id', $args['stock_id'])->get();
   
    if(!isset($args['num']))
      return $q->result();
    /*
      *if the return res function id used it will retutn an object 
      *if the results is one result it will not be treateed as an array so it cant be used in pagination
      * */
    return $q->num_rows();
  }

//validaation functions
  function check_item($item_id, $stock_id, $qty=0){
    $q = $this->db->where('stock_id', $stock_id)
      ->where('item_id', $item_id);
    switch (true) {
      case $qty > 0 :
        $this->db->where('current_qty>0');
        break;
      case $qty == 0:
       // $this->db->where('current_qty', 0);
        break;
      
      default:
        // code...
        break;
    }
    
    $q = $this->db->get($this->_table_name);
    return ($q->num_rows() == 1);
  }

  function get_items_reorder_level_limit($limit = general_limit){
    $q = $this->db->select('i.id, i.name item_name, si.current_qty, s.name stock_name', true)
      ->from("$this->items_table i")
      ->join("$this->_table_name si", 'i.id=si.item_id', 'left')
      ->join("$this->stocks_table s", 'si.stock_id=s.id', 'left')
      ->limit($limit)
      ->get();
    return $this->result_ret($q);
  }

  function get_items_reorder_level(){
    $q = $this->db->select('i.id, i.name item_name, si.current_qty, s.name stock_name', true)
      ->from("$this->items_table i")
      ->join("$this->_table_name si", 'i.id=si.item_id', 'left')
      ->join("$this->stocks_table s", 'si.stock_id=s.id', 'left')
      ->get();

    return $this->result_ret($q);
  }
  #################################################################
  function deffered_stock_items($item_id, $amount, $shift_id){
    //insert into  deffered_stock_items_table (item_id, amount, shifr_id)
    //and this ittem is recorded at the current date

    $this->db->insert($this->deffered_stock_items_table, array(
      'shift_id'=> $shift_id,
      'item_id'=> $item_id,
      'time'=>date(mysql_datetime_format),
      'amount'=>$amount));
 
    //echo "<div class='query'>" .$this->db->last_query() ."</div>";
  }



  function update_item_qty( $stock_id, $item_id, $qty){
    $this->db->where('item_id', $item_id)
      ->where('stock_id', $stock_id)
        ->set('current_qty', "current_qty-$qty", false)
        ->update($this->_table_name);
  }

}
