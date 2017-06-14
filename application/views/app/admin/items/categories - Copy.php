<table>
<?=form_open('admin/item/add_edit')?>
<?php foreach ($categories as $c) {?>
  <tr>
      <?= form_hidden('cat_id[]', $c->id)?>
    <td><?=form_input('name[]', $c->name)?></td>
  </tr>
<?php }?>
<tr><td><?=form_input('new', '')?></td></tr>
<tr><td colspan='2'><?=form_submit('submit', 'ok')?></td></tr>
<?=form_close() ?>
</table>
