<style type="text/css" media="print">
  @media print{
    body{direction:rtl;border:double;margin-left:-1em}
    .head{
      font-weight:bold;
      border:solid ;
      background-color:#1a4567 !important;
      -webkit-print-color-adjust: exact; 
    }
    span  td{ border:double 1px;  }
.all{border:solid 1px}
    tr.values{
      border-bottom:solid;
    }
  }
</style>

<div class='all'>
  <table>
    <tr class='head'>
      <td colspan='3'>بيانات وردية <?=$shift->id?></td>
    </tr>

    <tr>
      <td><?=$shift->date?></td>  
    </tr>
    <tr> 
      <td><span>كاشير</span></td>
      <td><?=$details->user->name?></td>  
    </tr>
    <tr class='labels'>
      <td><span>الحالة      </span></td>
      <td><span>عدد الفواتير</span></td>
      <td><span>اجمالي      </span></td>
    </tr>
    
    <tr class='values'>
      <td><?=($shift->closed==1)?'مقفلة':'مفتوحة'?></td>
      <td><?= $details->num?></td>
      <td><?= $details->total?></td>
    </tr>
  </table>
  <hr />
  التوقيع
</div>

<script type="text/javascript" charset="utf-8">
 //$(document).ready(function () {
   window.print();
 //});
</script>
