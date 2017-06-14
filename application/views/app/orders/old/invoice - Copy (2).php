<?php 
echo $this->db->last_query();
var_dump($order);
$x = 0;$y = 0;
$line_height = 10;

$handle = printer_open();
printer_start_doc($handle, "My Document");
printer_start_page($handle);

$pen = printer_create_pen(PRINTER_PEN_SOLID, 2, "000000");
printer_select_pen($handle, $pen);

$brush = printer_create_brush(PRINTER_BRUSH_SOLID, "2222FF");
printer_select_brush($handle, $brush);

printer_draw_text($handle, '|************************************|', $x, $y);
printer_draw_text($handle, '|Table: ' .$order->customer_id .'                            |', 0,10);
printer_draw_text($handle, "|************************************||", $x,$y+20);

//printer_draw_text($handle, $order->customer_id, 0, 30);
printer_draw_text($handle,'|' .date(date_format), 0, 40);
printer_draw_text($handle,'|' .date(time_format), 0, 50); 
?>




  <table>
   
   <?php printer_draw_text($handle,'Item',  10, 70) ?>
   <?php printer_draw_text($handle,'Price', 20, 70)?>                    
   <?php printer_draw_text($handle,'Num',   30, 70 )?>
   <?php printer_draw_text($handle,'Total', 40, 70)?>,
   
   
        <td>======</td>
        <td>======</td>
        <td>======</td>
        <td>======</td>
    </tr>
<?php //printer_draw_line($handle, $line_height, 0, 10, 40); ?>
<?php $line =10?>
  <?php foreach ($items_table as $item){?>
    

   <?php printer_draw_text($handle, $item['name'],       $line, 70) ?> 
   <?php printer_draw_text($handle, $item['price'],      $line, 70) ?>
   <?php printer_draw_text($handle, $item['qty'],        $line, 70) ?>
   <?php printer_draw_text($handle, $item['total_line'], $line, 70) ?>
    
  
  <?php $line+=10;?>
<?php  } ?>

<?php //printer_draw_line($handle, $line, 0, 10, 40); ?>
<div>
    <table id='summery'>
      <tr><td colspan='2'></td><td >المجموع</td><td> <?=$total?></td></tr>
      <tr><td colspan='2'></td><td >%<?=$ratio?> خدمة </td><td>  <?=$service_value?></td></tr>
      <tr><td colspan='4'>*******************************</td></tr>
      <tr><td colspan='2'></td><td >اجمالي </td><td><?=$grand_total?></td></tr>
    </table>
</div>
</fieldset>
<?php 
printer_end_page($handle);
printer_end_doc($handle);
printer_close($handle);
?>
<script type="text/javascript" charset="utf-8">
 //$(document).ready(function () {
   //window.print();
 //});
</script>
