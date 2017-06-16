<style type="text/css" media="all">
#numpad{border:solid 1px;border-radius:5px;padding:0.75em}
#numpad #nums table button{width:50px;height:50px;font-size:16px;margin:5px}
#numpad input{width: 94%;margin-right: 0.4em;text-align:center;font-size:16px}
#product_name{text-decoration:underline }
#num{padding:0.25em}
.close{
  cursor: pointer;
  margin: -0.75em;
  height: 2em;
  padding-top: 11px;
  padding-right: 1em;
border-radius:5px 5px 0 0;

}
</style>

      <div id='numpad'>
          <div class='close blue'> لوحة المفاتيح</div>
        <h3 id='product_name'></h3>
        <input type="text" name="" id="num" value="" />
        <div id="nums">
          <table>
            <?php for($i=1;$i<=9;$i++) {?>
              <?=(($i-1)%3 == 0)?'</tr><tr>':''?>
              <td><button class='calc' value='<?=$i?>'> <?=$i?> </button></td>
            <?php } ?>
            <tr><td colspan=3><button value='0' style='width:100%'>0</button></td></tr>
            <tr><td colspan=3><button id='add'  style='width:100%'>اضافة</button></td></tr>
          </table>
        </div>
      </div>
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
  //numpad
  $("#nums button").click(function() {
      $("#num").val($('#num').val() + $(this).val());
  });



  $('.close').click(function(){
   $('#numpad-container').hide();
  });

  
});
</script>
