<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Item_model extends MY_Model {

  function __construct()
  {
    parent::__construct();

    $this->stock_items_table = $this->db->dbprefix(stock_items_table);
    $this->items_categories_table = $this->db->dbprefix(items_categories_table);
    $this->items_units_table = $this->db->dbprefix(items_units_table);
    $this->_table_name = $this->db->dbprefix(items_table);
  }
    public $new_rules = array(
      'name'=>array(
        'field'=>items__name, 
        'label'=>'اسم الخامة', 
        'rules'=>'trim|required'
      ),
      'reorder_level'=>array(
        'field'=>items__reorder_level, 
        'label'=>'حد الطلب ', 
        'rules'=>'trim|required|is_numeric'
      ),      
      'category'=>array(
        'field'=>items__item_category, 
        'label'=>'القائمة', 
        'rules'=>'required'
      )
    );


  function get_items($limit=general_limit, $offset=0){
    $q = $this->db->select('i.*, c.name as cname, COALESCE(s.current_qty, 0) as current_qty', false)
      ->from("$this->items_table i")
      ->join("$this->items_categories_table c", 'c.id=i.'.items__item_category)
      ->join("$this->stock_items_table s", 's.item_id = i.id')
      ->join("$this->stocks_table st", 's.stock_id = st.id')
      ->limit($limit, $offset)
      ->get();
    //echo "<div class='query'>" .$this->db->last_query() ."</div>";
    return $this->result_ret($q);
  }

  function get_stock_items_num(){
    return $this->db->get($this->stock_items_table)->num_rows();
  }

  function get_items_categories($inverse=false){
    //$subquery = $this->db->select('item_id')->get_compiled_select($this->stock_items_table);
    $select = "i.id, i.name as item_name, c.name as category_name";
    $this->db->select($select, true)
      ->from("$this->items_table i")
      ->join("$this->items_categories_table c", 'c.id=i.item_category', 'left');
    if($inverse){
      $this->db->join("$this->stock_items_table si", 'i.id=si.item_id')->where_not_in('i.id', $subquery);
    }
    $q = $this->db->order_by('c.id')->get();
    //$q = $this->db->order_by('item_category')->get();

    //echo "<div class='query'>" .$this->db->last_query() ."</div>";
    return $q->result();
  }
  function get_items_categories_stock($stock_id, $in_stock=true){
    $subquery = $this->db->select('item_id')
      ->where('stock_id', $stock_id)
      ->get_compiled_select($this->stock_items_table);

    $select = "i.id, i.name as item_name, c.name as category_name";
    $this->db->select($select, true)
      ->from("$this->items_table i")
      ->join("$this->items_categories_table c", 'c.id=i.item_category');
    if($in_stock){
      $this->db->where("i.id in ($subquery)");
    }else{
      $this->db->where("i.id not in($subquery)");
    }

    $q = $this->db->order_by('item_category')->get();
    echo"<b>" .$this->db->last_query() ."</b>";

    return $q->result();

  }


  function get_category($id){
    $q = $this->db->get_where($this->items_categories_table, array(items_categories__id=>$id));
    if($q->num_rows() == 1)
      return $q->row();
    else
      return null;
  }

  function get_unit_name($id){
    $unit = $this->db->get_where($this->items_units_table, array(items_units__id=>$id))->row();
    $name = items_units__name;
    return $unit->$name;

  }
  
  function get_limit($limit, $offset){
      return $this->db->limit($limit, $offset)
        ->get($this->_table_name)
        ->result();
   }
  
  function num_category_items($_cat_id){
    $this->db->where(items__item_category, $_cat_id);
    $q = $this->db->get($this->_table_name);
    return $q->num_rows();
  }

  function get_category_items($_cat_id)
  {
    /*
     * Gets all items of $_cat_id
     * */
    $this->db->where(items__item_category, $_cat_id);
    $q = $this->db->get($this->_table_name);
    return $q->result();
  }

  function get_categories()
  {
    $q = $this->db->get($this->items_categories_table);
    return $q->result();
  }

  function get_categories_ddl()
  {
    $cats = $this->get_categories();
    foreach ($cats as $c) {
      $ret[$c->id] = $c->name;
    }
    return $ret;
  }
  function get_units_ddl(){
    $q = $this->db->get($this->items_units_table)->result();
    return simple_array($q, items_units__name);
  }
  
  function save_category($id=null, $name){
    if($id!=null){
      $this->db->where(items_categories__id, $id)
        ->update($this->items_categories_table, array(items_categories__name=>$name) );
    } else{
      $this->db->insert( $this->items_categories_table, array(items_categories__name=>$name));
    }
  }
/*
  function increase_item($item_id, $amount){
    $qty = items__current_qty;
    $item = $this->get($item_id);
    $item->$qty -= $amount;
    $this->save($item, $item_id);
  }
 */
  function get_item_info($item_id, $stock_id){
    $q = $this->db->select('i.id, i.name, si.current_qty', true)
      ->from("$this->items_table i")
      ->join("$this->stock_items_table si", 'i.id=si.item_id')
      ->where('i.id', $item_id)
      ->where('si.stock_id', $stock_id)
      ->get();
    
    if($q->num_rows() == 1)
      return $q->row();
    return null;
  }

}
/*
 *adding a product to order
  1. foreach itrem in ptoduct ingtediants'
  2. decrease the amount of item in stock by its smouny inthe ptofuct
 *
 *
 *
 *
 *
 * */
