<?php
$this->table->set_template($this->template);
$this->table->add_row('القائمة',    form_input('name', $this->input->post('name') ));
$this->table->add_row('', form_submit('submit', 'اضافة', "class='button round blue image-right ic-add text-upper'") );

echo form_open('product/add_category');
echo '<h4><u>بيانات المنتج</u></h4>';
 echo $this->table->generate();
echo form_close(); ?>

