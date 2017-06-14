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


<?php //var_dump($products);?>
<?php echo form_open('admin/product/assigning', 'class="middle"')?>
    <table>
      <thead>
        <td>المنتج</td>
        <td>الخامة</td>
        <td>الكمية</td>
      </thead>
      <tbody>
        <?php foreach($products as $p=>$v) { ?>
          <tr>
            <?= form_hidden('pid[]', $p->id )?>
            <td><?=form_dropdown('pid', simple_array($products),$this->input->post('pid'))?></td>
            <td><?=form_dropdown('item_id', simple_array($items),$this->input->post('item_id'))?></td>
            <td><?=form_input('amount', $this->input->post('amount')) ?></td>
          </tr>
        <?php } ?>
        <tr>
        <td colspan='2'>
          <?php echo form_submit('submit', 'اضافة')?>
        </td>
      </tr>
</tbody>
    </table>
<?php echo form_close(); ?>

