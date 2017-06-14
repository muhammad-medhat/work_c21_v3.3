<?php
$dir = 'app/orders/';
$subdir = $dir .'order_details';
//var_dump($order_types);
  foreach($order_types as $type){  
    $class = ($order->order_type == $type->id)? 'grey': 'blue';
    echo anchor("order/change_type/$order->order_id/$type->id", $type->name, "class='$type->css button $class'");
  }
?><br />
<p id='show_order_type_detials' class='button blue' style='margin:1em 0 1em 0'>بيانات اخرى</p>
<div id='order_type_details'>
<?php   foreach($order_types as $type){  ?>
<?php     if($order->order_type == $type->id){  ?>
  <div id='<?= "$type->css"?>'>
    <?php //$this->load->view($subdir .'/delivery') ?>
    <?php $this->load->view($subdir .'/order_customer_info') ?>
  </div>
<?php     } ?>
<?php } ?>
</div>
