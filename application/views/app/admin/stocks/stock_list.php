<ul class='stock_list inner'>
<?php foreach($stocks as $s){ ?>
    <li><?=anchor("admin/inventory/stock/$s->id", $s->name)?></li>
<?php } ?>
</ul>
