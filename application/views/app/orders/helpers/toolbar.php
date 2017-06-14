<style type="text/css" media="all">
  .toolbar{
    border: solid 1px;
    margin: 1em;
    border-radius: 5px;
    padding: 0.5EM;
  }
</style>
<?php
$filter = array(''=>'...', '5'=>'5', 10=>10,50=>50,100=>100,200=>200);
?>
<div class='toolbar'>

<?=form_open("order/get_orders/$is_checked")?>

      عدد الفواتير<?= form_dropdown('ordersnum', $filter, $this->input->post('ordersnum'), "onchange='form.submit()'")?>

      بعد تاريخ<input id='datepicker' value='<?=$this->input->post('datepicker')?>' name='datepicker' onchange='form.submit()' />

<?= form_close()?>
</div>
<button class='button blue ic-add image-right'>فاتورة جديدة </button>

<script type="text/javascript" charset="utf-8">
  

$(document).ready(function () {
    //$('#datepicker').datepicker({dateFormat: 'yy-mm-d',  beforeShowDay: $.datepicker.noWeekends});
  $('#datepicker').datepicker({dateFormat: 'yy-mm-d'});

  $('.ic-add').click(function(){

    $.ajax({
      url: '<?=site_url("order/new_order2/3") ?>',
      type: 'POST',
      complete: function (jqXHR, textStatus) {
        // callback
      },
      success: function (data, textStatus, jqXHR) {
        location.replace(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // error callback
      }
    });
  });


    $('select[name=shifts]').change(function(){
      var url = '<?=site_url() ?>' + '/order/get_orders';
alert(url);
      $('#orders_grid').load(url);
    });
  });

</script>
