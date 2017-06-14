<div class="side-menu fr">

            <h3>المنتجات</h3>
            <ul>
              <?php
                $urls = array(
                  'admin/product/add'                 => array("اضافة مننج للقائمة", ''),
                  //'admin/product/assign_item_grid'    => array("تعيين كميات المنتجات", ''),
                  
                  
                  //'admin/product/assign_item'         => array("تعيين كميات المنتجات1", ''),
                  //'admin/product/assign_item_preview' => array("عرض كميات المنتجات",''),
                  
                  'admin/product/add'                 => array("اضافة مننج للقائمة", ''),
                  'admin/product/categories'          => array("تعديل تصنيفات القائمة", ''),
                  'admin/product/products'            => array("تعديل الاصناف في القائمة", '')

                );
                echo list_items($urls, 'li');
              ?>
            </ul>

        </div>
