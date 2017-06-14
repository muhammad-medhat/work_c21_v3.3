<?php //= form_open('admin/item/new_stockitem_add')?>
<?= form_open('admin/inventory/new_stockitem_add')?>
<?= form_hidden('stock_id', $stock->id)?>
    <table class='form'>
      <tr>
        <td>اسم الخامة</td>
        <td><?= form_dropdown( 'item_id', $items, $this->input->post('item_id') ) ?></td>
      </tr>
      <tr>
        <td>الكمية</td>
        <td><?= "<input type='number' step=0.1 min=0 name='current_qty' value='" .$this->input->post('current_qty') ."' />"?></td>
      </tr>
      <tr>
        <td colspan='2'>
          <?= form_submit('submit', 'اضافة')?>
        </td>
      </tr>
    </table>
<?= form_close(); ?>

