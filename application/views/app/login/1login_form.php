<div id="login_form">

	<h1>تسجيل الدخول</h1>
  <p>
    يمكن تسجيل الدخول في النظام لتعديل بعض البيانات الخاصة بك
  </p>
  <table>
<?php if($this->session->flashdata('error')){?>
  <div class='warning'>
    <?php echo $this->session->flashdata('error') ;?>
  </div>
<?php } ?>
  <?php 
  	echo form_open('login/validate_credentials');
  	echo "<tr><td>" .form_input('username', '', 'placeholder="اسم المستخدم" autofocus') ."</td><td></td></tr>";
  	echo "<tr><td>" .form_password('password', '', 'placeholder="كلمة المرور" tabindex=0')."</td><td></td></tr>";
    $image = base_url() ."/images/signin.png";
    echo "<tr><td colspan='2'>" 
      .form_submit('submit', 'signin', 'class="reg" ' 
      ."style='background-image:url($image)'")."</td></tr>";

  //	echo form_submit('submit', 'تسجيل الدخول');
  //	echo anchor('login/signup', 'Create Account');
  	echo form_close();
  	?>
</table>

</div><!-- end login_form-->
