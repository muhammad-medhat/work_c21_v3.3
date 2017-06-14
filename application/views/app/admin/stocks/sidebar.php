<div class="side-menu fr">

            <h2>العمليات</h2>
            <ul> 

          <?php $urls = array(
            "admin/transaction/import/$stock->id"=>' وارد الى المخزن',
            'admin/item/new_item'=> 'اضافة خامة غير موجودة',
            'admin/item/categories'=> 'تصنيفات للخامات'
          ); 
            echo list_items2($urls)

          ?>


            </ul>

        </div>
