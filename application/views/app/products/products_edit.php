<?php     $offset = (int)$this->uri->segment(3); ?>
      <?php
$this->table->set_template($this->table_template);
        $this->table->set_heading(
          'القائمة',
          'الاسم انجليزي',
          'الاسم عربي',
          'السعر', 
          '', ''
        );       
      
      foreach ($products as $p) {
           //echo "<input type='hidden' name='pid[]' value='$p->id'>";
             $this->table->add_row(
                array('data'=>$this->product_model->get_category($p->cat_id)->arabic, 'style'=>'width:20%') ,
                array('data'=>form_input("pname[]", $p->name), 'style'=>'width:20%') ,
                array('data'=>form_input("parabic[]", $p->arabic),'style'=>'width:20%'),
                array('data'=>form_input("price[]", $p->price),'style'=>'width:20%'),
                anchor("product/show_product/$p->id", '...'),
                array('data'=>form_hidden('pid[]', $p->id),'style'=>'width:20%')
            );
      }
      $this->table->add_row( array('colspan'=>4, 'data'=>'&nbsp'));
      $this->table->add_row( array('colspan'=>4, 'data'=>$pagination ) );
      $this->table->add_row( array('colspan'=>4, 'data'=>'&nbsp'));
      $this->table->add_row(
        array(
          'colspan'=>4, 
          'data'=>form_submit('submit', $this->lang->line('save'), "class='button round blue image-right ic-edit text-upper'")
        )
      );
  echo form_open('product/editing_products/' .$offset);
    echo $this->table->generate();
  echo form_close();
?>
