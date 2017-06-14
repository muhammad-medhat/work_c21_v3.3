<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Product_model extends MY_Model {

  function __construct()
  {
    parent::__construct();
    $this->_table_name = $this->db->dbprefix(products_table);
    $this->_order_by = 'cat_id';
    $this->products_items_table = $this->db->dbprefix(products_items_table);



    $this->load->dbforge();
    
  }

  function get_category($id){
    $q = $this->db->get_where($this->categories_table, array(categories__id=>$id));
    if($q->num_rows() == 1)
      return $q->row();
    else
      return null;
  }

  function get_category_products($_cat_id)
  {
    /*
     * Gets all products of $_cat_id
     * */
    $this->db->where(products__cat_id, $_cat_id);
    $q = $this->db->get($this->products_table);
    return $q->result();
  }

  function get_categories()
  {
    $q = $this->db->get($this->categories_table);
    return $q->result();
  }

  function get_categories_ddl11111111111()
  {/*simple_array helper function can be used instead*/
    $cats = $this->get_categories();
    foreach ($cats as $c) {
      $ret[$c->id] = $c->arabic;
    }
    return $ret;
  }

  /*
  function add_product($_name, $_price, $_cat, $_desc='')
  {
    $insert_arr = array(
      products__name=>$_name, 
      products__price=>$_price,
      products__desc=>$_desc, 
      products__cat_id=>$_cat
    );
    $this->db->insert($this->products_table, $insert_arr  );
  } 
   */
  function has_assigned_items($product_id){
    $q = $this->db->where(products_items__product_id, $product_id)
      ->get($this->products_items_table);
      return ($q->num_rows() >= 1);
  }

  function is_item_assigned($item_id, $product_id){
    $q = $this->db->get_where($this->products_items_table, array(
          products_items__product_id=>$product_id, 
          products_items__item_id=>$item_id
        ));
    return (bool)$q->num_rows() == 1;

  }
  
  function get_product_item($product_id, $item_id){
    $select = 'pi.id ,pi.product_id, pi.item_id ,pi.amount ,i.name';

    $q = $this->db->select($select)
      ->from($this->products_items_table .' as pi' )
      ->where('pi.product_id',$product_id)
      ->where('pi.item_id',$item_id)
      ->join("$this->items_table i", 'i.id=pi.' .products_items__item_id )
      ->get();
   // echo $this->db->last_query();
    return $this->result_ret($q);
  }

  function get_product_items($product_id, $items_cat=false){
    $select = 
       'pi.id as pi_id ,pi.product_id ,pi.item_id ,pi.amount ,i.name'  ;
    if($items_cat == true)
      $select .=', c.name';
    $select = 'pi.*, i.name';
    $q = $this->db->select($select)
      ->from($this->products_items_table .' as pi' )
      ->where('pi.product_id' ,$product_id)
      ->join("$this->items_table i", 'pi.item_id=i.id' )
      ->get();
    //echo $this->db->last_query();
    return $this->result_ret($q);

  }

  function assign_item($pid, $item_id, $amount){
    $data = array(
        'product_id'=>$pid, 
        'item_id'   =>$item_id, 
        'amount'    =>$amount
    );
    $bool = $this->is_item_assigned($item_id, $pid);


    if($bool){
      $this->db->where(array(
          'product_id' => $pid,
          'item_id'    => $item_id 
        ))
        ->set('amount', $amount)
        ->update($this->products_items_table);  

    } else {
      $this->db->insert($this->products_items_table, $data);
    }
  }

  function unassign($product_id, $item_id){
    $this->db->where('product_id', $product_id)
      ->where('item_id', $item_id)
      ->delete($this->products_items_table);
  }
#################################################
  function add_category($array){
    $this->db->insert($this->categories_table,$array);
  }
###############################################


  function temp_products(){
    $fields = array(
      'id'=>array(
        'type'=>'int', 
        'constraint'=>11
      ), 
      'arabic'=>array(
          'type'=>'varchar', 
          'constraint'=>255
      ), 
      'price'=>array( 'type'=>'double' ),
      'new_price'=>array( 'type'=>'double' )
    );
    $this->dbforge->add_field($fields);
    $this->dbforge->create_table('temp_products', true);
  }
  
  function fill_data(){
    $data = $this->db->select('id, arabic, price') ->get($this->_table_name)->result();
    $this->db->insert_batch('temp_products', $data);
    //echo $this->db->last_query();
  }

  function get_temp(){
    return $this->db->get('temp_products')->result();
  }

  function update_temp($id, $price){
    $this->db->where('id', $id)->set('new_price', $price)->update('temp_products');
  }

  function get_temp_product($id){
      return $this->db->where('id', $id)->get('temp_products')->row();
  }
  function apply_changes($id, $new_price){
    $this->db->where('id', $id)->set('price', $new_price)->update($this->_table_name);
  }
  function end_temp($table_name){
    $this->load->dbforge();
    $this->dbforge->drop_table($table_name, true);
  }

//  function update_temp(){
//    $temp = $this->get_temp();
//    foreach ($temp as $p) {
//      $this->db->updare($p, $p->id);
//    }
//  }
//  function update_multiple(){
//    $temp = $this->get_temp();
//    foreach ($temp as $p) {
//      $this->save($p, $p->id)
//    }  
//  }
}

