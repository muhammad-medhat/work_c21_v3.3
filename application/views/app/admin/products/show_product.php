
<style type="text/css" media="all">
#main td{display:table-cell;vertical-align:top}
#ing{width:300px;border-radius:5px;margin:1em}
.row{
    width: 64%;
    margin-top: 1em;
    text-align: center
}
.col{border:solid 1px;padding:1em}
#items li{border:solid 1px;margin-top:4px;height:23px}
#items, #all_items{height:300px;width:300px}
#items{list-style-type:none;border:solid 1px}
#items tr{vertical-align:top;height:16px;display:block}
#panel{display:none}
/*#items span{margin-left:20%}*/
</style>
    <div id='main'>
        <div class='row'>
          <h2><?=isset($product)?$product->id .' - ' .$product->arabic .'( '. $product->price .' )':'asdf'?></h2>
        </div>
    <?= $pagination?>
<?php if(isset($product)) {?>


    <div  class='row'>
<?php ######################################################?>
         <div class='col fr'>

              <select id='items' class='items' size=<?=count($all_items)/2 ?>>
                  <?php if (isset($items)) {?>
                        <?php foreach($items as $item) { ?>
                        <option id='<?='option-' .$item->item_id?>' value=<?=$item->item_id?>>
                          <div class='name fr'><?= $item->item_id .' - ' .$item->name ?></div>
                          <div class='amount fl'>(<?=$item->amount ?>)</div>
                        </option>
                          
                        <?php } ?>
                  <?php } ?>
              </select>

          </div>
<?php ######################################################?>
          <div class='col fl'>
            <select id='all_items' class='items' size=<?=count($all_items)/2?> >
              <?php foreach($all_items as $item) { ?>
              <!--check for the assigned items before adding -->
                <?php if(!in_array($item->id, $items_ids)){?>
                  <option id='<?="option-$item->id"?>' value=<?=$item->id?>>
                    <?= $item->id .' - ' .$item->category_name .': ' .$item->item_name?>
                  </option>
                <?php }?>
              <?php } ?>
            </select>
          </div>
  </div>
</div>
<div id='panel'></div>
<?php }?>  
<script type="text/javascript" charset="utf-8">
  $(document).ready(function () {

    
    $('#items').on('click', 'option', function(){
        var item_id = $(this).val();//data('item_id');
        show_item_window(<?= $product->id?>, item_id)
       // $(this).closest('.action').css('color:#fff');  
    });
    
    function show_item_window(product_id, item_id){
      $('#panel').show();
      var url = 'admin/product/show_item_window' + '/' + product_id  + '/' + item_id;
      $('#panel').load('<?=site_url()?>/' + url);
    }


    $('#items option').dblclick(function(){
      /*unassign item*/
        var name = $('#items option:selected').text();
        var id = $('#items option:selected').val();
        var item_option ="<option value='" + id + "'>" + name + "</option>";
          remove_item(<?= $product->id?>, id);
          $(this).remove(); //removes item from the listbox
          $('#all_items').append(item_option);

    });
        /*assign item*/
        $('#all_items option').dblclick(function(){
          var name = $('#all_items option:selected').text();
          var id = $('#all_items option:selected').val();
          var item_option ="<option value='" + id + "'>" + name + "</option>";
          assign_item(<?= $product->id?>, id);
          $(this).remove(); //removes item from the listbox
          $('#items').append(item_option);
        });

    $('#panel').on('click', '#save_item', function(){
      var product_id = <?= $product->id?>;
      var item_id = $('.panel').data('item_id');
      var amount = $('#amount');//.text();
      //alert(amount);
      $.ajax({
      url: '<?=site_url('admin/product/assign')?>/' + product_id + '/' + item_id,// + '/' + amount,
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          //$('#items #option-' + item_id).remove();
        },
        success: function (data, textStatus, jqXHR) {
          $('.log').text(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });

      
    });
    /*************************************
    $('#panel').on('click', '#unassign', function(){
      var product_id = <?= $product->id?>;
      var item_id = $('.panel').data('item_id');
      //alert(item_id);
      $.ajax({
      url: '<?=site_url('admin/product/unassign')?>/' + product_id + '/' + item_id,
        type: 'POST',
        complete: function (jqXHR, textStatus) {},
        success: function (data, textStatus, jqXHR) {
          $('#items #option-' + item_id).remove();
         // var item_option ="<option value='" + item_id + "'>" + name + "</option>";
         // $('#all_items').append(item_option);

        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });
    });
  ******************************/
    function remove_item(pid, iid){
        $.ajax({
        url: '<?= site_url('admin/product/unassign')?>/' + pid + '/' + iid,
          type: 'POST',
          complete: function (jqXHR, textStatus) { },
          success: function (data, textStatus, jqXHR) {
            // success callback
          },
          error: function (jqXHR, textStatus, errorThrown) {
            // error callback
          }
        });
    }
    
  function assign_item(pid, iid){
    $.ajax({
    url: '<?= site_url('admin/product/assign_ajax')?>/' + pid + '/' + iid+ '/'+  '0.1',
      type: 'POST',
      complete: function (jqXHR, textStatus) { },
      success: function (data, textStatus, jqXHR) {
        $('.log').text(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        // error callback
      }
    });
  }


  });


</script>
