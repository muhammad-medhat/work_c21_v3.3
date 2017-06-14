

<?php

//$this->load->view('app/admin/stocks/sidebar');
$this->load->view('app/admin/stocks/toolbar');
$this->table->set_template($this->table_template);

$this->table->set_heading(
 // 'ID', 
  $this->lang->line('name'), 
  $this->lang->line('current_qty')
); 
foreach ($items as $i ){
  $this->table->add_row(
   // $i->id, 
    $i->name, 
    $i->current_qty
  );
}
echo $this->table->generate();
?>
  <div class='pagination'><?php //=$pagination?></div>

