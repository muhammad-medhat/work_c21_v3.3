<?php
  class User_M extends MY_Model{

    protected $_table_name = 'users';
    protected $_order_by = 'name';


    public $rules = array(
      'email'=>array(
        'field'=>'email', 
        'label'=>'Email', 
        'rules'=>'trim|required|valid_email'
      ), 
      'password'=>array(
        'field'=>'password', 
        'label'=>'PPPP', 
        'rules'=>'trim|required'
      )

    );

    public $rules_admin = array(

      'name'=>array(
        'field'=>'name', 
        'label'=>'Name', 
        'rules'=>'trim|required'
      ),
      'email'=>array(
        'field'=>'email', 
        'label'=>'Email', 
        'rules'=>'trim|required|valid_email|callback__unique_email'
      ), 
      'password'=>array(
        'field'=>'password', 
        'label'=>'PPPP', 
        'rules'=>'trim'
        ),
      'password_confirm'=>array(
        'field'=>'password_confirm', 
        'label'=>'Confirm', 
        'rules'=>'trim|matches[password]'
      )
    );
    


      public function __construct(){
        parent::__construct();
      }

    function get_new(){
      $user = new stdClass();
      $user->name = '';
      $user->email = '';
      $user->password = '';
      return $user;
    }


    public function login(){
    
      $user = $this->get_by(array( 
        'email' => $this->input->post('email'), 
        'password' => $this->hash($this->input->post('password')) 
      ), true);
      $user = $user->row();
      if(count($user)){
        $data = array(
          'name'=> $user->name, 
          'email'=> $user->email, 
          'id'=> $user->id, 
          'loggedin'=> true
          );
        
       $this->session->set_userdata($data); 
      }
write_file(APPPATH ."/test_files/test.txt", "login function in users model \n" .$this->db->last_query().";\n", 'a');
      
    }
    public function logout(){
      $this->session->sess_destroy();
    }
    
      public function loggedin(){
        $return = (bool) $this->session->userdata('loggedin');
  write_file(APPPATH ."/test_files/test.txt", "##\n check is logged in is $return\n", 'a');
        return (bool) $this->session->userdata('loggedin');
      }
    
    public function hash($string){
      //return hash(sha512($string, config_item('encription_key')));
      return md5($string);
    }

  }
?>
