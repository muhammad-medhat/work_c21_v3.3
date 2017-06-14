<?php //var_dump($order);?>
<ul id='order_tools'>
  <li><?= anchor("order/cancel/$order->order_id", 'الغاء الفاتورة', 'title="الغاء الفاتوة الحالية" class="cancel button red"') ?></li>
  <!-- <li><?= anchor("", 'الخصم', 'title="خصم" class="discount button blue"') ?></li>-->
</ul>
<?php //$this->load->view($subdir .'/discount')?>
