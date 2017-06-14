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
<div class="page-full-width cf">

    <?php $this->load->view('app/products/sidebar')?>
    <div class='side-content fl'>
      <div class='content-module'>
                  <div class="content-module-heading cf">
                      <h3>الكميات و المنتجات</h3>
                  </div>
<?php echo form_open('admin/product/assigning')?>
<?php 
    $this->table->set_template($this->table_template);

    $this->table->set_heading(
      'المنتج',
      'الخامة',
      'الكمية'

    );
    $id = products__id;
    $name = products__name;
    foreach($products as $p) { 

        echo form_hidden('pid[]', $p->$id);
      $this->table->add_row(

      
        form_dropdown("product_id[][$p->id]", simple_array($products),$this->input->post("product_id[][$p->id")),
        form_dropdown("item_id[]['$p->id']", simple_array($items),$this->input->post("item_id[][$p->id]")),
        form_input('amount[]',0)
      );

    }
 $this->table->add_row(form_submit('submit', $this->lang->line('save') ));
echo $this->table->generate();
echo form_close(); ?>
</div>
</div>
</div>
