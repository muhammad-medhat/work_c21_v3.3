<?php //var_dump($order);?>
<?=form_open('', array('id'=>'cusromer_info')) ?>


<table>
  <tr><td><?= form_input('client_name',    $order->client_name, "id='client_name'       class='action' maxlength='25' placeholder='الاسم'")?></td></tr>
  <tr><td><?= form_input('client_address', $order->client_address, "id='client_address' class='action' maxlength='50' placeholder='العمواتن'")?></td></tr>
  <tr><td><?= form_input('client_phone',   $order->client_phone, "id='client_phone'     class='action' maxlength='15' placeholder='رقم تليفون'")?></td></tr>
  <tr><td><?= form_input('client_notes',   $order->client_notes, "id='client_notes'     class='action' maxlength='40' placeholder='ملاحظات'")?></td></tr>
</table>

<?=form_close(); ?>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function () {
    //$('.action').change(function(){
    $('.action').keypress(function(){
      var text_name = $(this).attr('id');
      var text_value = $(this).val();
      update_info(text_name, text_value);
     });
       
    function update_info(name, value){
      var form_data = $('#cusromer_info').serialize();
      $.ajax({
      url: '<?=site_url("order/update_order_info/$order->id/")?>' + name + '/' + value,
        type: 'POST',
        data: form_data,
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          // success callback
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // error callback
        }
      });
    } 
  });
</script>
