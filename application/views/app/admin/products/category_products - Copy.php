<?php if(validation_errors()) {?>
  <fieldset class='errors'>
  <?php echo validation_errors(); ?>
  </fieldset>
<?php } ?>
<?php 
  $id = categories__id;
  $name = categories__name;
?>


<ul>
<?php
  $i = 1;
  if(count($products)>0){
echo form_open('admin/product/update_products/' .$category->$id);
echo "<table>";
echo "<thead>  ";
echo "  <td>A</td>";
echo "  <td>E</td>";
echo "  <td>$$</td>";
echo "  <td></td>";
echo "</thead>  ";
echo "</tbody>  ";
foreach ($products as $p) {
  $class=($i%2 == 0)?'even':'odd';
  echo "<tr class='$class'>";
  echo "  <td><input type='hidden' name='pid[]' value='$p->id'></td>";
  echo "  <td>" .form_input("arabic[]", $p->arabic) ."</td>";
  echo "  <td>" .form_input("name[]", $p->name) ."</td>";
  echo "  <td>" .form_input("price[]", $p->price) ."</td>";
  echo "  <td>" .anchor( "admin/product/assign_item_grid/$p->id", 'تعيين خامات') ."</td>";
  echo "</tr>";
  echo "<tr><td colspan=4>" .form_textarea('desc[]', $p->desc, 'class="full-width-textarea"') ."</td></tr>";
  $i++;
}
echo '<tr><td colspan=2>' .form_submit('submit', $this->lang->line('save') ) .'</td></tr>';
echo "</tbody>  ";
echo "</table>";
echo form_close();
  }else{
    echo"<p class='notification'>لا يوجد منتجات في القائمة</p>";
    echo '<p>' .anchor('admin/product/add', 'اضافة منتج') .'</p>';
  }
?>
