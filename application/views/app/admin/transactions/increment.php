<?php 

$this->table->set_template($this->table_template);

$this->table->set_heading(
  $this->lang->line('items__id'), 
  $this->lang->line('items__name'), 
  $this->lang->line('items__reorder_level'),
  $this->lang->line('items__current_qty' ),
  $this->lang->line('add_qty' )
);

$id      = items__id;
$name    = items__name;
$desc    = items__desc;
$reorder = items__reorder_level;
$current = items__current_qty;
$unit    = items__item_unit;
foreach ($items as $i ){
  $this->table->add_row(
    $i->$id,
    $i->$name,
    $i->$reorder,
    $i->$current .' ' .$this->item_model->get_unit_name($i->$unit), 
    form_input('add_qty', 0)
  );
}

echo $this->table->generate();
echo "<div class='pagination'>$pagination</div>";
?>
