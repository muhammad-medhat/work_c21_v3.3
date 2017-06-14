<?php
//var_dump($tables);
?>
<style type="text/css" media="all">
input[type='text']{text-align:center}
</style>
<table>
<?php foreach ($tables as $t) { ?>
  <tr id='table-<?=$t->id?>' >
    <td><?= $t->section?></td>
    <td><?= form_input('name', $t->name, "data-id='$t->id' class='edit'") ?></td>
    <td><button type="button" id='delete-<?=$t->id?>' data-id='<?=$t->id?>' class='delete ic-delete red button'>حذف</button></td>
  </tr>
<?php }?>
</table>
<script type="text/javascript" charset="utf-8">

$(document).ready(function(){
  $('.edit').keypress(function(){
    var id = $(this).data('id');
    var val = $(this).val();
    $.ajax({
      url: '<?= site_url('tables/edit_table/')?>' + id + '/' + val,

      type: 'POST',
      complete: function (jqXHR, textStatus) {
        // callback
      },
      success: function (data, textStatus, jqXHR) {
       // alert('done');
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
      }
    });
  });

  $('.delete').click(function(){
    var id = $(this).data('id');
    $.ajax({
      url: '<?= site_url('tables/delete/')?>' + id,
      type: 'POST',
      complete: function (jqXHR, textStatus) {  },
      success: function (data, textStatus, jqXHR) {
        $('#table-' + id).hide(500);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        alert(errorThrown);
      }
    });
  });
});
</script>
