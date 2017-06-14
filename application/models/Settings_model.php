<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Settings_model extends MY_Model {

  protected $_table_name=settings_table;
  protected $_order_by = 'id';

  public function __construct(){
    parent::__construct();
  }

  function get_gs(){
    $settings = $this->get();
    $gs = array();
    foreach ($settings as $key) {
      $gs[$key->name] = $key->value;
    }
    return $gs;
  }

  function get_names(){
    $settings = $this->get_gs();
    $gs = array();
    foreach ($settings as $key) {
      $gs[$key->name];
    }
    return $gs;
  }

  function get_groups(){
    return $this->db->get('settings_groups')->result();
  }

  

}

