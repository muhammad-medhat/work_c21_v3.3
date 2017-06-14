<style type="text/css" media="all">
input[type='number']{width:2em;height:1em}
form label{display:inline}
  .checkbox{width:2px}
  span{text-align:right;padding:2px;}

h2{margin:1em;}
.items{list-style:none;}
</style>
<?php 
  //$this->table->set_template($this->table_template);
$tables = array();
//$this->table->set_heading('','اسم الاعداد','القيمة');
echo form_open('settings/update_settings');


    foreach($settings_groups as $g) { 
        echo "<div style='border:solid 1px'>";
        echo    "<h2>$g->name</h2>";
        echo    "<ul class='items'>";
        foreach($settings as $s) { 
          if($s->settings_group == $g->id){
           $checked = ($s->enabled == 1)? 'checked=true':'';
            echo "<li>";
            echo " <input type='hidden' name='id[]'  value='$s->id' />";
            echo "  <span ><input type='checkbox' name='chk[]' value='$s->enabled' $checked /></span>";
            echo "  <span ><label>$s->arabic</label></span>";
            echo "  <span><input type='number' name='val[]' 
                        value='$s->value' title='$s->arabic' placeholder='$s->arabic' />
                    </span>";
            echo "</li>";
          }
          echo "</li>";
        }
        echo "</div><br><br />";

      }
  echo '<input type="submit" name="" id="" value="" />';
  echo form_close();

?>
