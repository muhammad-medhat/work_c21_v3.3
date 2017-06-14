<style type="text/css" media="all">
  .panel-body table{width:100%}
</style>
<h1>لوحة التحكم للمدير المسئول </h1>
<div class='row'>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
  <div class="panel-heading"><strong>خامات وصلت لحد الطلب</strong></div>
  <div class="panel-body">
    <?php $this->load->view('app/admin/dashboard/reorder_level')?>
    <?=anchor('admin/settings/reorder_items_more', 'more')?>
  </div>
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <strong>الخامات تم استخدامها اليوم</strong></div>
    <div class="panel-body">
      <?php $this->load->view('app/admin/dashboard/stock_items')?>
      <?=anchor('admin/settings/stock_items_more', 'more')?>
    </div>
</div>
</div>



<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
  <div class="panel-heading">
    <strong>المبيعات</strong></div>
    <div class="panel-body">
      <?php //$this->load->view('app/admin/dashboard/sales_invoices')?>
      <?=anchor('admin/settings/reorder_items_more', 'more')?>
    </div>
</div>
</div>


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
  <div class="panel-heading"><strong>Sales Outstandings</strong></div>
  <div class="panel-body">
  </div>
</div>
</div>
</div>
