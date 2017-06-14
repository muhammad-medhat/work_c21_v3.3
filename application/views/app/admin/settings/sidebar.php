<div class="side-menu fr">

            <h3>اعدادات</h3>
            <ul> 

          <?php $urls = array(
            'admin/inventory' => array('display'=>'اعدادات المخازن','controller'=>'', 'method'=>''),
            'admin/product'   => array('display'=>$this->lang->line('add/edit_products'),'controller'=>'','method'=>'edit_products'),
            'admin/item'      => array('display'=>$this->lang->line('add/edit_materials'),'controller'=>'','method'=>'edit_materials'),
            'admin/order'     => array('display'=>'اعدادات الفواتير'),
            'admin/settings/general_settings'  => array('display'=>'اعدادات النطام'),
            'admin/user'      => array('display'=>$this->lang->line('add/edit_users'))
          ); 
            echo list_items2($urls)

          ?>


            </ul>

        </div>
