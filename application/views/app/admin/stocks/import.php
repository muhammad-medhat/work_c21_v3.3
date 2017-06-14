
<?php
  echo form_open('admin/transaction/importing');
  echo form_hidden('stock_id', $stock->id, 'class="stock"');
  echo form_hidden('type', 1);
?>
    <table>
      <tr>
        <td>الخامة</td>
        <td><?php if($items){ 
          echo form_dropdown('item_id', $items, $this->input->post('item_id'), 'id=items');
        } else echo "XXXXX";?></td>
      </tr>
      <tr>
        <td>الكمية</td>
      <td><?= "<input type='number' step=0.1 min=0 name='qty' value='" .$this->input->post(items__current_qty) ."' />"?></td>
      </tr>'
      <tr>
        <td>المخزن</td>
        <td><?= form_dropdown('stock', $stocks, $this->input->post('stock'))?></td>
      </tr>
      <tr>
        <td colspan='2'>
          <?= form_submit('submit', 'اضافة')?>
        </td>
      </tr>
    </table>
<?php echo form_close(); ?>
<div id='info'></div>
<script type="text/javascript" charset="utf-8">
  $(function () {

    $('#items').click(function(){
    
      $(this).change();
    });
    $('#items').change(function(){
      var item_id = this.value;
      var stock_id = $("input[name='stock_id']").val();
      //alert(id);
      $.ajax({
        url: '<?=site_url("admin/item/ajax_showitem")?>/'+ item_id + '/' + stock_id,
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          $('#info').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });
    });
  });
</script>
