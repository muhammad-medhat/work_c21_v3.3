<div class="side-menu fr">

            <h3>اعدادات</h3>
<ul>


   <?php $urls = array(
     'tables/add'                   => array('display'=>'اضافة الضاولات','controller'=>'tables','method'=>'add'),
     'tables/edit_tables'           => array('display'=>'تعديل الطاولات','controller'=>'tables','method'=>'edit_tables'),
     'li1' =>array('sep' =>'sep'),
     'product'                      => array('display'=>'تعديل منتحات'),  
     'product/change_price'         => array('display'=>'تعديل الاسعار'),   
     'order'                        => array('display'=>'اعدادات الفواتير'),
     'settings/general_settings'    => array('display'=>'اعدادات النطام' ),
     'li2' =>array('sep' =>'sep'),

     'settings/users'               => array('display'=>'المستخدمين',      'controller'=>'settings','method'=>'users'),
     'settings/users_list'          => array('display'=>'قائمة المستخدمين','controller'=>'settings','method'=>'users_list')
   ); 
     echo list_items2($urls);

   ?>


            </ul>

        </div>
