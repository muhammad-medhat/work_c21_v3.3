<?php
//var_dump($items);
?>
<table style='width:100%'>
  <thead>
    <th></th>
    <th>الخامة</th>
    <th>الكمية المتبقية</th>
    <th>المخزن</th>
  </thead>
  <tbody>
<?php if(is_object($items)){ ?>
      <tr>
        <td><?= $items->id?></td>
        <td><?= $items->item_name?></td>
        <td><?= $items->current_qty?></td>
        <td><?= $items->stock_name?></td>
      </tr>
    <?php } else { ?>
    <?php foreach($items as $i) { ?>
      <tr>
        <td><?= $i->id?></td>
        <td><?= $i->item_name?></td>
        <td><?= $i->current_qty?></td>
        <td><?= $i->stock_name?></td>
      </tr>
    <?php } 
  }
?>
  </tbody>
</table>

