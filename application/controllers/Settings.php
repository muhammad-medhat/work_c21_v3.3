<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Frontend_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model( array('stock_model', 'settings_model', 'stock_items_model', 'deffered_item_model') ); 
    //$this->current_view = $this->admin_view .'settings/';
    $this->data['sidebar'] = 'app/settings/sidebar';
    $this->view = 'app/settings/';
    $this->data['settings'] = $this->settings_model->get();
    $this->data['settings_groups'] = $this->settings_model->get_groups();

  }

  function index(){
     $this->data['subtitle'] = 'لوحة التحكم';
     //$this->data['main_content'] = $this->view .'index';
     $this->data['main_content'] = $this->view .'default';
     $groups = $this->data['stocks'] = simple_array( $this->stock_model->get() );
     $groups = $this->data['settings_groups'];
     $this->load->view("$this->template", $this->data);  
  }
  function update_settings(){
//var_dump($_POST);
foreach ($this->input->post('id') as $key=>$sid) {

     $val = $this->input->post("val[$key]");
     
     $chk = $this->input->post("val[$sid]");
     $enabled = isset($chk)? 1 : 0;

     $arr = array('value'=>$val);

     $this->settings_model->save($arr, $sid);
     $this->session->set_flashdata('message', 'تم حفظ الاعدادات');
     $this->index();
     //echo "============update set value = val[$key] where id= $key<br> " ;
     //echo $this->db->last_query().'<br />';
   }
  }

   function users(){
    $this->data['users'] = $this->user_model->get();
    $this->data['subtitle'] = 'اضافة مستخدم';
    $this->data["main_content"] = 'app/users/add_user';
    $this->load->view($this->template, $this->data);   
   }
  
  function users_list(){
    $this->data['users'] = $this->user_model->get();
    $this->display_view('app/users/users_list', 'قائمة المستخدمين');
  }

  public function add_user()
  {
     $rules = $this->user_model->rules;

     $this->form_validation->set_rules($rules);

     if($this->form_validation->run() == true){
       
       $data = $this->user_model->array_from_post(array('name', 'username',   'password'));
       $data['password'] = md5($data['password']);

       $this->user_model->save($data);
       
       redirect('settings/users');
     } else{
       $this->users();
     }

  }


}

