
<?php
var_dump($shift);
?>
<table>
<tr><td colspan='2'>  <h2><?=$shift->date?></h2>
</td></tr>
  <tr><td>الوردية</td>      <td><?=$shift->id?></td></tr>
  <tr><td>من</td>           <td><?=$shift->start_time?></td></tr>
  <tr><td>الى</td>          <td><?=$shift->end_time?></td></tr>
  <tr><td>اسم المستخدم</td> <td><?=$shift->username?></td></tr>
  <tr><td>اجمالي المبيعات</td><td><?=$total?></td></tr>
<tr>
<td colspan='2' > <?=form_submit('close', 'انهاء الوردية', 'class="button fl"')?></td>
</tr>
</table>
<script type="text/javascript" charset="utf-8">
  $(function () {
    $('.button').click(function(){
      $.ajax({
        url: '<?=site_url("shift/end_shift/$shift->id")?>',
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
</script>
