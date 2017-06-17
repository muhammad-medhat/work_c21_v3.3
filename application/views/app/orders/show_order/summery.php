<?php

$sum = 0;//this variable calculated with javascript

$this->table->add_row(array('data'=>"مسلسل الفاتورة:you  can provide the order code $order_id", 'colspan'=>2, 'class'=>'header'));
$this->table->add_row(array('data'=>"رقم الفاتورة: $order_id", 'colspan'=>2, 'class'=>'header'));

$this->table->add_row('اجمالي',array('data'=>$sum, 'class'=>'sum'));

$this->table->add_row('ترابيزة', $table->name);


$this->table->add_row('الخدمة', array('data'=>$this->data['settings']['service'] .' %', 'class'=>'service'));

$this->table->add_row(array('data'=>"طباعة",'id'=>'print', 'colspan'=>2, 'class'=>'button blue', 'style'=>'width:100%'));
//$this->table->add_row('صافي',array('data'=>'0', 'class'=>'grand'));
//$this->table->add_row('تاريخ',$order->shift_date);
//$this->table->add_row('الوقت',$order->start_time);
echo $this->table->generate();
 
?>
