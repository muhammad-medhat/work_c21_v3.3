	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
<nav role="full-horizontal main_menu">
	
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
		</nav>	
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
                         
		</div> <!-- end full-width -->	

	</div> <!-- end header -->

<style>
  .full-horizontal{}
.full-horizontal li{}
</style>
<script>
      $(document).ready(function(){

        $('#header-with-tabs').hide();
        
        // show/hide the menubar
        $('.content-module-heading').mouseenter(function(){
          var el = '#header-with-tabs';
          var duration = 500;
          var hid = $('#header-with-tabs').css('display');
          if(hid == 'block')
            $(el).hide(duration);
          else
            $(el).show(duration);
        });
      })
</script>
