<div class="side-menu fr">

        <h3><?=$subtitle?></h3>
            <ul> 
            <li><a id='print'><a href='<?=site_url("order/enhanced_invoice/$order->id")?>'>طباعة للعميل</a></li>
              <li><a id='simple_form_anchor' title='فتح نافذة جديدة لعرض الفاتورة'>طباعة للعميل*</a></li>
              <li><a id='print_close1' href='<?=site_url("order/enhanced_invoice/$order->id/1")?>'>انهاء</a></li>
<li class='sep'>    </li>
              <li><?=anchor('order','الترابيزات')?></li>
              <li><?=anchor('order/get_orders/0 ','الفواتير')?></li>
<li class='sep'>    </li>

              <li><a id='show_numpad'>لوحة الارقام</a></li>


            </ul>

        </div>
