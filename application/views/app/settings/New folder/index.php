<style type="text/css" media="all">
    input[type='number']{width:3em;height:1em}
    form label{display:inline}
      tr{display:block;}
      td{border:solid 1px}
      .chk{width:2px;border:solid red 1px}
      span{text-align:right;padding:2px;}

h2{margin:1em;}
.items{list-style:none;}
</style>
<?php 
//var_dump($settings);
  //$this->table->set_template($this->table_template);
$tables = array();
//$this->table->set_heading('','اسم الاعداد','القيمة');
echo form_open('settings/update_settings');


foreach($settings_groups as $g) { ?>
  <div style='border:solid 1px'>
    <h2><?= $g->name?> </h2>
      <table>

<?php   foreach($settings as $s) { ?>
<?php      if($s->settings_group == $g->id){?>
<?php            $checked = ($s->enabled == 1)? 'checked':''; ?>
          <tr>
          
              <td><input type='hidden' name='id[]'  value='<?= $s->id ?>' /></td>
              <td class='chk'>
                <input type='checkbox' name='chk[]' id='<?= "chk_" .$s->id?>' value='<?= $s->id?>' <?= $checked ?> />
              </td>
              <td><label><?= $s->arabic ?> </label></td>
              <td><input type='number' name='val[]' 
                    value='<?= $s->value?>' title='<?= $s->arabic?>' placeholder='<?= $s->arabic?>' />
              </td>
            </tr>
<?php      }?>
<?php    }?>
      </table>
    </div>

<?php }?>
  <input type="submit" name="" id="" value="Save" />
<?= form_close()?>
