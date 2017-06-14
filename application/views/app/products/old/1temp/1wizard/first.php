<h2>المنتج</h2>
      <?= form_dropdown( 'products', simple_array($products, 'arabic') )?>
<div id='assigned_items'>
  <table></table>
</div>
      <table id='ingrediants'>
        <tr>
          <td colspan='2'>
          <?=form_submit('submit', 'ADD', 'class="button fl"')?>
          </td>
        </tr>
      </table>
       
  
