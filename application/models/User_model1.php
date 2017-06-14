<?php

class User_model extends MY_Model {

    protected $_table_name = users_table;
  function __consrtruct(){
    parent::__construct();
  }
   public $rules = array(
      'name' =>array(
        'field'  => 'name', 
        'label'  => 'الاسم', 
        'rules'  => 'trim|required'
      ),
      'username' => array(
        'field'   => 'username', 
        'label'   => 'اسم المستخدم', 
        'rules'   => 'trim|required|is_unique[' .users_table . '.' .users__username .']'
      ),
      'password' => array(
        'field'   => 'password', 
        'label'   => 'كلمة المرور', 
        'rules'   => 'trim|required'
      ),
      'confirm' => array(
        'field'  => 'confirm', 
        'label'  => 'تأكيد كلمة المرور', 
        'rules'  => 'trim|required|matches[password]'
      )
    );

  


	function validate()
	{
    $username =  $this->input->post('username');

    $password = md5( $this->input->post('password')) ;

    $this->db->where(users__password, $password);
    $this->db->where(users__username, $username);
    $query = $this->db->get( $this->_table_name );
    
		if($query->num_rows() == 1)
		{
      $sess_data = array();

      foreach ($query->row() as $key=>$value) {
        $sess_data[$key] = $value;
      }

      $this->session->set_userdata($sess_data);
      //var_dump($sess_data);
      //$this->session->set_userdata($query->row() );
			return true;
		}
    else
      return false;
		
	}

  function get_id()
  {
  }

  function get_username($_id)
  {
    $this->db->where(users__id, $_id) ;
    $query = $this->db->get($this->_table_name);
    $return_arr = $query->result();
    
    return $return_arr[0]->username; 	
  }

  function loggedin(){
      $return = (bool) $this->session->userdata('loggedin');
  //write_file(APPPATH ."/test_files/test.txt", "##\n check is logged in is $return\n", 'a');
      return $return;

  }


    
  
}

