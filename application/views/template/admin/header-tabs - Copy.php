<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
      <ul id="tabs" class="fr">
<?php 

    $controllers = array();
    $this->load->helper('file');

    // Scan files in the /application/controllers directory
    // Set the second param to TRUE or remove it if you 
    // don't have controllers in sub directories
    $files = get_dir_file_info(APPPATH.'controllers/admin', FALSE);

    // Loop through file names removing .php extension
    foreach (array_keys($files) as $file)
    {
        $controllers[] = str_replace('.php', '', $file);
    }
    $urls1 = array();
    echo"<ul>";
    foreach ($controllers as $ctrl) {
     echo "<li style='margin:1em'>$ctrl || ". ($ctrl)$ctrl->get_text_display() ."</li>";//$urls1["admin/$ctrl"]=array('class'=>$ctrl, 'display'=>$ctrl->display);
    }
    echo"</ul>";
    //var_dump($controllers);

      $urls = array(
        //'admin/settings'    => array('الاعدادات', 'dashboard-tab'),
        'administrator'     => array('الرئيسية',      'dashboard-tab'),
        'admin/item'        => array('الخامات',       'report-tab'),
        'admin/transaction' => array('عمليات المخزن', 'sales-tab'),
        'admin/product'     => array('اصناف القائمة', 'stock-tab')
      );

      echo list_items($urls, 'li');
?>

			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
                         
		</div> <!-- end full-width -->	

	</div> <!-- end header -->

