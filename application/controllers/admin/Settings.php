<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller {

  function __construct(){
    parent::__construct();
    $this->output->enable_profiler(false);
    $this->load->model( array('settings_model', 'stock_items_model', 'deffered_item_model') ); 
    $this->current_view = $this->admin_view .'settings/';
     $this->data['sidebar'] = 'app/admin/settings/sidebar';
  }

  function index(){
     $this->data['subtitle'] = 'لوحة التحكم';
     $this->data['main_content'] = $this->admin_view .'index';

     //    $this->reorder_items();
    $this->load->view("$this->template", $this->data);
    
  
  }
  function index1(){
    $this->general_settings();
  }



  function general_settings(){
    $this->data['settings'] = $this->settings_model->get();

    //$this->data['main_content'] = 'app/admin/views/index';
    $this->data['subtitle'] = 'اعدادات البرنامج';
    $this->data['main_content'] = $this->current_view .'index';
    $this->load->view("$this->template", $this->data);
  }

  function stock_items_more(){

    $limit = (int)$this->data['settings']['general_limit']->value;

    $this->data['items'] = $this->deffered_item_model->get_deffered_items($limit);
    //echo $this->db->last_query();
    $this->data['subtitle'] = 'خامات المستخدمة اليوم';

    $this->data['main_content'] = $this->current_view .'stock_items_more';
    $this->load->view("$this->template", $this->data);
  }

  function reorder_items_more(){
    // show items less than the reorder level
    
    $this->data['items'] = $this->stock_items_model->get_items_reorder_level_limit();
    $this->data['subtitle'] = 'خامات للطلب';

    $this->data['main_content'] = $this->current_view .'reorder_items_more';
    $this->load->view("$this->template", $this->data);

  }


}

