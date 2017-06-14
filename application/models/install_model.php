<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Install_model extends CI_Model {

   //protected $_table_name = 'articles';
  
  function __construct()
  {
    parent::__construct();
  }

  function load_db($file_name){
  /*  max_execution_time
      memory_limit=
post_max_size
upload_max_filesize*/
    $this->load->helper('file');
    $this->load->library('upload');
    $this->upload->do_upload($file_name);
    
    //echo "<b><i>$file_name</i></b>";
    $string = file_get_contents($file_name);
    //echo $string;
    return $string;
  }

}

