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
<div class="page-full-width cf">

    <?php $this->load->view('app/products/sidebar')?>
    <div class='side-content fl'>
      <div class='content-module'>
                  <div class="content-module-heading cf">
                      <h3>المنتجات</h3>
                  </div>

<ul class='container'>
<?php foreach ($categories as $c) {?>
<li class='cat' data-id='<?=$c->id?>'>
    <?= anchor('admin/product/category_products/' .$c->id, $c->name) ?>
  </li>
<?php }?>
</ul>
</div>
</div>
</div>
<br style='clear:both'>
<script type="text/javascript" charset="utf-8">
    

  
  
</script>

