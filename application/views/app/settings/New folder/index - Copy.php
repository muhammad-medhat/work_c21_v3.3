<style type="text/css" media="all">
  .checkbox{width:2px}
  td{text-align:right;padding:2px}
</style>
<?php 
  //$this->table->set_template($this->table_template);
$tables = array();
//$this->table->set_heading('','اسم الاعداد','القيمة');
echo form_open('settings/update_settings');


    foreach($settings_groups as $g) { 
        echo "<div style='border:solid 1px'>";
        echo    "<h2>$g->name</h2>";
        foreach($settings as $s) { 
          if($s->settings_group == $g->id){ 
            $this->table->add_row(
              array('data'=>form_checkbox("chk_$s->id",'en', $s->enabled), 'style'=>'width:2%'),
              array('data'=>$s->arabic),
              array('data'=>form_input($s->name, $s->value))
            );
          }
          echo $this->table->generate();
          $this->table->clear();
        }
        echo "</div>";
      }
  echo '<input type="submit" name="" id="" value="" />';
  echo form_close();

?>
