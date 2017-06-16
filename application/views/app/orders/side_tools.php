<div class="side-menu11111">

        <ul> 
          <li><a class='button blue' id='print' href='<?=site_url("order/enhanced_invoice/$order->id")?>'>طباعة للعميل</a></li>
          <li><a class='button blue' id='simple_form_anchor' title='فتح نافذة جديدة لعرض الفاتورة'>طباعة للعميل*</a></li>
          <li><a class='button blue' id='print_close1' href='<?=site_url("order/enhanced_invoice/$order->id/1")?>'>انهاء</a></li>
          <li class='sep'>    </li>
          <li><?=anchor('order','الترابيزات', 'class="button blue"')?></li>
          <li><?=anchor('order/get_orders/0 ','الفواتير', 'class="button blue"')?></li>
          <li class='sep'>    </li>

          <li><a id='show_numpad'></a></li>

        </ul>

        </div>
