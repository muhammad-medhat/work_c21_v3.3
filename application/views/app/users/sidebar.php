<div class="side-menu fr">

            <h3>المستخدمين</h3>
            <ul>
              <?php
                $urls = array(
                  'user/add'                 => array("اضافة مستخدم", '')
                  //'user/list'            => array("تعديل الاصناف في القائمة", '')

                );
                echo list_items($urls, 'li');
              ?>
            </ul>

        </div>
