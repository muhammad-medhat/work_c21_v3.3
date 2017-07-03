<style type="text/css" media="all">
 legend{padding:0.5em;margin:0.5em;border:solid 1px;font-weight:bold;} 
fieldset{border:solid 1px;border-radius: 5px;}
.set-content{}
.set-content tr{}
.set-content tr td {}
.chk{}
</style>

<?php //var_dump($settings)?> 
<?=form_open('settings/update_settings');?>
<?php foreach($settings_groups as $g) { ?>
  <fieldset>
    <legend><?=$g->name?></legend>
      <table class='set-content'>
<?php   foreach($settings as $s) { ?>
<?php      if($s->settings_group == $g->id){ ?>
                  
                  <?php if($s->enabled){ ?>
                  <?=form_input(array('type'=>'hidden', 'name'=>'id[]', 'value'=>$s->id) )?>
                  <tr>
                    <?php if($g->notes) {?>

                      <td class='chk'><?= form_checkbox(
                        array('name'=>'chk',  'value'=>$s->id, 'checked'=>$s->enabled, 'title'=>$g->notes) ) ?>
                      </td>

                    <?php } ?>
                    <td><?= $s->arabic   ?></td>
                    <td>
                      <?php switch($s->html){  
                          case 'ddl':
                            echo form_dropdown('val[]', $stocks, $s->value);
                            break;
                          case'password': 
                            echo form_password('val[]', $s->value, 'style="padding:0"');
                            break;
                          case 'checkbox':
                            echo form_checkbox( 
                              array(
                                  'name'=>'val[]', 
                                  'value'=>$s->id, 
                                  'checked'=>$s->value, 
                                  'title'=>$g->notes ) );
                            break;
                          case'inv_approx':
                            echo form_dropdown('val[]', array(
                              1=>'Nothing', 
                              2=>'half', 
                              4=>'quarter'), 
                            $s->value);
                            break;
                          default:
                            echo form_input(array('type'=>'number', 'name'=>'val[]','value'=>$s->value ));
                            break;
      
                        } ?>
                    </td>
                  </tr>
                  <?php } ?>
<?php      } ?>

<?php   } ?>
        </table>
  </fieldset>
<?php } ?> 
 
<?=form_submit('submit', 'حفظ الاعدادات', 'class="button  blue"')?>
 
 
<?=form_close()?>
