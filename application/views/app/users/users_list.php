
<?php
$this->table->set_template($this->table_template);
$this->table->set_heading(
  'ID', 
  $this->lang->line('name'), 
  $this->lang->line('username'), 
  
  $this->lang->line('phone'), 
  $this->lang->line('role') );
foreach ($users as $u ){
  $this->table->add_row(
    $u->id,
    $u->name,
    $u->username,
 
    $u->phone,
    $u->role
  );
}
echo $this->table->generate();
?>
