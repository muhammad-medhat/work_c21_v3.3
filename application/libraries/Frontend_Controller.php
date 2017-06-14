<?php
  class Frontend_Controller  extends MY_Controller{

    public $data = array();

      public function __construct(){
        parent::__construct();
        $this->load->model('product_model');

        $this->template = 'template/index';
        $this->data['Controller'] = config_item('Frontend_Controller');

        $this->data['products'] = $this->product_model->get();
        $this->data['categories'] = $this->product_model->get_categories();
        //$this->data['tables'] = $this->order_model->get_tables_total();
        $this->data['tables'] = $this->order_model->get_tables();
        $this->data['sections'] = $this->order_model->get_sections();


        if($this->session->userdata('is_logged_in') ==''){
          redirect('login');
        }
      //echo '<h1>shift id is ' .$this->session->userdata('shift_id').'</h1>';
        //var_dump($this->session->userdata);
      }
  }
?>
