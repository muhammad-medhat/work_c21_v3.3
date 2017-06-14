<style type="text/css" media="all">
  .full td{width:5%}
</style>
    <?php 
    
    $this->table->set_template($this->table_template);
    
    $this->table->set_heading(
  //    $this->lang->line('items_transactions__id'), 
      $this->lang->line('items_transactions__item_id'), 
      $this->lang->line('items_transactions__qty'), 
      $this->lang->line('items_transactions__date'),
      $this->lang->line('items_transactions__notes')
      
    );
    
      $id = items_transactions__id;
      $item_id = items_transactions__item_id;
      $qty = items_transactions__qty;
      $date = items_transactions__date; 
    foreach ($transactions as $t ){
      $this->table->add_row(
    //    $t->$id,
        $this->transaction_model->get_item_name($t->$item_id),
        $t->$qty,
        $t->$date, 
        $t->notes
      );
    }
    
    echo $this->table->generate();
    echo "<div class='pagination'>$pagination</div>";
?>

      </div>
      
    </div>
</div>
