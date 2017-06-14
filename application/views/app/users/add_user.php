<style type="text/css" media="all">
 #panel{
    padding: 2em 2em 1em 0em;
    width: 29%; 
  } 
h2{text-decoration:underline;margin:1em}
</style>
<h2>مستخدم جديد</h2>
<div id='panel'>
  <?= form_open('settings/add_user')?>
    <table>
      <tr>
        <td><?= form_input('name', $this->input->post('name'), 'title="الاسم" placeholder="الاسم"' )?></td>
      </tr>
      <tr>
        <td><?= form_input('username', $this->input->post('username'), 'title="اسم المستخدم" placeholder="اسم المستخدم"')?></td>
      </tr>
      <tr>
        <td><?= form_input('phone', $this->input->post('phone'), 'title="رقم التليفون" placeholder="رقم التليفون"')?></td>
      </tr>

      <tr>
        <td><?= form_password('password','', 'title="كلمة المرور" placeholder="كلمة المرور"')?></td>
      </tr>
      <tr>
        <td><?= form_password('confirm','', 'title="تأكيد كلمة المرور" placeholder="تأكيد كلمة المرور"')?></td>
      </tr>
      <tr>
        <td colspan='2'>
          <?= form_submit('submit', 'اضافة', "class='button ic-add blue'")?>
        </td>
      </tr>
    </table>
  <?= form_close(); ?>
</div>
