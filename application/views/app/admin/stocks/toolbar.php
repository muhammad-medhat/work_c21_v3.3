<div class="content-module-heading cf">

            <ul class='menu'> 

          <?php $urls = array(
            "admin/transaction/import/$stock->id"=>'اذن الصرف',
            "admin/inventory/new_stockitem/$stock->id"=> 'اذن توريد',
            'admin/item/new_item'=> 'خامة جديدة للنظام',
            'admin/item/categories'=> 'تصنيفات للخامات'
            
          ); 
            echo list_items($urls)

          ?>


            </ul>

        </div>
