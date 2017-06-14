  <style type="text/css">

  @media print {
	  table  tr:nth-child(odd) { background-color: #000; color:red;}
    body{
      direction:rtl;
      background:#000; 
      width: auto; 
      margin: 0 5%; 
    }
    tr:first-child{white-space:nowrap;width:50%}
    span table{font-weight:bold;color:#fff;background-color:#000}
    span{white-space:nowrap !important;}
    td div{background:#000}

      /*div {background-color:grey}*/

    td span{background-color:red;width:50%;font-weight:bold}
  }
</style>
  
<?php //var_dump($order); ?>
    <table>


<?php     switch ($order->order_type) {?>
<?php       case '1' :?>      
              <tr>
                <td>رقم الطاولة: <?=$order->customer_id?></td>
<?php       break;?>

<?php       case '3' :?>
              <tr>
                  <td colspan='2'>اسم العميل: <?= $order->client_name?></td>
              </tr>
              <tr>
                <td>العنوان: <?=$order->address?></td>
<?php       break;?>

<?php       default?>
              <tr>
                <td>TAKE AWAY</td>
<?php     } ?>
      <td></td>
      </tr> 
      <tr>
        <td><?= date(date_format)?></td>
        <td><?= date(time_format)?></td>
      </tr>
    </table>



  <span>
    <table>
      <tr >
          <td>الصنف </td>
          <td>السعر </td>                    
          <td>العدد </td>
          <td>اجمالي</td>
      </tr>
    </table>
  </span>


    <table>
        <?php $i = 0;?>
        <?php foreach ($items_table as $item){?>
           <tr >    
            <td><span><?= $item['name'] ?></span>      </td>
            <td><?= $item['price']?>      </td>
            <td><?= $item['qty']?>        </td>
            <td><?= $item['total_line']?> </td>
          </tr>
          <?php $i++?>
        <?php } ?>
    </table>






<div>
    <table id='summery'>
      <tr><td colspan='2'></td><td >المجموع</td><td> <?=$total?></td></tr>
      <tr><td colspan='2'></td><td >%<?=$ratio?> خدمة </td><td>  <?=$service_value?></td></tr>
      <tr><td colspan='4'></td></tr>
      <tr><td colspan='2'></td><td >اجمالي </td><td><?=$grand_total?></td></tr>
    </table>
</div>

