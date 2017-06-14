<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Stock_model extends MY_Model {

  protected $_table_name=stocks_table;

  public function __construct(){
    parent::__construct();
  }


  function get_items($id){
    $select = "s.id, s.item_id, s.stock_id, s.current_qty, i.name";
     $q = $this->db->select($select, true)
      ->from ("$this->stock_items_table s")
      ->join ("$this->items_table i", "s.item_id=i.id")
      ->where('s.stock_id', $id)
      ->get()->result();

    //echo "<div class='query'>" .$this->db->last_query() ."</div>";

    return $q;
  }
  function get_items_categories(){

    $subquery = $this->db->select('item_id')->get_compiled_select($this->stock_items_table);
    $select = "i.id, i.name as item_name, c.name as category_name";
    $this->db->select($select, true)
      ->from("$this->items_table i")
      ->join("$this->items_categories_table c", 'c.id=i.item_category');

    $q = $this->db->where('current_qty>0')->order_by('item_category')->get();

    //echo"<b>transactionz " .$this->db->last_query() ."</b>";

    return $q->result();
  }

  function get_items_categories_stock($stock_id, $in_stock=true){
    $subquery = $this->db->select('item_id')
      ->where('stock_id', $stock_id)
      ->where('current_qty > 0')
      ->get_compiled_select($this->stock_items_table);

    $select = "i.id, i.name as item_name, c.name as category_name";
    $this->db->select($select, true)
      ->from("$this->items_table i")
      ->join("$this->items_categories_table c", 'c.id=i.item_category')
      ->join("$this->stock_items_table si", 'i.id=si.item_id');
      
    if($in_stock){
      $this->db->where("i.id in($subquery)");
    }else{
      $this->db->where( "i.id not in($subquery)");
    }

    $q = $this->db->order_by('item_category')->get();

    return $q->result();

  }

  function save_items($stock_id, $item_id, $qty){
    $ins_arr = array(
      'stock_id'  => $stock_id, 
      'item_id' =>$item_id,
      'current_quantity', $qty
    );

  }

/*

  function add_item_stock($item_ids = array(), $stock_id){
    foreach ($item_ids as $key) {
      // code...
    }
  }
 */
  



}

