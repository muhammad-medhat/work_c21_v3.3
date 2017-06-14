<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

	public function index()
	{
    $this->load->model('install_model');

    $this->_default();
  }

  function _default(){
    /*
     * execute the sql script 
     * or display form for db fields
     * host, user, password, db input
     * */
  
      $this->uploads_folder = realpath(APPPATH .'uploads/');
    $this->install_model->load_db($this->uploads_folder .'/work_c21.sql');
  }

}
