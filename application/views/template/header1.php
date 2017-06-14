	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
      <ul id="tabs" class="fr">
<?php 

      $urls = array(
        'settings' => array('display'=>'اعدادات',           'class'=>'dashboard-tab', 'controller' => 'settings'),
        'order'    => array('display'=>'المبيعات',          'class'=>'sales-tab',     'controller' => 'order'),
        'product'  => array('display'=>'بيانات الاصناف',     'class'=>'report-tab',    'controller' => 'product'),
        //'user'     => array('display'=>'بيانات المستخدمين', 'class'=>'report-tab',    'controller' => 'user'),
        'shift'    => array('display'=>'الورديات',          'class'=>'customers-tab', 'controller' => 'shift'),
        'report'   => array('display'=>'التقارير',          'class'=>'report-tab',    'controller' => 'report')
      );

      echo list_items1(array_reverse($urls), 'li');
?>

			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
                         
		</div> <!-- end full-width -->	

	</div> <!-- end header -->

