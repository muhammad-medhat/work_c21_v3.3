<?php
//var_dump($sales);
?>
<table class='sortable'>
  <thead>
    <th>رقم الفاتورة</th>
    <th>رقم الوردية</th>
    <th>التاريخ </th>
    <th>الطاولة</th>
    <th>الاجمالي</th>
  </thead>
  <tbody>
<?php if(is_object($sales)){ ?>
      <tr>
        <td><?= $sales->order_id?></td>
        <td><?= 'obj' .$sales->shift_id?></td>
        <td><?= $sales->table?></td>
        <td><?= $sales->total?></td>
      </tr>
    <?php } else { ?>
    <?php foreach($sales as $o) { ?>
      <tr>
        <td><?= $o->order_id?></td>
        <td><?= $o->shift_id?></td>
        <td><?= $o->date?></td>
        <td><?= $o->table?></td>
        <td><?= $o->total?></td>

      </tr>
    <?php } 
  }
?>
  </tbody>
</table>
