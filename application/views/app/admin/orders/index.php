<div>
<?php //that is the datepicker from jquery ui?>
<?=form_open('admin/order/get_orders')?>
  <table>
<tr>
  <td colspan='3'></td>
</tr>
    <tr>
      <td>التاريخ</td>
      <td><input id='datepicker' value='' name='datepicker' class='button'/></td>
      <td><?=form_submit('ok', 'ok', 'class=\'button blue round ic-search image-right\'')?></td>
    </tr>
  </table>
<?=form_close()?>
<?php
//var_dump($shifts);
$this->load->view('app/admin/orders/filter');
  $this->load->view('app/admin/orders/orders_grid');
?>

<script type="text/javascript" charset="utf-8">
$(function () {
    $('#datepicker').datepicker({dateFormat: 'yy-mm-d'});
    $('select[name=shifts]').change(function(){
      var url = '<?=site_url() ?>' + '/admin/order/get_orders';
alert(url);
      $('#orders_grid').load(url);
    });
  });
</script>
