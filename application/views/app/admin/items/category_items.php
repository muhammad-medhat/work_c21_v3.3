
          <?php 
            $id = categories__id;
            $name = categories__name;
          ?>
          <?php
            //var_dump($products);
          $i = 0;
          echo form_open('admin/item/update_items/' .$category->$id);
          $this->table->set_template($this->table_template);
          
          $this->table->set_heading(
            
            $this->lang->line('name'), 
          
            $this->lang->line('reorder_level') 
          
          );
          
          $qty = items__current_qty;
          $new_qty = items__new_qty;
          $id = items__id;
          $name = items__name;
          $reorder_level = items__reorder_level;

          foreach ($items as $i ){
            echo form_hidden('pid[]', $i->$id);
            $this->table->add_row(
              form_input('name[]', $i->$name),
              form_input('reorder[]', $i->$reorder_level)
            //  anchor('item/delete', 'حذف')
            );
          }
           $this->table->add_row(form_submit('submit', $this->lang->line('save'), "class='round button blue ic-edit'" ));
          echo $this->table->generate();
          
          echo form_close();
          ?>
      </div>
    </div>
</div>
