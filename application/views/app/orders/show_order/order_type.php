<?php

//var_dump($order);
  foreach($order_types as $type){  
    $class = ($order->order_type == $type->id)? 'red': 'blue';
    echo anchor("order/change_type/$order->order_id/$type->id", $type->name, "class='button $class'");
  }
?>
