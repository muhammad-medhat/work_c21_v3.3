<?php
if(isset($shift) ) {
    switch ($shift->closed) {
      case '0':
        $status = 'الوردية مفتوحة';
        break;
      
      default:
        $status = 'الوردية مغلقة';
        break;
    }
    ?>
    
        <h2><?=$status?></h2></td>
    <ul class='inner'>
         <li id='new'><a >وردية جديدة</a></li>
    
        <?php if($shift->closed==0){ //continue if shift still open?>
          <li id='continue'><a >متابعة الوردية</a></li>
        <?php } ?>
    </ul>
<?php } else {  ?>
  <h2>لا يوجد ورديات </h2>
  <ul class='inner'>
        <li><a id='new' >وردية جديدة</a></li>
  </ul>
<?php }?>
<script type="text/javascript" charset="utf-8">
$(function () {

    $('#new').click(function(){
      $.ajax({
        url: '<?=site_url('shift/new_shift')?>',
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          location.replace('<?=site_url('order')?>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
          // error callback
        }
      });
    });
    $('#continue').click(function(){
      $.ajax({
        url: '<?=site_url('shift/resume_shift')?>',
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          location.replace('<?=site_url('order')?>');
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });
    });

  });
</script>
