    
      <style type="text/css" media="all">

        #summery{
          float:left;
          border: solid 1px;
          margin-top: 5em;
        }

      </style>

<?php //var_dump($order);?>
<table>
  <tr>
    <td aligh='right'>
       <table id='summery'>
         <tr><td colspan='2'></td><td >المجموع</td><td> <?=$total?></td></tr>
         <tr><td colspan='2'></td><td >%<?=$ratio?> خدمة </td><td>  <?=$service_value?></td></tr>
         <tr><td colspan='2' id='total' width='50%'></td><td >المجموع </td><td width='50%'><?=$grand_total?></td></tr>
         <?php if($order->order_discount_value != 0){ ?>
           <tr><td colspan='2' id='discount' width='50%'></td><td >خصم </td><td width='50%'><?=$order->order_discount_value?></td></tr>
         <tr><td colspan='2' id='total' width='50%'></td><td >اجمالي </td><td width='50%'><?=$grand_total - $order->order_discount_value?></td></tr>

       <?php } ?>
       </table>
</td>
</tr>
</table>

