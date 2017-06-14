<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tables extends Frontend_Controller {

  function __construct(){
    parent::__construct();
    $this->view = 'app/tables/';
    $this->data['sidebar'] = $this->view .'sidebar'; 
    $this->load->model('table_model');
  }

	public function index()
	{
    //$this->table_model->get();
  }
  
  public function add_section(){
    $this->form_validation->set_rules('section_name', 'اسم القاعة', 'required');
    if($this->form_validation->run() == true){
      $name = $this->input->post('section_name');
      $this->table_model->add_section(array('name'=>$name));
    } 
    $this->add();
  }

  public function add(){

    $this->data['sections'] = simple_array($this->table_model->get_sections()); 
    if($this->input->post('submit')){
      $this->form_validation->set_rules('section', 'القاعة', 'required');
      $this->form_validation->set_rules('num', 'عدد الطاولات', 'required');
      $prefix = $this->input->post('prefix');
      if($this->form_validation->run() == true){
        $section = $this->input->post('section');
        $num = $this->input->post('num');
        ($prefix == '')? 't_': $prefix;

        for ($i = 0; $i < $num; $i++) {
          $tid = $this->table_model->save(array('name'=>$prefix .$i, 'section_id'=>$section));
          //$this->table_model->save(array( 
          //    'name'=>$prefix .$tid, 
          //    'section_id' =>$section
          //  )
          //);
        }
      }
    }
    $this->display_view($this->view .'ind', 'اضافة طاولات');
  }

  public function edit_tables(){
    $this->data['tables'] = $this->table_model->get_tables();
    $this->display_view($this->view .'edit_tables', 'تعديل الطاولات');
  }
  
  public function edit_table($tid, $name){
    $this->table_model->save(array('name'=>$name), $tid);
  }
  
  public function delete($tid){
    $this->table_model->delete((int)$tid);
  }
}
