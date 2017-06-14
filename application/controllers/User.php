<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Frontend_Controller {

  function __construct(){
    parent::__construct();
     $this->data['sidebar'] = 'app/users/sidebar';
  }

	public function index()
  {
    $this->add();

    $this->data['subtitle'] = 'مستخدمين البرنامج';

    //$this->data["main_content"] = $this->admin_view .'/add_user';
    //$this->load->view($this->template, $this->data);

  }
  public function all(){
    $list = $this->user_model->get();
    var_dump($list);
  }

  public function add()
  {
    $this->data['users'] = $this->user_model->get();
    $this->data['subtitle'] = 'اضافة مستخدم';
    //$this->load->library('table');
    
    $this->data["main_content"] = 'app/users/add_user';
    $this->load->view($this->template, $this->data);
  }


  public function adding()
  {
        $rules = $this->user_model->rules;

        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == true){

          
          $data = $this->user_model->array_from_post(array('name', 'username',   'password'));
          $data['password'] = md5($data['password']);



          $this->user_model->save($data);
          
          redirect('settings/users');
        } else{
          $this->add();
        }

  }
}
