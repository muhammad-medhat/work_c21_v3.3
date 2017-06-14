<table id='orders_tbl' cellpadding="4" cellspacing="0" class="sortable">
  

  <thead class='head'>
    <td><?=$this->lang->line('order_id') ?></td>
    <td><?=$this->lang->line('shift') ?></td>
    <td><?=$this->lang->line('total') ?></td>
    <td><?=$this->lang->line('table') ?></td>
    <td><?=$this->lang->line('date')  ?></td>
    <td><?=$this->lang->line('start') ?></td>
    <td><?=$this->lang->line('end')   ?></td>
  </thead>
  <tbody>
    <?php foreach ($orders as $o ){?>
      <tr>
        <td><?=$o->order_id?></td>
        <td><?=$o->shift_id?></td>
        <td><?=$o->total?></td>
        <td><?=$o->table?></td>
        <td><?=$o->date?></td>
        <td><?=$o->start_time ?></td>
        <td><?=$o->end_time?></td>
      </tr>
    <?php } ?> 

  </tbody>

</table>
<div class='paging'>
  <?= $pagination?>
</div>
