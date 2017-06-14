<div class="side-menu fr">

            <h3>اعدادات</h3>
            <ul> 

   <?php $urls = array(
     //'product'   => array('display'=>$this->lang->line('add/edit_products'),'controller'=>'settings','method'=>'edit_products'),
     //'product/change_price'   => array('display'=>'تعديل الاسعار','controller'=>'settings','method'=>'change_price'),
     'tables/add'   => array('display'=>'اضافة الضاولات','controller'=>'tables','method'=>'add'),
     'tables/edit_tables'   => array('display'=>'تعديل الضاولات','controller'=>'tables','method'=>'edit_tables')




   ); 
     echo list_items2($urls)

   ?>


            </ul>

        </div>
