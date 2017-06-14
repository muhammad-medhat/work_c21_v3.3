
<?php
$dir = 'app/orders/';
$subdir = $dir .'show_order'
?>
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

<div class='div'>
      <!-- <div class='row'>
         <div id='order_type'>
               <?php $this->load->view($subdir .'/order_type')?>
         </div>

         <div id='order_tools'>
               <?php $this->load->view($subdir .'/order_tools')?>
         </div>
       </div> -->

      <div class='row'>
      
            <div id='order_details_container' class='fr' >
              <?php $this->load->view($subdir .'/order_details_table')?>
            </div>
      
            <div id='order_summery' class='fr' style='border:solid 1px;border-radius:5px;padding: 1em;'>
              <?php $this->load->view($subdir .'/summery')?>
            </div>
      
      </div>
      

</div>  






<script type="text/javascript" charset="utf-8">
  $(document).ready(function () {
 



 



  }); 

$('#print').click(function(){
    $.ajax({
      url: '<?=site_url("order/print_invoice/$order_id")?>',
      type: 'POST',
      complete: function (jqXHR, textStatus) {
        // callback
      },

      success: function (data, textStatus, jqXHR) {
        print_inv(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // error callback
      }
    });
  });

    function print_inv(data){
        var window_obj = window.open();
        window_obj.document.writeln('<!DOCTYPE html>');
        window_obj.document.writeln('<html><head><title></title>');

        window_obj.document.writeln('<link rel="stylesheet" media="print" type="text/css" href="<?= base_url()?>css/print.css">');

        window_obj.document.writeln(data);
        window_obj.document.writeln('</body></html>');

      window_obj.close();

    }
</script>



