
<style type="text/css" media="all">
#main td{display:table-cell;vertical-align:top}
#ing{width:300px;border-radius:5px;margin:1em}
.row{
    width: 64%;
    margin-top: 1em;
    text-align: center
}
.col{border:solid 1px;padding:1em}
</style>
<?php
?>  
<div id='main'>
    <div class='row'>
      <h2><?=$product->arabic .'( '. $product->price .' )'?></h2>
    </div>
    <div  class='row'>
         <div class='col fr'>

                  <?php if (isset($items)) {?>
                      <table id='ing'>
                          <?php foreach($items as $item) { ?>
                            <tr id=<?=$item->item_id?>>
                                <td><?= $item->name ?></td>
                                <td><?= $item->amount ?></td>
                                <td><a>حذف</a></td>
                            </tr>
                          <?php } ?>

                          </table>
                   <?php } ?>

          </div>
   
          <div class='col fl'>
            <select class='items' size=<?=count($all_items)/2?> >
              <?php foreach($all_items as $item) { ?>
                <option value=<?=$item->id?>><?=$item->category_name .': ' .$item->item_name?></option>
              <?php } ?>
            </select>
          </div>
  </div>
</div>
