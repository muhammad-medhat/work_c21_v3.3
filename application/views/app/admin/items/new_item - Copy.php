
<?= form_open('admin/item/new_item_add')?>
    <table>
      <tr>
        <td>اسم الخامة</td>
        <td><?= form_input(items__name, $this->input->post('name'))?></td>
      </tr>
      <tr>
        <td>حد الطلب</td>
        <td><?= form_input(items__reorder_level, $this->input->post(items__reorder_level))?></td>
      </tr>
      <tr>
        <td>الوصف</td>
        <td><?= form_input(items__desc, $this->input->post(items__desc))?></td>
      </tr>
      <tr>
        <td>القائمة</td>
        <td><?= form_dropdown(items__item_category, $categories, $this->input->post(items__item_category))?></td>
      </tr>
      <tr>
        <td>وحدى القياش</td>
        <td><?= form_dropdown(items__item_unit, $units, $this->input->post(items__item_unit))?></td>
      </tr>
      <tr>
        <td colspan='2'>
          <?= form_submit('submit', 'اضافة', 'class=button round blue ic_add')?>
        </td>
      </tr>
    </table>
<?= form_close(); ?>

