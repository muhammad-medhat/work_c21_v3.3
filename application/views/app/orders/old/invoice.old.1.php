<style type="text/css" media="print">

  @media print {
/*      body{direction:rtl;}
      #recipt, #summery{border:solid;width:400px;text-align:center}
      tr td{padding:0.56em;border:none}
      .head{font-weight:bold;background:#000;color:#fff}
      hr{margin:2em;}
      .separator{height:1em;}
  */
      body{direction:rtl;}
      div{border:solid;border-radius:5px;margin:2em;text-align:center}
      tr td{padding:0.56em;border:none}
      hr{margin:2em;}

}
</style>
<style type="text/css" media="screen">
     /* body{direction:rtl;}
      #recipt, #summery{border:solid;width:400px;text-align:center}
      .items_table tr td{padding:0.56em;border:none}
      .head{font-weight:bold;background:#000;color:#fff}
      hr{margin:2em;}
        .separator{height:1em;}*/ 
     body{direction:rtl;}
      div{border:solid;text-align:center}
      tr td{padding:0.56em;border:none}
      hr{margin:2em;}

</style>
<div id='recipt'>
<table class='items_table'>
<tr>
  <td>رقم الفاتورة</td>
  <td><?= $order->id?></td>
</tr>
<tr>
  <td>رقم الطاولة</td>
  <td><?=$order->customer_id?></td>
</tr>
  <tr>

    <td ></td>
    <td><?= date(date_format)?></td>
    <td><?= date(time_format)?></td>
<td></td>
  </tr>

  <tr style='' class='head'>
      <td>الصنف</td>
      <td>السعر</td>                    
      <td>العدد</td>
      <td>اجمالي</td>
  </tr>
<?php foreach ($items_table as $item){?>
  <tr>  
    <td><?= $item['name'] ?>
    <td><?= $item['price']?>
    <td><?= $item['qty']?>
    <td><?= $item['total_line']?>
  </tr>

<?php } ?>
</table>
  </div>
    
  <div>
<hr />

<table id='summery'>

      <tr><td colspan='2'></td><td >المجموع</td><td> <?=$total?></td></tr>
      <tr><td colspan='2'></td><td >%<?=$ratio?> خدمة </td><td>  <?=$service_value?></td></tr>
      <tr><td colspan='2'></td><td >اجمالثي </td><td><?=$grand_total?></td></tr>

    <!-- </div> -->
</table></div><hr />
<script type="text/javascript" charset="utf-8">
 //$(document).ready(function () {
   window.print();
 //});
</script>
