<div id='password_form'>
<div class='error'></div>
<?= ($this->session->flashdata('error') ) ? $this->session->flashdata('error') : '' ?>
  <?=form_password('password', '', ' class="password" style="padding:0" placeholder="كلمة مرور الالغاء"')?>
  <?=form_submit('cancel', 'الغاء', 'class="cancel"' )?>
</div>
