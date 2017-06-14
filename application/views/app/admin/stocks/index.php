
        <?=form_open('admin/inventory/manage')?>
        <table>
        <?php foreach($stocks as $s) { ?>
          <?=form_hidden('stock_id[]', $s->id)?>
          <tr>
            <td><?= form_input('name[]', $s->name)?></td>
            <td><?= form_input('description[]', $s->description)?></td>
          </tr>
        <?php } ?>
            <tr>
              <td colspan='2'><?=form_submit('ok', 'submit')?></td>
            </tr>
        </table>
        <?=form_close()?>

