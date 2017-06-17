<style type="text/css" media="all">
  #numpad-container{display:none}
</style>

<?php
//var_dump($order);
$dir = 'app/orders/';
$subdir = $dir .'order_details';
$this->data['subdir'] = $subdir;
?>
<input type=hidden name='phidden' id='price_hidden' />


<input type="hidden" name="order_type" id="order_type" value="<?=$order->order_type?>" />
<?php
$this->load->view($subdir .'/simple_view');
$this->load->view($subdir .'/password_view');
$this->load->view($subdir .'/tables_list');
//shows order of a table
//order id must be provided
?>


    <div class='div'>

      <div class='row' style='background:#ccc;border:solid 1px #000'>
        <div id='order_type' class='td'>
              <?php $this->load->view($subdir .'/order_type', $this->data)?>
        </div>
         <div id='order_tools' class='td fr'>
               <?php $this->load->view($subdir .'/order_tools')?>
               <?php $this->load->view($dir .'/side_tools')?>
         </div>
      </div>


      <div class='row'>
            <div id='order_details_container' class='fr' >
              <?php $this->load->view($subdir .'/order_details_table')?>
            </div>
      
            <div id='order_summery' class='fr' style='border:solid 1px;border-radius:5px;padding: 1em;'>
              <?php $this->load->view($subdir .'/summery')?>
            </div>
      
      </div>
      
      <div id='all_products'>
        <?php $this->load->view('app/orders/products'); ?>
      </div>
</div>  






