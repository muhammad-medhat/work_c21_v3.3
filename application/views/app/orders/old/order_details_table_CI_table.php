<?php //ORDER DETAILS?>
    <div id='order_details'>
<?php 
  $this->table_template['table_open'] = '<table id=\'order_details_table\' class=\'order_details_table\' cellspacing=2>';
  $this->table_template['tbody_open'] = '<tbody id=\'order_details_tbody\'>';
  $this->table->set_template($this->table_template); 
  $this->table->set_heading('الصنف', 'كمية', 'السعر', 'اجمالي', '');
 $sum = 0;
      if(isset($order_details) ){ 
         if(count($order_details)!=0){
            foreach ($order_details as $od) {
             
               $sub = $od->quantity * $od->price;
                $this->table->add_row(
                array('data'=>$od->arabic),
                array('data-qty'=>$od->quantity, 'class'=>'qty','data'=>$od->quantity), 
                array('class'=>'price', 'data'=>$od->price),
                array('data'=>$sub, 'class'=>'sub'),
                array('data'=>"<a data-id=$od->id class='delete'>Delete</a>")

          );
        $sum += $sub;
                echo form_hidden('order_details_id', $od->id);
            }
           echo $this->table->generate(); 
?>
<div id='footer'>
<table>
    <tr class='tfoot'>
      <td colspan=3>اجمالي الطلب</td>    
      <td id='order_sum'><?=$sum?></td>
    </tr>
        <?php } else {?>
        <tr>
          <td id='no_orders' colspan=4>من فضلك اختر من اضناف القائمة</td>
        </tr>
        <?php } ?>
    <?php } else { echo "<tr><td colspan=4>no orders</td></td>"; }?>

         </table>
</div>>

    </div>
  <div>
    <!-- <button id='print' type="button">طباعة للعميل</button> -->
    <!--======= <button id='print_e' type="button">طباعة و انهاء</button>-->
    <!-- <button id='print_close'>طباعة و انهاء</button> -->

  </div>
</div>

