<?php
$this->table->set_template($this->table_template);

$this->table->set_heading(
    '', 
    'الخامة',
    'الكمية المتبقية',
    'المخزن'
  );  
  foreach($items as $i) {
    $this->table->add_row(

         $i->id,
         $i->item_name,
         $i->current_qty,
         $i->stock_name
       );
      
     } 
  echo $this->table->generate();
  
?>

