<?php
//$this->table->set_template($this->template);
//$this->table->set_heading();
  foreach ($categories as $c) {
      //echo form_hidden('cat_id[]', $c->id); 
    $this->table->add_row(
      form_input('name[]', $c->name),form_hidden('cat_id[]', $c->id)
    );
  }
$this->table->add_row(array( 'data'=>form_input('new', '', 'placeholder="اضافة تصنيف جديدذ"') ));
$this->table->add_row(array( 'data'=>form_submit('submit', 'اضافة/تعديل'), 'class'=>'button blue round ic-edit'));

echo form_open('admin/item/add_edit');
  echo $this->table->generate();
echo form_close(); ?>
