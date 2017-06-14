<?php
//var_dump($settings['stock']->value);

$this->load->view('app/admin/stocks/toolbar');
if($stock->id == $settings['stock'])
  echo "<h2 class='note'>المخزن الحالي</h2>";
$this->table->set_template($this->table_template);

$this->table->set_heading(
 // 'ID', 
  $this->lang->line('name'), 
  $this->lang->line('current_qty')
); 
foreach ($items as $i ){
  $this->table->add_row(
   // $i->id, 
    array('data'=>$i->name, 'style'=>'width:50%'), 
    mg_round($i->current_qty, approximation_items)
  );
}
echo $this->table->generate();
?>
  <div class='pagination'><?php //=$pagination?></div>

