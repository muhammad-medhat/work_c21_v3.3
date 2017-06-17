<?php
//var_dump(simple_array($tables));
$sum = 0;//this variable calculated with javascript
$order_service = 0;
$this->table->add_row(array('data'=>"رقم الفاتورة: $order_id", 'colspan'=>2, 'class'=>'header'));
$this->table->add_row('اجمالي',array('data'=>$sum, 'class'=>'sum'));
switch($order->order_type){

    case 1: 
    
    
      if($order->customer_id!=0){
        $this->table->add_row('ترابيزة', $table->name);
      }
      $this->table->add_row( 
          form_dropdown('table_id', 
          array( ''=>'...', simple_array($tables)), '', "style='width:auto' id='table_id'"),
          "<div id='change_table_div' class='blue' ><a id='change_table'>تغيير</a></div>"
        ) ;


$this->table->add_row("<div class='show_tables blue button'>Change</div>");



      $order_service = $this->data['settings']['service'];
      break;
    case '3':
      $order_service = $this->data['settings']['delivery_service'];
      break;
    default:
}
$this->table->add_row($order_service .'% خدمة  ', array('data'=>'', 'class'=>'service'));
if($order->order_discount_value > 0)
  $this->table->add_row('خصم ' .$order->order_discount_value , array('data'=>'', 'class'=>'discount'));
//$this->table->add_row('صافي',array('data'=>'0', 'class'=>'grand'));
$this->table->add_row('تاريخ',$order->shift_date);
$this->table->add_row('الوقت',$order->start_time);

echo $this->table->generate();
//var_dump($order); 
?>
