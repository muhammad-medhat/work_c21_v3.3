<?php
  class MY_Controller extends CI_Controller{

    public $data = array();

      public function __construct(){

        parent::__construct();

        
        if( !empty($this->sessions->userdata) ){
          $this->session->set_userdata('site_lang', $this->config->item('language'));
        }
        $this->load->model('settings_model');
        $settings = $this->settings_model->get_gs();
        
        $this->data['settings'] = $settings;

        $this->data['site_name'] = config_item('site_name');

        $this->products_table   = $this->db->dbprefix(products_table);
        $this->categories_table = $this->db->dbprefix(categories_table);      
        $this->items_table      = $this->db->dbprefix(items_table); 
        $this->stocks_table     = $this->db->dbprefix(stocks_table); 
        $this->users_table      = $this->db->dbprefix(users_table);

        

        $this->table_template = array(
          'table_open'            => '<table border="0" cellpadding="4" cellspacing="0" class="sortable" style="width:100%">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr class="head">',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        //'row_alt_start'         => '<tr class="odd">',
        //'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);

        
    }
    function paginate($num_rows, $uri_segment, $base_url, $limit=general_limit, $config = array(), $num_links = 3){
      
      //$limit = general_limit;

      $this->load->library('pagination');

      $offset = $this->uri->segment($uri_segment);
      $config['full_tag_open']  = "<div class='my_pagination'>";
      $config['full_tag_close'] = "</div>";
      //$config['num_tag_open']   = "<div class='my_pagination'>";
      //$config['num_tag_close']   = "</div>";
        $config['base_url']     = site_url($base_url);
        $config['total_rows']   = $num_rows;
        $config['per_page']     = $limit;
        $config['uri_segment']  = $uri_segment;
        $config['num_links']    = $num_links;

        $this->pagination->initialize($config);


        $this->data['pagination'] = $this->pagination->create_links();

    }

    function display_view($view, $subtitle){
      $this->data["subtitle"] = $subtitle;
      $this->data['main_content'] = $view;
      $this->load->view($this->template, $this->data);
    }
  }
?>
