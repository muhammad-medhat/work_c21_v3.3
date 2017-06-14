<?php if(validation_errors()) {?>
  <fieldset class='errors'>
  <?php echo validation_errors(); ?>
  </fieldset>
<?php } ?>
<?php 
  $id = categories__id;
  $name = categories__name;
?>
<div class="page-full-width cf">

    <?php $this->load->view('app/products/sidebar')?>
    <div class='side-content fl'>
      <div class='content-module'>
                  <div class="content-module-heading cf">
                  </div>
<ul ><!-- categories-->
<?= form_open('admin/product/editing')?>
<?php foreach($categories as $c){ ?>
  <li style='margin-right:0;border:solid'>
      <?=form_hidden('cid[]', $c->id)?>
    <span><?=$c->id?></span>
    <span><?=form_input('cname[]', $c->name)?></span>
    <span><?=form_input('carabic[]', $c->arabic)?></span>
  </li>  
  <li style='margin-right:10%;border:solid red'> 
    <ul>
      <?php
        $i = 1;
      foreach ($products as $p) {
        $class=($i%2 == 0)?'even':'odd';
        echo "<li class='$class'>";
        echo "  <input type='hidden' name='pid[]' value='$p->id'>";
        echo "  <span>" .form_input("pname[]", $p->name)     ."</span>";
        echo "  <span>" .form_input("parabic[]", $p->arabic) ."</span>";
        echo "  <span>" .form_input("price[]", $p->price)   ."</span>";
        echo "</li>";
        $i++;
      }
      ?>
      </ul> <!-- products -->
<?php      
}
      echo '<li>' .form_submit('submit', $this->lang->line('save') ) .'</li>';

?>
</ul><!-- categories -->
<?= form_close()?>
</div>
</div>
</div>