<script type="text/javascript" charset="utf-8">
  $(document).ready(function () {
    update_all();
    
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


<?php if($order->customer_id!=0) { ?>
  $('#change_table, #change_table_div').click(function(){
    var to  = $('#table_id').val();
    if(to !=0){
      $.ajax({
        url: '<?=site_url("order/change_table/$table->id")?>/' + to,
        type: 'POST',
        complete: function (jqXHR, textStatus) { },
        success: function (data, textStatus, jqXHR) {
          //alert('done');
          location.replace('<?=site_url('order')?>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
      });
    }
  });
<?php } else {  ?>
  $('#change_table, #change_table_div').click(function(){
    var to  = $('#table_id').val();
    if(to !=0){
      $.ajax({
        url: '<?=site_url("order/change_table_orderid/$order->id/")?>' + to,
        type: 'POST',
        complete: function (jqXHR, textStatus) {    },
        success: function (data, textStatus, jqXHR) {
          alert('done');
          location.replace('<?=site_url('order')?>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
      });
    }
  });

<?php } ?>
  <?php if($order->order_type == 1){ //Dine In?>
      $('.table').click(function(){
        var tid = $(this).data('tid');
         $.ajax({
            url: '<?=site_url("order/change_table_id/$order->id/")?>' + tid,
            type: 'POST',
            complete: function (jqXHR, textStatus) {     },
            success: function (data, textStatus, jqXHR) {
              location.replace('<?=site_url('order')?>');
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alert(errorThrown);
            }
          });
          //get tid saved in data-id
          //call order/change_table/order->customer_id/tid
          //
        });
  <?php } ?>

  $('#print_disc').on('click', function(){
    var disc = $('.val').val();
    make_discount(disc);

     $.ajax({
      url: '<?=site_url("order/enhanced_invoice/$order_id")?>',
      type: 'POST',
      complete: function (jqXHR, textStatus) {      },
      success: function (data, textStatus, jqXHR) {      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
      }
    }); 
  });

/*
  $('#print_1').click(function(){
    $.ajax({
      url: '<?=site_url("order/enhanced_invoice/$order_id")?>',
      type: 'POST',
      complete: function (jqXHR, textStatus) {  },
      success: function (data, textStatus, jqXHR) {     },
      error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
      }
    });
  });
*/
  $('#print_close').click(function(){
    $.ajax({
      //url: '<?=site_url("order/print_invoice/$order_id/1")?>',
      url: '<?=site_url("order/enhanced_invoice/$order_id/1")?>',
      type: 'POST',
      complete: function (jqXHR, textStatus) {  },
      success: function (data, textStatus, jqXHR) {
          window.location.replace('<?=site_url("order")?>'); 
      },

      error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
      }
    });
  });


  function adding_row(pid, name, qty, price, od_id){
    var tr = '';
    tr += '<tr  id="od_product_' + pid+ '">';
    var sub = qty * price;
    tr += '<td>' + name + '</td>';
    tr += '<td data-qty='+ qty + ' class="qty">' + qty + '</td>';
    tr += '<td class="price">' + price + '</td>';
    tr += '<td class="sub">'+ sub + '</td>';
   // tr += '<td> <a class="r">reload</a></td>';
    tr += '<td><a data-id="'+ od_id + '" class="delete temp_row table-actions-button ic-table-delete"></a></td>';
    if(qty >1){
      //tr += '<td> <a data-id="'+ od_id + '" class="edit table-actions-button ic-table-edit"></a></td>';
      tr += '<td> <a data-id="' + od_id + '" data-pid="' + pid + '" class="minus table-actions-button ic-table-minus"></td>';
    }else
      tr +=  '<td></td>';
    tr += '</tr>';
    //alert(tr);
    return tr;
  }
    $('#show_numpad').click(function(){
      //$(this).hide();
      //$('#numpad-container').show();
      $('#numpad-container').toggle('slow');
    });
	
  /************** TOOLBAR ************************/
  

  function cancel_order(pass){
  $.ajax({
        url: '<?=site_url("order/cancel_order/$order->id")?>/' + pass,
        type: 'POST',
        complete: function (jqXHR, textStatus) { },
        success: function (data, textStatus, jqXHR) { 
          if(data == 'error'){
            $('#password_form .error').show().addClass('red').html('لا يمكن الالغاء')
              //.css({'color': 'red', 'border':'solid 1px'});
            //$('#password_form .error').html('لا يمكن الالغاء');
          }
          else
          location.replace('<?=site_url('order')?>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });
 
  }

    $( "#password_form" ).dialog({ 
        autoOpen: false, 
        title: "الغاء الفاتورة", 
        width: $(window).width()/3.5, 
        modal: true, 
        closeText: "اغلاق"
    });

    $('.cancel').click(function(){
       $('#password_form').dialog('open');
       return false;
    });

    $('#password_form .cancel').click(function (){
      var pass = $('.password').val();
      cancel_order( pass);
    });

    $('#order_type_details').hide();
    
    $('#show_order_type_detials').click(function(){
      // $('#order_type_details').show();
      $('#order_type_details').toggle('slow');
    });
     
  });

    $('.per').change(function(){
      var per = $(this).val();
      var total = get_sum();
      var val = per * total / 100; 
      $('.val').val(val);
    });

    function make_discount(disc){
      $.ajax({
        url: '<?=site_url("order/discount/$order->id/")?>' + disc,
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          print_invoice();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });
    }
 
    /******************* END TOOLBAR *************************/

    /******************** SIDEBAR ***********************/
    $('#simple_form_anchor').click(function(){
      $('#simple_form').dialog('open');
      return false;      
    });
    $( "#simple_form" ).dialog({ 
        autoOpen: false, 
        title: "الخصم", 
        width: $(window).width()/3.5, 
        modal: true, 
        closeText: "اغلاق"
    });

    /******************** END SIDEBAR ***********************/
    function print_invoice(){
      $.ajax({
        //url: '<?= site_url("order/print_invoice/$order->order_id") ?>',
        url: '<?= site_url("order/enhanced_invoice/$order->order_id") ?>',
        type: 'POST',
        complete: function (jqXHR, textStatus) {    },
        success: function (data, textStatus, jqXHR) {   
            location.replace('<?=site_url('order')?>');
        },
        error: function (jqXHR, textStatus, errorThrown) {    }
      });
    }
    /******************* HELPER FUNCTIONS *******************/
    
  function get_sum(){
    var total = 0;
    $('.sub').each(function(){
      total +=  parseFloat($(this).text());
    });
    //total = mg_round(total);
    return total.toFixed(2);
  }

  function get_service(){
    var total = get_sum();
    var type = $('#order_type').val();
    var service = 0;
    switch (type) {
      case '1': // din in
        service = <?=$this->data['settings']['service']?>;
        break;
      case '3': //delivery
        service = <?=$this->data['settings']['delivery_service']?>;
   break;   
      default:
        service = 0;
    }
    return  (total * service / 100).toFixed(2); 
  }

  function update_sub_total(qty, pid){
    var tr = 'od_product_' + pid;
    var price = $('#' + tr + ' .price').html();
    sub_total = qty*price;
    $('#' + tr + ' .sub').html(sub_total);
  }

  function update_all(){
    update_total();
    update_service();
    update_grandtotal();
  }

  function update_total(){
    var total = get_sum();
    $('#order_sum').html(  total);
    $('.sum').html(  total);
    update_service();
  }

  function update_service(){
    var service = get_service();
    $('.service').html( service );
  }
  function update_grandtotal(){
    var total = get_sum();
    var service = get_service();
    var grand = +total + +service;
    $('.grand').html ( grand );
  }
  /******************** SUMMERY ***************************/
    $('.show_tables').click(function(){
      $('#tables_list').dialog('open');
      return false;      
    });
    $( "#tables_list" ).dialog({ 
        autoOpen: false, 
        title: "اختيار الطاولة", 
        width: $(window).width()/3.5, 
        modal: true, 
        closeText: "اغلاق"
    });
    
</script>



