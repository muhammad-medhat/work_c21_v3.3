<?php
var_dump($items);
$this->table->set_template($this->table_template);
$this->table->set_heading( 
    'الخامة',
    'الكمية'
  );  
  foreach($items as $i) {
    $this->table->add_row(

         array('data'=>$i->name, 'style'=>'width:30%'),
         mg_round($i->amount, approximation_items)
    );
      
     } 
  echo $this->table->generate();
  
?>

