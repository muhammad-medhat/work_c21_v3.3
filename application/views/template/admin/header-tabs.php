<div class='log'></div>
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
      <ul id="tabs" class="fr">
<?php 


      $urls = array(
        //'admin/settings'    => array('الاعدادات', 'dashboard-tab'),
        'administrator'     => array('display'=>'الرئيسية',      'class'=>'dashboard-tab', 'controller' => 'administrator'), 
        'admin/item'        => array('display'=>'الخامات',       'class'=>'stock-tab',    'controller' => 'item'), 
        'admin/product'     => array('display'=>'اصناف القائمة', 'class'=>'report-tab',     'controller' => 'product')
//        'admin/transaction' => array('display'=>'عمليات المخزن', 'class'=>'sales-tab',     'controller' => 'transaction') 
      );

      echo list_items1($urls, 'li');
?>

			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
                         
		</div> <!-- end full-width -->	

	</div> <!-- end header -->

