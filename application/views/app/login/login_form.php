        <div id="login-intro" class="fl">

<img src="<?= base_url() ?>images/Untitled-3.jpg" alt="Club21 Cafe & Restaurant" />

        </div>


<!-- MAIN CONTENT -->

  <?= form_open('login/validate_credentials', 'id="login-form"', 'class="cmxform"') ?>

        <fieldset>
            <p> <?php

                if ($this->session->flashdata('error') != ''  ) {
                  echo "<div class='error-box round'>" . $this->session->flashdata('error')  . "</div>";
                }
                ?>

            </p>

            <p>
                <label for="login-username">اسم المستخدم</label>
                <input type="text" id="login-username" class="round full-width-input" placeholder="الاسم"
                       name="username" autofocus/>
            </p>

            <p>
                <label for="login-password">كلمة المرور</label>
                <input type="password" id="login-password" name="password" placeholder="كلمة المرور"
                       class="round full-width-input"/>
            </p>


            <!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
            <input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="بدء النظام"/>
        </fieldset>
<?= form_close();?>
