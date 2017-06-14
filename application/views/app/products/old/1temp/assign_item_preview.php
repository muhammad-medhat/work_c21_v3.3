<?php if(validation_errors()) {?>
  <fieldset class='errors'>
  <?php echo validation_errors(); ?>
  </fieldset>
<?php } ?>
<?php if($this->session->flashdata('message')) {?>
  <fieldset class='message'>
  <?=$this->session->flashdata('message')  ?>
  </fieldset>
<?php } ?>
<?php $this->load->view('app/products/sidebar')?>

<?php //var_dump($products_items);?>
<?php echo form_open('admin/product/assigning')?>
<?php 
    $this->table->set_template($this->table_template);

    $this->table->set_heading(
      '','',
      'المنتج',
      'الخامة',
      'الكمية'
    );
    
    foreach($products_items as $pi) { 

      $this->table->add_row(
        form_hidden('pid[]', $pi->id),
        $pi->id, 
        $pi->product_id, 
        $pi->item_id,
        form_input('amount[]',$pi->amount)
      );
    }
 $this->table->add_row(form_submit('submit', $this->lang->line('save') ));
echo $this->table->generate();
echo form_close(); ?>

