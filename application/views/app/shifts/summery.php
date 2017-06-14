
<?php //var_dump($shift);?>
<?php if($shift){ ?>
<?= form_open("shift/end_shift")?>
  <table style='margin:1em'>
    <tr><td colspan='2'>  <h2><?=$shift->date?></h2>
    </td></tr>
      <tr><td>الوردية</td>      <td><?=$shift->id?></td></tr>
      <tr><td>من</td>           <td><?=$shift->start_time?></td></tr>
      <tr><td>الى</td>          <td><?=$shift->end_time?></td></tr>
      <tr><td>عدد الفواتير</td> <td><?=$orders_count?></td></tr>
      <tr><td>اسم المستخدم</td> <td><?=$shift->username?></td></tr>
      <tr><td>اجمالي المبيعات</td><td><?=$total?></td></tr>
    <tr>
    <td colspan='2' > <?=form_submit('close', 'انهاء الوردية', 'class="button blue fl"')?></td>
    </tr>
  </table>
<?=form_close();?>
<?php } else{
       show_error('No Shift Found', '404', $heading = 'An Error Was Encountered');
  
}?>
<script type="text/javascript" charset="utf-8">
/*  $(function () {
    $('.button').click(function(){
      $.ajax({
        url: '<?=site_url("shift/end_shift")?>',
        type: 'POST',
        complete: function (jqXHR, textStatus) {
          // callback
        },
        success: function (data, textStatus, jqXHR) {
          console.log(data);
          location.replace('<?=site_url('shift')?>')
        },
        error: function (jqXHR, textStatus, errorThrown) {
          alert(errorThrown);
        }
      });
    });
  });
 */
</script>
