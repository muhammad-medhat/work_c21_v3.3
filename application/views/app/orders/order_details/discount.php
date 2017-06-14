
<?php $disc_value = ($order->order_discount_value >0 )?$order->order_discount_value: '' ?>



<div id='order_discount'>
  <table>
    <tr>
      <td>
        <input type="radio" name="discount" class='rad' id="per_r" style='width:2em' />
      </td>
      <td>
        <input type="number" name='disc_per' class='per' placeholder='نسبة الخصم' style='width:5em' />
      </td>
    </tr>
    <tr>
      <td>
        <input type="radio" name="discount" class='rad' id="val_r" style='width:2em' />
      </td>
      <td>
        <input type='number' name='disc_val' class='val' placeholder='نسبة الخصم' style='width:5em' value='<?=$disc_value?>'/>
      </td>
    </tr>
  </table>
</div>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    //$( ".rad" ).checkboxradio();
  });
</script>
