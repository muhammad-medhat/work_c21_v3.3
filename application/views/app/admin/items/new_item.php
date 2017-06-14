<?php
$this->table->set_template($this->template);
  
$this->table->add_row('اسم الخامة',   form_input('name',          $this->input->post('name')          ));
$this->table->add_row('حد الطلب',     form_input('reorder_level', $this->input->post('reorder_level') ));    
$this->table->add_row('الوصف',        form_input('desc',          $this->input->post('desc')          ));
$this->table->add_row('القائمة',      form_dropdown(items__item_category, $categories, $this->input->post(items__item_category)));
$this->table->add_row('وحدى القياش',  form_dropdown(items__item_unit, $units, $this->input->post(items__item_unit)));

$this->table->add_row('', form_submit('submit', 'اضافة', "class='button round blue image-right ic-add text-upper'"));


echo form_open('admin/item/new_item_add');
    echo '<h4><u>بيانات الصنف</u></h4>';
    echo $this->table->generate();
echo form_close(); ?>

