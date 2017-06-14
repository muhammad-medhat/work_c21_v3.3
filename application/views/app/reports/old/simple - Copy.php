<?php 
//$shift_id=(empty($shift))?'':$shift->id
  $shifts_simple =   simple_array($shifts, '*', array('id', 'date', 'start_time'));
  //var_dump($shifts_simple);
?>
<?=form_open("report/simple")?>
<table>
  <tr>
    <td>الوردية</td>
    <td><?= form_dropdown('shift_id', array('...', 
            $shifts_simple), 
            $this->input->post('shift_id'), 
            'onchange="this.form.submit();"')?>
  </td>
  </tr>
</table>
<?=form_close()?>
<?php if(isset($shift)) {?>
بيانات الوردية
<table>
    <tr>
      <td colspan='2' class='title heasd'>بيانات وردية <?=$shift->id?></td>
    </tr>
</table>
<?php } ?>
<script type="text/javascript" charset="utf-8">
  /*$(document).ready(function(){
    $('select[name=shift_id]').change(function(){
      var shift_id = $( this ).val();
      $.ajax({
        url: '<?=site_url("report/simple")?>/' + shift_id,
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
        location.reload(<?=site_url("report/simple")?> + '/' + shift_id)

        },
        error: function (jqXHR, textStatus, errorThrown) {
          // error callback
        }
      });
    });
  });*/
</script>
