<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('order_details_model');
    $this->load->library('unit_test');
  }

	public function index()
	{
    $this->unit->run($this->order_details_model->get_order_sum(129));
    echo $this->unit->report();
	}
}
