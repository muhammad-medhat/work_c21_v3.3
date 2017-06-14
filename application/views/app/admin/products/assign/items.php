<select class='items' size=<?=count($all_items)/2?>>
<?php foreach($all_items as $item) { ?>
  <option value=<?=$item->id?>><?=$item->category_name .': ' .$item->item_name?></option>
<?php } ?>
</select>

