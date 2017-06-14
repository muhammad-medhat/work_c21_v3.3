    
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
    <td aligh='left'>
       <table id='summery'>
         <tr>
            <td >المجموع</td>
            <td> <?=$total?></td>
        </tr>
        <tr>
          <td >%<?=$ratio?> خدمة </td>
          <td>  <?=$service_value?></td>
        </tr>
        <tr>
          <td >المجموع </td>
          <td><?=$grand_total?></td>
       </tr>
       <?php if($order->order_discount_value != 0){ ?>
        <tr>
            <td >خصم </td>
            <td><?=$order->order_discount_value?></td>
        </tr>
        <tr>
          <td >اجمالي </td>
          <td><?=$grand_total - $order->order_discount_value?></td>
        </tr>

       <?php } ?>
       </table>
</td>
</tr>
</table>

