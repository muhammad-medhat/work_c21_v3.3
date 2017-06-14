<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Order_details_model extends MY_Model {

  protected $_table_name=order_details_table;

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
  }

  function get_order_details($order_id, $merge=false){
    // this is a customised version of the get() method in the model
    $qty = ($merge)?'sum(od.' .order_details__quantity .') as ' .order_details__quantity:'od.' .order_details__quantity;
    $price = ($merge)?order_details__quantity .' *'.products__price :'p.' .products__price;
    $select = array(
      'od.' .order_details__id,
      'od.' .order_details__order_id, 
      'od.' .order_details__product_id, 
      $qty,
      'p.'  .products__name, 
      $price .' as price'
    );
    
    $this->db->select($select, true)
      ->from("$this->order_details_table od")
      ->join("$this->products_table p", 'p.id=od.product_id')
      ->where('od.order_id', $order_id);
    
    if($merge){
      $this->db->group_by('od.product_id');
    }
    $query = $this->db->get();

    echo "<div class='query'>" .$this->db->last_query() ."</div>";
    return $query->result();
  }

  function get_order_sum($order_id){
    $od = $this->get_order_details($order_id);
    $sum = 0;
    if($od){
      foreach ($od as $key) {
        $sum += $key->price;
      }
    }
    return $sum;
  }


}
