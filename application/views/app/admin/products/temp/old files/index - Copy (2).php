<style type="text/css" media="all">
  #products_div{
    float:left;width:50%;border:solid;
  overflow:hidden;  
  position: fixed;
    top: 10%;
right:35%;
    margin-top: -50px;
    margin-left: -50px;
    /*width: 100px;
    height: 100px;*/
  }
.window .titlebar{cursor:move;width:100%;background-color:#000;height:20px}
 .container{float:right;text-align:right;width:30%;border:solid}

 .container li {
    border: solid 1px;
    margin: 1em;
    padding: 1em;
    cursor:pointer
 } 
.window, .cat:hover{background-color:#ececda}
</style>
<ul class='container'>
<?php foreach ($categories as $c) {?>
<li class='cat' data-id='<?=$c->id?>'>
    <?= $c->name ?>
  </li>
<?php }?>
</ul>
<div id='products_div' class='window' >
  <div class='titlebar'></div>
  <div class='content'></div>
</div>
<br style='clear:both'>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    
    $('.window').hide();
    $('.cat').click(function(){
      $('.window').show();
      
      var catid = $(this).attr('data-id');
      $.ajax({
        url: '<?= site_url("admin/product/ajax_category_products")?>' + '/' + catid,
        type: 'POST',
        dataType: 'xml/html/script/json',
        data: $.param( $('Element or Expression') ),
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          $('.content').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(' error callback');
        }
      });

    //alert(catid);
    });
    $('#products_div .titlebar').draggable();
  });
  
  
</script>

