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
 .container{text-align:right;width:30%}

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
      <?= anchor('admin/item/category_items/' .$c->id, $c->name) ?>
    </li>
  <?php }?>

</ul>
<br style='clear:both'>
<script type="text/javascript" charset="utf-8">
    

  
  
</script>

