      <?=form_hidden('product', $product->id)?>
      <h1><?='('.$product->id .')| ' .$product->arabic?> (<?=$product->price?>)</h1>
      <?=$pagination?>
      <h2>الخامات</h2>

      <?= form_open('admin/product/assign')?>
        <table class='grid'>
          <tbody>
            <?php if(count($items) == 1) {?>
        
              <tr id="row_item<?=$items[0]->id?>" data-id=<?=$items[0]->id?>>
                <?=form_hidden('item_id', $items[0]->item_id)?>
                <td style='width:40%'><?=$items[0]->name?></td>
                <td style='width:40%' class='edit_amount'>
                  <?=form_input(array('name'=>'amount[]', 'type'=>'number'), $items[0]->amount)?>
                </td>
                <td><a class='delete' style='width:20%'> حذف </a></td>
              </tr>
        
            <?php } elseif(count($items)>1 ){
        
                    foreach($items as $item) {?>
                      <tr id="row_item<?=$item->id?>" data-id=<?=$item->id?>>
                         <?=form_hidden('item_id[]', $item->item_id)?>
                         <td style='width:40%'><?=$item->name?></td>
                         <td style='width:40%'>
                           <?=form_input(array('name'=>'amount[]', 'type'=>'number', 'min'=>0.05, 'step'=>'0.05'), $item->amount)?>
                         </td>
                     
                         <td><a class='delete' style='width:20%'>X</a></td>
                      </tr>
        
          <?php }  ?>
        
        <?php } elseif($items == 0) { ?>
        <tr>
          <td class='message'>لا يوجد خامات</td>
        </tr>
        <?php }?>  
        
        <tr>
            <td colspan='2'><?=form_submit('submit', 'ok', "class='bottom hidden'")?></td>
        </tr>
        
          </tbody>
        </table>
      <?=form_close()?>
      <table id='ingrediants'>
        <tr>
          <td colspan='2'>
          <?=form_submit('submit', 'add', 'class="button fl round blue image-right ic-add text-upper"')?>
          </td>
        </tr>
      </table>
