<style type="text/css" media="all">
  .checkbox{width:2px}
  td{text-align:right;padding:2px}
</style>
<?php 
  $this->table->set_template($this->table_template);
  $this->table->set_heading('','اسم الاعداد','القيمة');
        foreach($settings as $s) { 
          $this->table->add_row(
            array('data'=>form_checkbox("chk_$s->id",'en', $s->enabled), 'style'=>'width:2%'),
            array('data'=>$s->arabic),
            array('data'=>form_input($s->name, $s->value))
          );
        }
  echo $this->table->generate();
?>
