  $(document).ready(function () {
    
    
      $('#all_products').on('click', '.product',function(){
        $('.product_selected').removeClass('product_selected');
        $(this).addClass('product_selected');
        
        var name = $(this).text();
        $('#product_name').html(name);
      
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
          //problem cuses a relode to the add_new page
          //tht results in dublicagtiong the order for rthe same table
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

  function update_total(){
    var total = 0;
    $('.sub').each(function(){
      total +=  parseFloat($(this).text());
    });
    $('#order_sum').html(total);
  }0

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
          alert('error callback');
        }
      });

    });

  $('#print_e').click(function(){
    print_invoice(1);

  })

  $('#print').click(function(){
    print_invoice(0);
  });

  function print_invoice(end){
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
    if(end == 1){
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

});
