    
<?php //$this->load->library('pdf'); ?>
      <style type="text/css" media="all">
        #items {border-bottom:1px; border-collapse:collapse;background:#000}

        #items tr:nth-child(odd) { background-color: #cccccc; }

        #items td{margin:0.5em;border:solid 1px;background:#ccc}
        .desc{
          border:dotted 1px;
          margin-bottom: 1em;
        }
          .dark{background:#ccc}
          span{
            background-color:#000;
            color:#fff;
          }

      </style>



<?php 
      //var_dump( $this->pdf->lib_Cell(0, 20, $order_type->name, 1, 1, 'C') );
  
$html = '<table class="desc">';



?>

<span>
    <table id="items" >
        <tr class="header">
          <td width="50%">الصنف </td>
          <td width="20%">السعر </td>                    
          <td width="10%">العدد </td>
          <td width="20%">اجمالي</td>
      </tr>
    </table>
</span>
<table>
        <?php $i = 0;?>
<?php $class = ($i % 2 == 0 )? 'dark':''?>
        <?php foreach ($items_table as $item){?>
        <tr class='<?= $class ?>'>    
            <td width="50%"><?= $item['name'] ?>      </td>
            <td width="20%"><?= $item['price']?>      </td>
            <td width="10%"><?= $item['qty']  ?>      </td>
            <td width="20%"><?= $item['total_line']?> </td>
          </tr>
          <?php $i++?>
        <?php } ?>
        <tr>
          <td colspan='4'></td>
        </tr>
    </table>
<hr />

