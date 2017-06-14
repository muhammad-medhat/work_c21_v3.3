<?php
  class Admin_Controller extends MY_Controller{

    public $data = array();

      public function __construct(){
        parent::__construct();
        $this->data['meta_title'] = 'My Awsome CMS Admin';
        
        //$this->load->model('product_model');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->helper('file');
//write_file(APPPATH ."/test_files/test.txt", uri_string() .";\n", 'a');
        $this->data['categories'] = $this->product_model->get_categories();
        $this->data['products'] = $this->product_model->get();
        $this->data['tables'] = $this->order_model->get_tables_total();
        
        usort($this->data['products'], 'cmp_cat_id');
      
        $this->template = 'template/admin/index';
        $this->admin_view = 'app/admin/';
        $exception_uris = array( 'login' );
        if(!in_array(uri_string(), $exception_uris) ){
          if( $this->session->userdata('role') != 'admin'  ){
            echo "you have to be admin";
            redirect('login');
          }
        }
          
      }
  }
?>
