<div class="side-menu fr">

            <h3>الخامات</h3>
            <ul> 

          <?php $urls = array(
            'admin/inventory'=>array('display'=>'اعدادات المخازن', 'method'=>'', 'controller'=>'item' ),
            //'admin/item/all'=>' رصيد الخامات',
            'admin/item/new_item'   => array('display' => 'اضافة خامة غير موجودة', 'method'=>'new_item', 'controller'=>''), 
            'admin/item/categories' => array('display' => 'تصنيفات للخامات',       'method'=>'categories', 'controller'=>'')
          ); 
            echo list_items2($urls)

          ?>


            </ul>

        </div>
