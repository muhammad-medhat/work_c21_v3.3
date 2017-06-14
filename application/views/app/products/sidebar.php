<div class="side-menu fr">

            <h3>المنتجات</h3>
            <ul>
              <?php
                $urls = array(
                  'product/add'                 => array("اضافة مننج ", ''),
                  'product/add_category'        => array("اضافة قائمة ", ''),
                  'product/categories'          => array('تصنيفات القائمة', ''),
                  'product/products'            => array("تعديل الاصناف  ", ''),
                  'product/change_price'        => array('تعديل الاسعار', '')

                );
                echo list_items($urls, 'li');
              ?>
            </ul>

        </div>
