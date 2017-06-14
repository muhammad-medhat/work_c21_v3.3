<input type=hidden name='phidden' id='price_hidden' />
<style type="text/css" media="all">
#numpad-container{display:none}
</style>
<?php
//shows order of a table
//order id must be provided

//var_dump($order);
//var_dump($order_details);
?>
<style type="text/css" media="all">
</style> 
   <div class='div'>
    <div id='all_products'>
      <?php $this->load->view('app/orders/products'); ?>
    </div>

    <div id='numpad-container' style='z-index:500' class='fr'>
      <?php $this->load->view('app/orders/numpad'); ?>
    </div>
    <div id='order_details_container'>
      <?php $this->load->view('app/orders/order_details_table')?>
    </div>
</div>






<script type="text/javascript" charset="utf-8">
  $(document).ready(function () {
    
    
      $('#all_products').on('click', '.product',function(){
        $('.product_selected').removeClass('product_selected');
        $(this).addClass('product_selected');
        var name = $(this).text();
        var id = $(this).data('id');
        var price = $(this).data('price');
        $('#price_hidden').val(price);
        $('#pid_hidden').val(id);
        $('#product_name').html(name);
      });

      $('#all_products').on('dblclick', '.product',function(){
        var num = 1;
        var p_id = $('.product_selected').attr('data-id');
        add_product(p_id, num);
      });


      function get_price(){}

  

  $('#add').click(function(){
      var num = ( $('#num').val() == '')?1: $('#num').val();
      var p_id = $('.product_selected').attr('data-id');
    add_product(p_id, num);
  });

  function add_product(p_id, num){
    $.ajax({
      url: '<?= site_url("order/add_product/$order_id")?>/' + p_id + '/' + num,
      type: 'POST',
      complete: function (jqXHR, textStatus) {
        // callback
      },
      success: function (data, textStatus, jqXHR) {
        // ADDING A ROW TO THE ORDERDETAILS TABLE

        //alert($('#product_name').text());

        var tr = adding_row(p_id, $('#product_name').text(),num,  $('#price_hidden').val());
       $('#order_details_tbody').append(tr); 
        $('#no_orders').remove();
        //update total
        update_total();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // error callback
        alert(errorThrown);
      }
    });
  }
  function update_sub_total(qty, pid){
    var tr = 'od_product_' + pid;
    var price = $('#' + tr + ' .price').html();
    sub_total = qty*price;
    $('#' + tr + ' .sub').html(sub_total);

  }

  function update_total(){
    var total = 0;
    $('.sub').each(function(){
      total +=  parseFloat($(this).text());
    });
    total = mg_round(total);
    $('#order_sum').html(  total);
  }

   $('.delete').click(function(){
    id = $(this).data('id');
    $.ajax({
      url: '<?= site_url('order/delete_item')?>/' + id,
      type: 'POST',
      
      complete: function (jqXHR, textStatus) {
        // callback
      },
      success: function (data, textStatus, jqXHR) {
        // success callback
        // delete the tr
        $(".odid" + id).remove();
        update_total();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
      }
    });
  });
    $('.category').click(function(){
      $('.cat a').removeClass('active-tab')
      $(this).addClass('active-tab');
      var id = this.dataset.id;

      $.ajax({
        url: '<?=site_url('product/ajax_category_products')?>/' + id,
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          $('.products_list').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });

    });



  $('#print').click(function(){
    print_invoice(0);
  });

  function print_invoice(end){
    var DocumentContainer = document.getElementById('order_details');
    var WindowObject = window.open('', 'PrintWindow', 
      'width=450,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
    WindowObject.document.writeln('<!DOCTYPE html>');
    WindowObject.document.writeln('<html><head><title></title>');
    WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="<?= base_url()?>/css/style.css">');
    WindowObject.document.writeln('</head><body>')

    WindowObject.document.writeln(DocumentContainer.innerHTML);

    WindowObject.document.writeln('</body></html>');

    WindowObject.document.close();
   // WindowObject.print();
    if(end == 1){
      //alert('end');
      var total = $('#order_sum').html();
      $.ajax({
        url: '<?php echo site_url("order/end/$order_id")?>/' + total,
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

  $('#order_details_tbody').on('click', '.r', function(){
    location.reload();
  });


  $('#print_close').click(function(){
    $.ajax({
      url: '<?=site_url("order/print_invoice/$order_id")?>',
      type: 'POST',
      complete: function (jqXHR, textStatus) {
        // callback
      },
      success: function (data, textStatus, jqXHR) {
        print_inv(data);
          window.location.replace('<?=site_url("order")?>'); 
        /*
        var total = $('#order_sum').html();
      $.ajax({
        url: '<?php echo site_url("order/end/$order_id")?>/' + total,
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
      });*/
        
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // error callback
      }
    });
  });


  function adding_row(pid, name, qty, price){
    var tr = '';
    tr += '<tr  id="od_product_' + pid+ '">';
    var sub = qty * price;
    tr += '<td>' + name + '</td>';
    tr += '<td data-qty='+ qty + ' class="qty">' + qty + '</td>';
    tr += '<td class="price">' + price + '</td>';
    tr += '<td class="sub">'+ sub + '</td>';
    tr += '<td> <a class="r">reload</a></td>';

    tr += '<tr>';
    //alert(tr);
    return tr;
  }
    $('#show_numpad').click(function(){
      $(this).hide();
      $('#numpad-container').show();
    });

  });

  function print_inv(data){
  
        var DocumentContainer = data;
        var WindowObject = window.open('', 'PrintWindow', 
          'width=450,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes');
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title>');
        WindowObject.document.writeln('<link rel="stylesheet" type="text/css" href="<?= base_url()?>css/style.css">');
        WindowObject.document.writeln('</head><body>')

        WindowObject.document.writeln(DocumentContainer);

        WindowObject.document.writeln('</body></html>');

        WindowObject.document.close();
           WindowObject.print();
  }
</script>



