<div class="side-menu fr">

            <h3>تقارير</h3>
<ul>
<?php 

      $urls = array(
        'report/simple'  => array('display'=>'وردية مختصر',     'controller'=>'', 'method' => 'simple'),
        'report/details' => array('display'=>'وردية مفصل',      'controller'=>'', 'method' => 'details'),
        //'report/tables'  => array('display'=>'مبيعات ترابيزات', 'controller'=>'', 'method' => 'table'),
        'report/users'   => array('display'=>' المستخدمين',     'controller'=>'', 'method' => 'users')
      );

      echo list_items2($urls, 'li');
?>
</ul>
        </div>
