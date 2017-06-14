<style type="text/css" media="all">
  .panel{border:solid 1px;border-radius:5px;margin:2em;padding:1em}
</style>  
  <div class='panel'>
    <?=form_open('tables/add_section')?>
    <?= form_input('section_name', '', 'placeholder="اسم اقاعة" ')?>
    <?= form_submit('add_sec', 'OK', 'class="button blue"');?>
    <?=form_close()?>
  </div>
  <div class='panel'>

<?=form_open('tables/add')?>

  <table>
    <tr>
      <td><?= form_dropdown('section',  $sections, '', 'size=4' )?></td>
      <td><input type="text" name="prefix" id="" value="" placeholder='حروف اختصار' /></td>
      <td><input type="number" name="num" placdholcer='عدد الترابيزات' /></td>
    </tr>
    <tr>
      <td colspan='2'><?=form_submit('submit', 'اضافة', 'class="button blue fl ac_add"')?></td>
    </tr>
  </table>
<?=form_close() ?>
</div>
