<style type="text/css" media="all">
 .dlvr a,.ta a, .dine a{color:#fff}
.dlvr{background: #3f3f59;}
.dlvr:hover{background: #6e6e89;}

.ta{background:#2069b4}
.ta:hover{background:#5081b3}

.dine{background: #369534} 
.dine:hover{background: #31c62e} 
</style>
<div style='margin:1em'>
  <?php $this->load->view('app/orders/helpers/toolbar', $this->data) ?>
</div>
<ol style='margin-right:4em'>

  <?php foreach($orders as  $o){ /*var_dump($o);*/?>
<?php 
    $method = ($o->is_checked==1)? 'show_order':'edit_order';
?>
  <li style='border:solid 1px;padding:0.5em;width:50%' class='<?= $o->css_class?>'>    
      <?php 
    $string = "رقم الوردية $o->shift_id";
        $string .= "| يوم $o->date";
        $string .= ($o->order_type == 1)?" | ترابيزة [ $o->customer ]":"";
        $string .= "| $o->type";
        $string .= "| الساعة $o->start_time";
      ?>
      <?= anchor("order/$method/$o->id_order", $string)?>
    </li>
  <?php } ?>
  
</ol>
<script type="text/javascript" charset="utf-8">
//        not working
//$(document).ready(function () {
//    $(li).hover(funcion(){
//    $(this).addClass('blue');
//    });
//
//});
</script>
