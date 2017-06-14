<?php
    $order = $this->order_model->get_order($t->id);
if($order)
    $sum = $this->order_details_model->get_order_sum($order->order_id);
    //echo "<div  class='red'>" . $this->db->last_query() ."</div>";
?>
<div class='total'>
<?php //=$order->order_total?>
    <?=isset($sum)?$sum:''?>
</div>
