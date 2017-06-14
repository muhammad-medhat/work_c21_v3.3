<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function index()
	{

    $data['page_title']   = 'تسجيل الدخول';

		$data['main_content'] = 'app/login/login_form';
		$this->load->view('template/login/index', $data);		
  }

	
	function validate_credentials()
	{		
		$query = $this->user_model->validate();
//echo $this->db->last_query();
		if($query) 
    {
      $username = $this->input->post('username');

      //$shift_id = $this->order_model->new_shift();

      $data = array(

        'is_logged_in'  => true,
        //'shift_id'      => $shift_id,

      );
      
      
      $this->session->set_userdata($data);
     if($this->session->userdata('role') == 'admin')
       redirect("administrator");
     else
       redirect("shift");
		}
		else // incorrect username or password
		{
      $this->session->set_flashdata('error', 'Invalid username or password');
			$this->index();
		}
  }	

  function create_session()
  {

    $this->db->insert('sessions', array('username'=>$this->session->userdata('username')));
  }

	function logout()
	{
    $this->session->sess_destroy();
		$this->index();
	}

}
