<?php 
  $id = categories__id;
  $name = categories__name;
  $this->table->set_heading( 'E', '');
  
  foreach($categories as $c) { 
    $this->table->add_row(
      //array( 'data' => form_input('cname[]', $c->name) ,    'style'=>'width:30%' ),
      array( 'data' => form_input('carabic[]', $c->arabic), 'style'=>'width:30%' ),
      array( 'data' => form_hidden('cid[]', $c->id),        'style'=>'width:40%')
    );
  }
  $this->table->add_row( 
    array( 
      'data'=>form_submit(
        'submit', 
        $this->lang->line('save'), 
        'class="my_button round blue"'
      ),
      'colspan'=>3, 
      'style'=>'text-align:left'
      )
    );
  
  echo form_open('product/editing');
    echo $this->table->generate();
  echo form_close();
  echo $pagination;

?>
