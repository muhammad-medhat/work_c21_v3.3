<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Product_Items_model extends Details_Model {

  function __construct()
  {
    parent::__construct();

    $this->items_categories_table = $this->db->dbprefix(items_categories_table);
    $this->items_units_table = $this->db->dbprefix(items_units_table);
    $this->_table_name = $this->db->dbprefix(products_items_table);
    $this->_table1_name = $this->db->dbprefix(products_table);
    $this->_table2_name = $this->db->dbprefix(items_table);
    $this->_table1_id = 'product_id';
    $this->_table2_id = 'item_id';
  }

  function delete_product_item($id){
    //id of the association
    $this->delete($id);
  }

  function product_decrease_items($product_id, $amount){
    $items = $this->product_model->get_product_items($product_id);
    $shift_id = $this->session->userdata('shift_id');
    switch(true){
      case is_array($items): 
      foreach ($items as $i) {    
        $this->stock_items_model->deffered_stock_items( $i->item_id, $i->amount * $amount, $shift_id);
      }
      break;
      case is_object($items):
        $this->stock_items_model->deffered_stock_items( $items->item_id, $items->amount * $amount, $shift_id);

        break;
      default:

       }

    }
}
