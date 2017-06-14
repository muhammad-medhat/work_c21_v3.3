<style type="text/css" media="all">
 #items select{width:50%;margin: 6% 19%}
#items select option{font-weight:bold;font-size:16px}
/*#product .button{display:none;}*/
h1{margin:5%;text-decoration:underline}
.new{background-color:yellow}

/*.right-arrow , .left-arrow {height:32px;width:32px;margin:10px}*/
.grid{width:100%;border:solid 1px}
.grid td{border:solid 1px;padding:0}

 
</style>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
        $('#items option').dblclick(function(){
          var name = $('#items option:selected').text();
          var id = $('#items option:selected').val();
          var details ="<tr data-item='" + id +"' class='new'>"; 
            details += "<td>" + name + "</td>";
            details += "<td>"+  add_text() + "</td>"; 
            //details += "<td><a >X</a></td>"; 
            details += "<td><input type='hidden' name='item_id[]' value='" + id + "'  /></td>";
          details += '</tr>';
          $('#product .grid').append(details);
          $(this).remove(); //removes item from the listbox
        });
         function add_text(){
          var ret = "<input type='number' min=0 step=0.1 class='num' name='amount[]' />";
         return ret; 
        } 
  
        $('.delete').click(function(){
          
          var id = $(this).closest('tr').data('id');
          $.ajax({
            url: '<?=site_url('admin/product/delete_product_items/')?>' + '/' +id,
            type: 'POST',
            complete: function (jqXHR, textStatus) {
              // callback
            },
            success: function (data, textStatus, jqXHR) {
             $('#row_item' + id).remove();
            },
            error: function (jqXHR, textStatus, errorThrown) {
              alert(errorThrown);
            }
          });
        });
  });
</script>

    <div class='information-box'>
      من خلال هذه الصفحة يمكنك تعديل كميات كل خامة مستخدمة في كل منتج
    </div>
      <?= form_open('admin/product/assign/' .$product->id)?>
        <div id='product' class='fr' style='width:50%'>
          <?php $this->load->view('app/admin/products/assign/grid')?>
        </div>
        <div id='items' class='fl' style='width:50%'>
          <?php $this->load->view('app/admin/products/assign/items')?>
        </div>

      <?= form_close(); ?>
