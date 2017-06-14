<table>
  <thead>
    <tr class='head'>
      <th>الصنف</th>
      <th>السعر</th>
      <th>العدد</th>
      <th>اجمالي</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($items_table as $item){?>
    <tr>
    <td><?=$item['name']?></td>
    <td><?=$item['price']?></td>
    <td><?=$item['qty']?></td>
    <td><?=$item['total_line']?></td>
    </tr>
<?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan=3></td>
      <td><?=$total?></td>
    </tr>
    <tr>
      <td colspan='3'><?=$ratio?>% خدمة</td>
      <td><?=$service_value?></td>
    </tr>
    <tr>
      <td colspan='2'>الاجمالي</td>
      <td colspan='2'><?=$grand_total?></td>
    </tr>
  </tfoot>
</table>

