<ul id='tabs'>
<?php foreach($categories as $c) { ?>
  <li class='cat'>
        <a class='category' data-id=<?=$c->id?>><?=$c->arabic?></a>
  </li>
<?php } ?>
</ul>

<div class='products_list'></div>

