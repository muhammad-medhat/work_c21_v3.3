<style type="text/css" media="all">
  #shift{}
  #shift tr{}
  #shift td{
    border: solid 1px;
    padding: 0.5em;
  }
</style>
<?php 
//$shift_id=(empty($shift))?'':$shift->id
  $shifts_simple =   simple_array($shifts, '*', array('id', 'date', 'start_time'));

$shifts_ddl = array();
  foreach ($shifts as $s) {
 //  var_dump($s); 
  }
  //var_dump($shifts_simple);
?>
<?=form_open("report/simple")?>
<table>
  <tr>
    <td>الوردية</td>
    <td><select name='shift_id' onchange="this.form.submit();">
          <option>...</option>
          <?php foreach ($shifts as $s)  { ?>
          <?php $state = 'مقفلة';$style=''?>
          <?php if($s->closed==0){ ?>
          <?php $state = 'مفتوحة';$style='font-weight:bold'?>
          <?php } ?>
            <option value=<?=$s->id ." style='$style'"?>>
                <?=$s->id .' | ' .$s->date .' | ' . $s->start_time .' | ' . $state?>
            </option>
          <?php } ?>
  </td>
<td><button name='print' type="button">طباعة</button></td>
  </tr>
</table>
<?=form_close()?>
<?php if(isset($shift)) {?>
 <!--  <div id='header'>بيانات الوردية</div> -->
<table  id='shift'>
    <tr>
      <td colspan='3' style='text-align:center;font-weight:bold;background:#d7cece'>بيانات وردية <?=$shift->id?></td>
    </tr>

    <tr>
      <td colspan='3'><?=$shift->date?></td>  
    </tr>
    <tr>
      <td>كاشير</td>
      <td colspan='2'><?=$details->user->name?></td>  
    </tr>
    <tr>
      <td>الحالة</td>
      <td>عدد الفواتير</td>
      <td>اجمالي</td>
    </tr>
    
    <tr>
      <td><?=($shift->closed==1)?'مقفلة':'مفتوحة'?></td>
      <td><?= $details->num?></td>
      <td><?= $details->total?></td>
    </tr>
</table>
<?php } ?>
<script type="text/javascript" charset="utf-8">
  <?php if($shift){ ?>
$('button').click(function(){

    $.ajax({
      url: '<?=site_url("report/simple_print/$shift->id") ?>',
      type: 'POST',
      complete: function (jqXHR, textStatus) {  },
      success: function (data, textStatus, jqXHR) { 
        print_doc(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
      }
    });
});
  <?php } ?>
  function print_doc(data){
  
        var DocumentContainer = data;
        var WindowObject = window.open('', 'PrintWindow', 
          'width=250px,height=300px, toolbars=no,scrollbars=no,status=no,resizable=yes');
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title>');
        WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/style.css">');
        WindowObject.document.writeln('</head><body>')

        WindowObject.document.writeln(DocumentContainer);

        WindowObject.document.writeln('</body></html>');

        WindowObject.document.close();
        //   WindowObject.print();

        WindowObject.close();
  }
</script>
