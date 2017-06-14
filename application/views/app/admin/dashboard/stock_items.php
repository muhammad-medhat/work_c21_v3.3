<?php
$this->table->set_template($this->table_template);

$this->table->set_heading( 
    'الخامة',
    'الكمية',
    'الوردية',
    'الوقت'
  );  
  foreach($stock_items as $i) {
    $this->table->add_row(

      //$this->item_model->get($i->id)->name,
         $i->name,
         $i->amount,
         $i->shift_id,
         $i->time
       );
      
     } 
  echo $this->table->generate();
  
?>

