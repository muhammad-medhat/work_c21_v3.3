<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Table_model extends MY_Model {

  protected $_table_name=customers_table;
  protected $_order_by='section_id';

  function __construct(){
    parent::__construct();
  }
  function get_free1(){
    //get tavle names only
    return $this->db->where('is_available', 1)
      ->get($this->_table_name)
      ->result();
  }
  
  function get_free(){
    //get tavle name and section name
    return $this->db->select("c.id,concat( s.name,  '-', c.name) as name ")->
      from("$this->_table_name  c")->
      join('customers_sections s', 's.id=c.section_id')->
      where('is_available', 1)->get()->result();
  }
   
  function get_sections(){
    return $this->db->get('customers_sections')->result();
  }
//  function get_sections_num(){}

  function add_section($data){
    $this->db->insert('customers_sections', $data);
    $id = $this->db->insert_id();  
  }

  function get_tables(){
    $q = $this->db->select('t.*, s.name as section')
      ->from("$this->_table_name t")
      ->join('customers_sections s', 't.section_id=s.id', 'left')
      ->get();
    return $this->result_ret($q);
  }

  function get_num_tables($section_id=''){
    //gets the number of tables m the given section
    //or all tables if no sectrion is given
    if($section_id != '')
      $this->db->where('section_id', $section_id);
    $q = $this->db->get($this->_table_name);

    return $q->num_rows();
  }

}

