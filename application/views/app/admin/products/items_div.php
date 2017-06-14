<div class='panel' data-item_id=<?= $item->item_id?> >
  <?=form_open("admin/product/assign/$product_id/$item->item_id")?>
    <h4><?= $item->item_id .' - ' .$item->name?></h4>
    <div><?=form_input(array(
                    'name'=>'amount',
                    'id'=>'amount', 
                    'type'=>'number', 
                    'style'=>'width:11%', 
                    'step'=>'0.1', 
                    'min'=>0.1), $item->amount)?>
    </div>
      <?=form_submit('save', 'حفظ', 'class="button round ic-add blue" id="save_item"')?></td>
  <?=form_close() ?>
</div>     
