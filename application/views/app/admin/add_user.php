
<?php $this->load->view('app/admin/users_list')?>
<?= form_open('admin/user/adding')?>
    <table>
      <tr>
        <td><?= form_input('name', $this->input->post('name'), 'placeholder="' .$this->lang->line('name') .'"' )?></td>
      </tr>
      <tr>
        <td><?= form_input('username', $this->input->post('username'), 'placeholder="اسم المستخدم"')?></td>
      </tr>
      <tr>
        <td><?= form_input('phone', $this->input->post('phone'), 'placeholder="رقم التليفون"')?></td>
      </tr>
      <tr>
        <td><?= form_input('email', $this->input->post('email'), 'placeholder="اسم المستخدم"')?></td>
      </tr>
      <tr>
        <td><?= form_password('password','', 'placeholder="كلمة المرور"')?></td>
      </tr>
      <tr>
        <td><?= form_password('confirm','', 'placeholder="تأكيد كلمة المرور"')?></td>
      </tr>
      <tr>
        <td colspan='2'>
          <?= form_submit('submit', 'اضافة', "class='button ic-add blue'")?>
        </td>
      </tr>
    </table>
<?= form_close(); ?>
