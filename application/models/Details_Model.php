<?php
  class Details_Model extends CI_Model{

    protected $_table_name = '';
    protected $_table1_name = '';
    protected $_table2_name = '';
    protected $_table1_id = '';
    protected $_table2_id = '';
    protected $_primary_key = 'id';
    public $rules = array();
    protected $_timestamp = false;

      public function __construct(){
        parent::__construct();
      }

    function get($id){
      echo"ssssss $this->_table1_id sssssss";
      return $this->db->where($this->_table1_id, $id)
        ->get($this->_table_name)->result();
      //$return $ret->result();
    }


    public function save($data, $id=null){

      if($this->_timestamp == true){
        $now = date(mysql_datetime_format);
        $id || $data['created'] = $now;
        $data['modified'] = $now;
      }

      if($id===null){
        //insert 
        !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = null;
        $this->db->insert($this->_table_name, $data);
        $id = $this->db->insert_id();
      } else{


        //update
        $filter = $this->_primary_filter;
        //??bug gets a value of id=0, intvar(id) always becoms 0
        //$id = $filter($data[$this->_primary_key]);
        

        $this->db->set($data);
        $this->db->where($this->_primary_key, $id);
        $this->db->update($this->_table_name);

      } 

      return $id;
    }

    public function delete($id){
      

      if(!$id){
        return false;
      }
      $this->db->where($this->_primary_key, $id);
      $this->db->limit(1);
      $this->db->delete($this->_table_name);
    }
    function array_from_post($fields){
      
      $data = array();
      foreach($fields as $field){
        $data[$field] = $this->input->post($field);
      }
      return $data;
    }


  function result_ret($q){
    //q represents the db query object
      switch (true) {
      case $q->num_rows() ==1:
          return $q->row();
          break;
      case $q->num_rows() > 1:
        return $q->result();
      default:
          return null;
          break;
      }
  }

    
  }
?>
