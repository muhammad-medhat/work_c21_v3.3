<style type="text/css" media="all">
  .sec{}
</style>
<?php foreach($sections as  $s){ ?>
        <div id='all_tables'>
          <h2><?=$s->name?></h2>
          <div class='sec'>
          <?php foreach ($tables as $t) {?>
            <?php if($t->section_id == $s->id){
              $data['t'] = $t;
               $class = ($t->is_available == 1 )?'blue': 'red';
               $action = ($t->is_available == 1 )?'new_order': 'edit'; 
               $summery = ($t->is_available == 1 )? 'new': $this->load->view('app/orders/table_summery', $data, true) ?>

                <?= anchor("order/$action/$t->id", "<div class='table $class' style=''>
                $t->name<p>$summery</p></div>")?> 
              <?php } ?>
            <?php } ?>
            </div><!--closing one section div-->
</div>
<br />
<?php } ?>
