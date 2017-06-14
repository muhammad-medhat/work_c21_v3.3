
<?php $disc_value = ($order->order_discount_value >0 )?$order->order_discount_value: '' ?>



<div id='order_discount'>
  <table>
    <tr><td><?= form_input('disc_per', '',  "class='per' placeholder='نسبة الخصم' style='width:14em'") ?></td></tr>
    <tr><td><?= form_input('disc_val',  $disc_value,  "class='val' placeholder='نسبة الخصم' style='width:14em'") ?></td></tr>
  </table>
</div>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){

    $('.per').change(function(){
      var per = $(this).val();
      var total = <?= $order->total?>;
      var val = per * total / 100; 
      $('.val').val(val);
    
    });

    $('.val').change(function(){
      var per = $(this).val();

      console.log(per);
    });
  });
</script>
