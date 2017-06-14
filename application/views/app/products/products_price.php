<style type="text/css" media="all">
  input[type=number]{width:3em}
  input[type=checkbox]{width:3em}
.bold{font-weight:bold}
tr{background-color:none}
td{margin:1em}
.free{position:fixed}
.new_p{width:100%}
.new_p tr td{margin:1em;text-align:right}
.tick{
    background-image:url('<?=base_url('images/checked.gif')?>');
    width:14px;
    height:14px
}
</style>
<form action="<?=site_url('product/change_price')?>" method="post">
  
      <table>
        <tr>
          <td>العملية</td>
          <td>
            <select name="opration" id="">
              <option>  </option>
              <option value='1'> + افاغة قيمة</option>
              <option value='2'> - طرح قيمة</option>
              <option value='3'> * ضرب قيمة</option>
              <option value='4'> ÷ قسمة قيمة</option>
            </select>
          </td>
          <td><input type="number" name="val" id="" value="1"  /></td>
          <td><input type="checkbox" name="per" id="" value="%" />%</td>
        </tr>

        <tr>
          <td colspan='4' style='margin:1em'><input type="submit" name="submit" value="تغيير الاسعار" class='button blue fl' /></td>  
        </tr>
      </table>
</form>

<?php 
  if(isset($temp)){
    echo form_open('product/change_price');
    if(!isset($done_update) || $done_update == false ) { 
        echo  form_submit('update', 'تعديل الاسعار', 'class="free button fl"');
    } 
    echo form_close();
?>
<h2>معاينة</h2>
<table class='new_p'>
<?php foreach ($temp as $p) {?>
  <tr>
    <td style='width:10%'><?= $p->id?></td>
    <td style='width:50%'><?= $p->arabic?></td>
    <td><?= $p->price?></td>
    <td class='bold'><?= (isset($p->new_price))? $p->new_price:'<p class="tick"></p>' ?></td>
  </tr>
<?php }?>
</table>
<?php } ?>
