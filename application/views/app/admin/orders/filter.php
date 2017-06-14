<?php

?>
<?=form_open('admin/order/filter')?>
<div class='clear-fix'>
  <div id='shifts'><?=form_dropdown('shifts', $shifts, '')?></div>
  
</div>

<?=form_close()?>
