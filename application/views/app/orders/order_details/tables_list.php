<div id='tables_list'>



    <?php foreach($sections as  $s){ ?>
        <div id='all_tables'>
          <h2><?=$s->name?></h2>
          <div class='sec'>
          <?php foreach ($tables as $t) {?>
            <?php if($t->section_id == $s->id){?>
                <div class='table' data-tid=<?=$t->id ?>><?=  $t->name?> </div>
              <?php } ?>
            <?php } ?>
          </div><!--closing one section div-->
        </div>
      <?php } ?>
</div>
