<style type="text/css" media="all">
#items select{width:50%}
#items select option{font-weight:bold;font-size:16px}
#product table{width:50%;margin-top:2em}
#product table tr{margin:2em}
.hidden{display:none}
.ing( color:red)
.num{
	padding: 0.833em; 
margin:1em;
	display: inline-block;
	text-decoration: none;
  background-repeat: no-repeat
}
#product .button{display:none;}
</style>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){

        $('#items option').dblclick(function(){
          var name = $('#items option:selected').text();
          var id = $('#items option:selected').val();
          var details ="<tr data-item='" + id +"'>"; 
            details += "<td>" + name + "</td>";
            details += "<td>"+  add_text() + "</td>"; 
            details += "<td><input type='hidden' name='item_id[]' value='" + id + "'  /></td>";
          details += '</tr>';
          $('#product #ingrediants').prepend(details);
          $(this).remove();
          $('#product #ingrediants .button').show();
        });

        function add_text(){
          var ret = "<input type='number' min=0 step=0.1 class='num' name='qty[]' />";
         return ret; 
        }
        $('#product table.button').on('click', '#product table.button', function(){
            alert('adsf');
        });


        $('#product select').change(function(){
          var id = $(this).val();
          $.ajax({
            url: '<?=site_url("admin/product/ajax_product_items")?>/' + id,
            type: 'GET',
            complete: function (jqXHR, textStatus) {
              //alert(' callback');
            },
            success: function (data, textStatus, jqXHR) {
              $('#assigned_items table').html(data)
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alert(jqXHR+ ':==' + textStatus + ':=='+ errorThrown);
            }
          });
        });
        

    });
</script>
<?php if(validation_errors()) {?>
  <fieldset class='errors'>
  <?php echo validation_errors(); ?>
  </fieldset>
<?php } ?>
<?php if($this->session->flashdata('message')) {?>
  <fieldset class='message'>
  <?=$this->session->flashdata('message')  ?>
  </fieldset>
<?php } ?>
<div class="page-full-width cf">

    <?php $this->load->view('app/products/sidebar')?>
    <div class='side-content fl'>
      <div class='content-module'>
       <div class="content-module-heading cf">
           <h3>الكميات و المنتجات</h3>
       </div>
<div id='wizard'>
      <?= form_open('admin/product/assign')?>
        <div id='product' class='fr' style='width:50%'>
          <?php $this->load->view('app/products/wizard/first')?>
        </div>
        <div id='items' class='fl' style='width:50%'>
          <?php $this->load->view('app/products/wizard/second')?>
        </div>
        <div>
        </div>
      <?= form_close(); ?>
</div>
    </div>
   </div>
  </div>
