<?php
$this->table->set_template($this->template);
$this->table->add_row('اسم المنتج بالعربية',    form_input('arabic', $this->input->post('arabic') ));
$this->table->add_row('اسم المنتج بالانجليزية',  form_input('name', $this->input->post('name') ));
$this->table->add_row('السعر',                  form_input('price', $this->input->post('price') ));
$this->table->add_row('الوصف',                  form_input('desc', $this->input->post('desc') ));
$this->table->add_row('القائمة',                form_dropdown('cat_id', array('...', $categories), $this->input->post('caty_id')));
$this->table->add_row('', form_submit('submit', 'اضافة', "class='button round blue image-right ic-add text-upper'")
);

echo form_open('admin/product/adding');
echo '<h4><u>بيانات المنتج</u></h4>';
 echo $this->table->generate();
echo form_close(); ?>
