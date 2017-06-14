    
<?php //$this->load->library('pdf'); ?>
      <style type="text/css" media="all">
        .desc{
          margin-bottom: 1em;
         /* width:50%;*/
        }


      </style>



<?php 
      //var_dump( $order);
  
$html = '<table class="desc">';

  //$html .= "<tr>";
  //$html .= "  <td> رقم الفاتورة </td>";
  //$html .= "  <td>$order->id</td>";
  //$html .= "</tr>";

?>
<?php
    switch ($order->order_type) {
    case '1' :

          $html .= "<tr>";
          $html .= "  <td style='width:20%'> <b> المكان</b> </td>";
          $html .= "  <td >$table->name</td>";
          $html .= "</tr>";
       break;

       case '3' :
         $html .= "<tr>";
         $html .= "   <td style='width:20%'><b>اسم العميل</b></td>";
         $html .= "   <td>$order->client_name</td>";
         $html .= "</tr>";
         $html .= "<tr>";
         $html .= "  <td style='width:20%'><b>العنوان</b></td>";
         $html .= "  <td>$order->client_address</td>";
         $html .= "</tr>";
         $html .= "<tr>";
         $html .= "  <td style='width:20%'><b>تليفون</b></td>";
         $html .= "  <td>$order->client_phone</td>";
         $html .= "</tr>";
       break;

       default:
         $html .= '<tr>';
         $html .= "   <td style='width:20%'><b>اسم العميل</b></td>";
         $html .= "   <td>$order->client_name</td>";
         $html .= '</tr>';
     } 

$html .= '</table>';
echo $html;
?>


