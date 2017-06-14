
<?php $disc_value = ($order->order_discount_value >0 )?$order->order_discount_value: '' ?>
<?php
//$this->table->set_template($this->table_template);
//$this->table->set_heading(
//              'الصنف',
//              'كمية',
//              'السعر',
//              'اجمالي'
//            );
//      if(isset($order_details) ){ 
//         if(count($order_details)!=0){
//            $sum = 0; 
//            foreach ($order_details as $od) {
//              $line_total = $od->quantity * $od->price  ;
//              $this->table->add_row(
//                array('data'=>$od->arabic, 'style'=>'width:50%'),
//                $od->price,
//                $od->quantity,
//                $line_total
//              );
//              $sum += $line_total;
//            }
//         }
//      }
?>


<div id='simple_form'>
<?php //$this->table->generate();?>
  <table>
    <tr>
      <td>
        <input type="number" name='disc_per' class='per' placeholder='نسبة الخصم' style='width:auto' />
      </td>
    </tr>
    <tr>

      <td>
        <input type='number' name='disc_val' class='val' placeholder='قيمة الخصم' style='width:auto' value='<?=$disc_value?>'/>
      </td>
    </tr>
  </table>
<div class='fl'>
  <button id='print_disc'>طباعة للعميل</button>
</div>
</div>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    //$( ".rad" ).checkboxradio();
  });
</script>
