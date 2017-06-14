<h2>الخامات</h2>
<section>
<div id='items_list'>
  <!--list box-->
  <select name="items" id="list_items" size=<?=count($items)?> multiple>
  <?php foreach( $items as $item ) {?>
  <option value='<?= $item->id?>'><?=$item->name?></option>
  <?php } ?>
</select>

</div>
</section>
