<ul>
<?php foreach($categories as $c) { ?>
  <li>
        <div class='category' data-id=<?=$c->id?>><?=$c->name?></div>
        <div class='products_list'>
          
          <?php foreach ($products as $p) {?>
            <?php if($p->cat_id == $c->id) { ?>
              <button class='product' data-id='<?=$p->id?>' >
                  <div class='title' >
                     <?=$p->name?>
                  </div>
              </button>
            <?php } ?>
      <?php } ?>
        </div>
  </li>
<?php } ?>
</ul>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){

    $('.category').click(function(){
      var id = this.dataset.id;

      $('.products_list').hide();
      $(this).next('.products_list').show();
      //alert('id is '+ id);
    });
  });
</script>
