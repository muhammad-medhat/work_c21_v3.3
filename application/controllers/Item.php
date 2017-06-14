<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends Frontend_Controller {

	public function index()
	{
    $this->load->model('item_model');
	}

  public function increase($item_id, $amount=0){
  
    $this->item_model->increase($item_id, $amount);
  }
}
