    
<?php //$this->load->library('pdf'); ?>
      <style type="text/css" media="all">
        #items{border-bottom:1px; border-collapse:collapse;background:#000}

        /*not working*/#items tr:nth-child(odd) { background-color: #cccccc; }

        #items td{margin:0.5em;border:solid 1px;background:#ccc}
        .desc{
          border:dotted 1px;
          margin-bottom: 1em;
        }
          .dark{background:#ccc}
          .header{
            background-color:#000;
            color:#fff;
          }
        #summery{
          display:none;
          float:left;
          border: solid 1px;
          margin-top: 5em;
        }
        #total{font-weight:bold;font-size:14px}

      </style>



<?php 
      //var_dump( $this->pdf->lib_Cell(0, 20, $order_type->name, 1, 1, 'C') );
  
$html = '<table class="desc">';



?>
<?php
    switch ($order->order_type) {
    case '1' :

          $html .= "<tr>";
          $html .= "  <td> المكان </td>";
          $html .= "  <td>$table->name</td>";
          $html .= "</tr>";
       break;

       case '3' :
         $html .= "<tr>";
         $html .= "   <td>اسم العميل</td>";
         $html .= "   <td>$order->client_name</td>";
         $html .= "</tr>";
         $html .= "<tr>";
         $html .= "  <td>العنوان</td>";
         $html .= "  <td>$order->address</td>";
         $html .= "</tr>";
       break;

       default:
         $html .= '<tr>';
         $html .= '   <td colspan="2">TAKE AWAY</td>';
         $html .= '</tr>';
     } 

$html .= '</table>';
echo $html;
?>

<table class='header'>
        <tr>
          <td width="50%">الصنف </td>
          <td width="20%">السعر </td>                    
          <td width="10%">العدد </td>
          <td width="20%">اجمالي</td>
      </tr>
</table> 
<table id="items">
        <?php $i = 0;?>
<?php $class = ($i % 2 == 0 )? 'dark':''?>
        <?php foreach ($items_table as $item){?>
        <tr class='<?= $class ?>'>    
            <td width="50%"><?= $item['name'] ?>      </td>
            <td width="20%"><?= $item['price']?>      </td>
            <td width="10%"><?= $item['qty']  ?>      </td>
            <td width="20%"><?= $item['total_line']?> </td>
          </tr>
          <?php $i++?>
        <?php } ?>
        <tr>
          <td colspan='4'></td>
        </tr>
    </table>
<hr />
    <table id='summery'>
      <tr><td colspan='2'></td><td >المجموع</td><td> <?=$total?></td></tr>
      <tr><td colspan='2'></td><td >%<?=$ratio?> خدمة </td><td>  <?=$service_value?></td></tr>
      <tr><td colspan='2' id='total' width='50%'></td><td >اجمالي </td><td width='50%'><?=$grand_total?></td></tr>
    </table>

