<style type="text/css" media="all">
.pcontent{display:none;background-color:#fff;margin:1%}
  
</style>
<div  class='information-box'>
  يمكنك فقط تعديل الاسماء و الاسعار و التوصيف لمنتجات المكان
</div>
<ul id='tabs'>
    <?php foreach ($categories as $c) {?>
      <li class='cat' data-id='<?=$c->id?>'>
        <a data-id=<?=$c->id?>><?=$c->arabic?></a>
      </li>
    <?php }?>
</ul>
<br style='clear:both'>
<?php foreach($categories as $c) {?>
    <div class='pcontent' id="content-<?=$c->id?>"></div>
<?php } ?>
<script type="text/javascript" charset="utf-8">
    
$(document).ready(function(){
  $('.cat a').click(function(){
    var _id = $(this).data("id") 
    var _url = '<?= site_url('admin/product/ajax_category_products/')?>/' + _id;
    $('.active-tab').removeClass('active-tab');
    $(this).addClass('active-tab');

//AJAX REQUEST TO GET PRODUCTS
    $.ajax({
      url: _url,
      type: 'POST',
      complete: function (jqXHR, textStatus) {
        //alert(' callback');
      },
      success: function (data, textStatus, jqXHR) {

        $('.pcontent').hide();
        $('#content-' + _id).show().html(data);

      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert('errr' + jqXHR + textStatus + errorThrown);
      }
    });
    //alert(url);
  });

/*
  $('.pcontent').on('click', '.link', function(){
    //var id = $(this).attr("id") ;
    $('textarea').fadeOut('500');
    $(this).('textarea').fadeIn('500');
    //alert('asdf');
    
    //$('.hidden ' + '#desc_' + id).fadeIn('500');
    
  });
 */
  $('.pcontent').on('click', '.delete', function(){
    $(this).closest("tr").hide('1000'); // remove row
    //return false; // prevents default behavior
    var _id = $(this).attr("id");
    var id = _id.substr('delete_'.length, _id.length ); 
    $.ajax({
      url: 'product/delete/' + id,
      type: 'POST',
      complete: function (jqXHR, textStatus) {
        // callback
      },
      success: function (data, textStatus, jqXHR) {
        var tr = $(this).parent().parent();
        var td = $(this).parent();
          tr.hide();//.addClass('blue');
            $(this).closest("tr").remove(); // remove row
    return false; // prevents default behavior
       alert('removed');

      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
      }
    });
  });
  function delete_row(_id){
    
    $(this).closest('tr').hide();
    alert('deleting' + _id);
  }
});
  
  
</script>
<style type="text/css">
  .delete{cursor:pointer}
</style>
