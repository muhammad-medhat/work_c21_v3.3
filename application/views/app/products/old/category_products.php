


<ul>
<?php
  if($products){

    $this->table->set_template($this->table_template);

    $this->table->set_heading( 'A', 'E', '$$', '' , '', '');

        foreach ($products as $p) {
            echo "<input type='hidden' name='pid[]' value='$p->id'>";

            $this->table->add_row(
                  form_input("arabic[]", $p->arabic),
                  form_input("name[]", $p->name)    ,
                  form_input("price[]", $p->price)  ,
                  anchor( "product/assign_item_grid/$p->id", 'تعيين خامات'),
                  "<input type='hidden' name='pid[]' value='$p->id'>",
                  "<a  id='delete_$p->id' class='ic-delete table-actions-button'></a>"
            //anchor('admin/product/delete/' .$p->id, 'حذف', "id='delete_$p->id'", 'class="delete"')
           );
        }
    $this->table->add_row(
      array(
        'data'    => form_submit( 'submit', $this->lang->line('save'), "class='button blue round ic-edit'" ) ,
        'colspan' => 2
      )
    );
        echo form_open('product/update_products/' .$category->id);
            echo $this->table->generate();        
        echo form_close();
  }else{
    echo"<p class='information-box'>لا يوجد منتجات في القائمة - " .anchor('admin/product/add', 'اضافة منتج') .'</p>';
  }
?>
