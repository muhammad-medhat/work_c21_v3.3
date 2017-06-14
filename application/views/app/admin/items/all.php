<?php

$this->table->set_template($this->table_template);

$this->table->set_heading(
  '',
  $this->lang->line('name'), 
  $this->lang->line('current_qty') 
);

foreach ($items as $i ){
  $this->table->add_row(
    array('data'=>$i->cat_name, 'style'=>'width:20%'),
    array('data'=>$i->item_name, 'style'=>'width:40%'),
    mg_round($i->current_qty, approximation_items)

  );
}
echo "<h4><u>خامات $stock_name</u></h4>";
?>
<div>
  <div>
    <a href="#">اظهار الكل</a>
  </div>
  <div>
    SHOW CATEGORIES
  </div>
</div>
<?php
echo $this->table->generate();

echo $pagination

?>

