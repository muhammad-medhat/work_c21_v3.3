<?php //ORDER DETAILS?>
 <!--   <div id='order_details'>-->
        <table id='order_details_table' class='order_details_table' cellspacing=2>
          <thead>
            <tr>
              <th>الصنف</th>
              <th>كمية</th>
              <th>السعر</th>
              <th>اجمالي</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
        <tbody id='order_details_tbody'>
            <?php if(isset($order_details) ){ ?>
        <?php if(count($order_details)!=0){?>
            <?php $i = $sum = 0; ?>
            <?php   foreach ($order_details as $od) {?>
                <?php $class=($i%2 == 0)? 'odd':'even'?>
                <tr class=' odid<?=$od->id?>' id='od_product_<?=$od->product_id?>'>
                    <?php $sub = $od->quantity * $od->price ?>
                  <td><?= $od->arabic?></td>
                  <td data-qty='<?=$od->quantity?>' class='qty'><?=$od->quantity?> </td>
                  <td class='price'><?=$od->price?></td>
                  <td class='sub'><?=$sub?></td>



                  <td><?=form_hidden('order_details_id', $od->id)?></td>
                </tr>
              <?php $i++;$sum += $sub;
          } 
        ?>
      </tbody>
      <tfoot>
          <tr class='tfoot'>
            <td colspan=3>اجمالي الطلب</td>    
            <td id='order_sum'><?=$sum?></td>
          </tr>
              <?php } else {?>
              <tr id='no_orders'>
                <td id='no_orders1' colspan=5>من فضلك اختر من اضناف القائمة</td>
              </tr>
              <?php } ?>
          <?php } else { echo "<tr><td colspan=4>no orders</td></td>"; }?>
      <tfoot>
    </table>

 <!--   </div>-->


