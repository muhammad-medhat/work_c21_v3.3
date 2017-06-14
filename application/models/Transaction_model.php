<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Transaction_model extends MY_Model {

    //protected $_table_name = 'articles';
    protected $_order_by = items_transactions__date;
    protected $_timestamp = true;
  
  function __construct()
  {
    parent::__construct();

    $this->items_categories_table = $this->db->dbprefix(items_categories_table);
    $this->items_units_table = $this->db->dbprefix(items_units_table);
    $this->items_transactions_table = $this->db->dbprefix(items_transactions_table);
    $this->items_transactions_types_table = $this->db->dbprefix(items_transactions_types_table);
    $this->_table_name = $this->db->dbprefix(items_transactions_table);
  }
    public $new_rules = array(
      'name'=>array(
        'field'=>items__name, 
        'label'=>'اسم الخامة', 
        'rules'=>'trim|required'
      ),
      'reorder_level'=>array(
        'field'=>items__reorder_level, 
        'label'=>'حد الحلب ', 
        'rules'=>'trim|required'
      ), 
      'category'=>array(
        'field'=>items__item_category, 
        'label'=>'القائمة', 
        'rules'=>'required'
      ) 
    );



    function get_type($id){
      return $this->db->where('id', $id)->get($this->items_transactions_types_table)->row();
    }

    function get_item_name($id){
      $item = $this->item_model->get($id);
      $name = items__name;
      return $item->$name;
    }

    function get_limit($limit, $offset){
      return $this->db->limit($limit, $offset)
        ->get($this->_table_name)
        ->result();
    }
    function paginate($_limit = general_limit, $_offset){
    $num_rows = $this->transaction_model->num_rows();
    $per_page = general_limit;
    $this->load->library('pagination');

    $offset = $this->uri->segment(4);

      $config['base_url']     = site_url('admin/transaction/index/'  );
      $config['total_rows']   = $num_rows;
      $config['per_page']     = $per_page;
      $config['uri_segment']  = 4;
      $this->pagination->initialize($config);
      var_dump($config);
        echo"<h1>offser is $offset</h1>";
    }




  function get_category1111($id){
    $q = $this->db->get_where($this->items_categories_table, array(items_categories__id=>$id));
    if($q->num_rows() == 1)
      return $q->row();
    else
      return null;
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

}

