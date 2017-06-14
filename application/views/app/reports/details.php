<style type="text/css" media="all">
  #shift{margin:2em}
</style>
<?=form_open("report/details")?>
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
<!-- <td><button name='print' type="button">طباعة</button></td>-->
  </tr>
</table>
<?=form_close()?>
<?php if(isset($shift)) { ?>
  <?php //if(count($shift_orders) > 1 ) {?>
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
  <table>
    <tr>
      <th>رقم الفاتورة</th>
      <th>اجمالي </th>
      <th>العميل</th>
      <th>من الساعة</th>
      <th>الى الساعة </th>
    </tr>
    <?php foreach ($shift_orders as $o) { ?>
        <?php $class = ($o->is_checked == 1 )?'':'red'?>
          <tr class='<?=$class?>'>
            <td><?=$o->id?></td>
            <td><?=$o->total?></td>
            <td><?=$o->customer_id?></td>
            <td><?=$o->start_time?></td>
            <td><?=$o->end_time?></td>
            <td><?= anchor("report/show_order/$o->id",'...' ) ?></td>
          </tr>
    <?php } ?>
    </table>
  <?php //} else{   // if has one record only ?>

  <?php //} ?>
<?php } ?>
