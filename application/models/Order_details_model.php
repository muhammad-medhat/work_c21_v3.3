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

  function get_order_details($order_id){
    // this is a customised version of the get() method in the model
    $select = array(
      'od.' .order_details__id,
      'od.' .order_details__order_id, 
      'od.' .order_details__product_id, 
      'od.' .order_details__quantity,
      'p.' .products__name, 
      'p.' .'name as eng', 
      'p.' .products__price 
    );
    
    $this->db->select($select);
    $this->db->from("$this->order_details_table od");

    $this->db->join("$this->products_table p", 'p.id=od.product_id');
    $this->db->where('od.order_id', $order_id);

    $query = $this->db->get();

    return $query->result();
  }

  function decrease_product($order_id, $product_id, $qty=1){
    //removes a product from the order
    $this->db->where('order_id', $order_id)
      ->where('product_id', $product_id)
      ->set('quantity', "quantity-$qty", false)
      ->update($this->_table_name);

  }

  function get_order_sum($order_id){
    $od = $this->get_order_details($order_id);
   /* echo"<div class='blue' style='display:block'>od is $order_id";
    var_dump( $od);echo "</div>";
    */
    $sum = 0;
    if($od){
      foreach ($od as $key) {
        $sum += $key->price*$key->quantity;
      }
    }
    //echo $this->db->last_query();
    return $sum;
  }

  function get_count($order_id){
    $q = $this->db->select('id, order_id')
      ->where('order_id', $order_id)
      ->get($this->_table_name);
    return $q->num_rows();
  }

  function clear_order($order_id){
    $this->db->where('order_id', $order_id)->delete($this->_table_name);
  }

}
