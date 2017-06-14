
<div id='orders_grid'>
    <?php $this->table_template['table_open'] = 
    '<table id="tbl_orders" border="0" cellpadding="4" cellspacing="0" class="sortable" style="width:100%">';
    
        $this->table->set_template($this->table_template);
        $this->table->set_heading(
          $this->lang->line('order_id'),
          $this->lang->line('shift'),
          $this->lang->line('total'),
          $this->lang->line('table'),
          $this->lang->line('date') ,
          $this->lang->line('start'),
          $this->lang->line('end')  
        );
        foreach ($orders as $o ){
          $this->table->add_row(
            $o->order_id,
            $o->shift_id,
            $o->total,
            $o->table,
            $o->date,
            $o->start_time, 
            $o->end_time
          );
        } 
    ?> 
</div>
  <?= $this->table->generate() .$pagination?>

