<ul id='main_menu'>
    <li ><?= anchor('admin/inventory', 'المخازن');?></li>
    
    <li class='ul'> <?= anchor('admin/product', "المنتجات")?>

      <ul>
        <li ><?= anchor('admin/product/add', 'اضافة منتج للقائمة');?></li>
        <li ><?= anchor('admin/product/assign_item', 'تعيين الكميات للمنتجات');?></li>
      </ul>

    </li>
    <li class='ul'>
        <?= anchor('admin/item', 'الخامات');?>
          <ul>
            <li> <?= anchor('admin/item/all', ' رصيد الخامات')?>  </li>
            <li> <?= anchor('admin/item/new_item', 'اضافة خامة غير موجودة')?>  </li>
            <li> <?= anchor('admin/item/increment', 'زيادة رصيد الخامات')?>  </li>
          </ul>
    </li>
    <li class='ul'>
        <?= anchor('admin/transaction', 'عمليات المخزن');?>
        <ul>
          <li><?= anchor('admin/transaction/increment', 'اضافة عملية') ?></li>
        </ul>

    </li>
    <li ><?= anchor('admin/user/add', 'اضافة مستخدم');?></li>
    <li ><?= anchor('login/logout', 'تسجيل خروج');?></li>
</ul>


<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('.ul').hover(function(){
      //alert('asdf');
     // $(this).closest('ul').show();
    });
  });
</script>
