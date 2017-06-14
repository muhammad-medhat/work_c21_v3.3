<style type="text/css" media="all">
 .div {
} 
</style>
<?php
//shows order of a table
//order id must be provided

//var_dump($order);
//var_dump($order_details);
?>
   <div class='div'>
    <div id='all_products'>
      <?php $this->load->view('app/orders/products'); ?>
    </div>
    <?php $this->load->view('app/orders/numpad'); ?>

    </div>
<br style='clear:both'/>
<?php //ORDER DETAILS?>
    <div id='order_details'>
        <table class='order_details_table' cellspacing=2>
          <tr class='header'>
            <td>الصنف</td>
            <td>كمية</td>
            <td>السعر</td>
            <td>اجمالي</td>
          </tr>
            <?php if(isset($order_details) ){ ?>
            <?php if(count($order_details)!=0){?>
            <?php $i = $sum = 0; ?>
        <?php   foreach ($order_details as $od) {?>
            <?php $class=($i%2 == 0)? 'odd':'even'?>
            <tr class='<?=$class?>' id='od_product_<?=$od->product_id?>'>
            <?php $sub = $od->quantity * $od->price ?>
            <td><?=$od->name?></td>
            <td data-qty='<?=$od->quantity?>' class='qty'><?=$od->quantity?> </td>
            <td class='price'><?=$od->price?></td>
            <td class='sub'><?=$sub?></td>
          </tr>
        <?php $i++;$sum += $sub;
        } 
    ?>
    <tr class='tfoot'>
      <td colspan=3>اجمالي الطلب</td>    
      <td><?=$sum?></td>
    </tr>
        <?php } else {?>
        <tr>
          <td colspan=4>من فضلك اختر من اضناف القائمة</td>
        </tr>
        <?php } ?>
    <?php } else { echo "<tr><td colspan=4>no orders</td></td>"; }?>
         </table>

    </div>
  <div>
    <button id='print' type="button">طباعة</button>
    <button id='print_e' type="button">طباعة و انهاء</button>
  </div>
</div>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function () {
    $('.product').click(function(){
      $('.product_selected').removeClass('product_selected');
      $(this).addClass('product_selected');
      
      var name = $(this).text();
      $('#product_name').html(name);
      
      //alert('name is ' + name + ' end');
      
    });

  });

  $('#add').click(function(){
    //alert();
      var num = ( $('#num').val() == '')?1: $('#num').val();
      var p_id = $('.product_selected').attr('data-id');
  
    add_product(p_id, num);
  });

  function add_product(p_id, num){
    $.ajax({
      url: '<?php echo site_url("order/add_product/$order_id")?>/' + p_id + '/' + num,
      type: 'POST',
      complete: function (jqXHR, textStatus) {
        // callback
      },
        success: function (data, textStatus, jqXHR) {
          
          location.reload(true);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // error callback
      }
    });
  }
  function update_sub_total(qty, pid){
    var tr = 'od_product_' + pid;
    var price = $('#' + tr + ' .price').html();
    sub_total = qty*price;
    $('#' + tr + ' .sub').html(sub_total);

  }

  $('#print_e').click(function(){
    print_invoice(1);

  })

  $('#print').click(function(){
    print_invoice(end = 0);
  });

  function print_invoice(){
    var DocumentContainer = document.getElementById('order_details');
    var WindowObject = window.open('', 'PrintWindow', 
      'width=450,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
    WindowObject.document.writeln('<!DOCTYPE html>');
    WindowObject.document.writeln('<html><head><title></title>');
    WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="<?= base_url()?>/css/print.css">');
    WindowObject.document.writeln('</head><body>')

    WindowObject.document.writeln(DocumentContainer.innerHTML);

    WindowObject.document.writeln('</body></html>');

    WindowObject.document.close();
    WindowObject.print();
    if(end = 1){
      $.ajax({
        url: '<?php echo site_url("order/end/$order_id")?>',
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          window.location.replace('<?=site_url("order")?>'); 
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert('error callback');
        }
      });
    } 
  }

</script>



