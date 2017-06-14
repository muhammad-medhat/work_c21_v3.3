<?php
$this->table->set_heading('asdf','asdf','asdf', 'asdf');
foreach ($products as $key) {
  $this->table->add_row($key->id, $key->name, $key->price, $key->cat_id  );
}
echo $pagination;
echo $this->table->generate();
?>
