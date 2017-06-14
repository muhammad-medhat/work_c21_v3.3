<div class="page-full-width cf">

    <?php $this->load->view('app/orders/sidebar')?>
    <div class='side-content fl'>
      <div class='content-module'>
       <div class="content-module-heading cf">
          <h3><?=$sub_title?></h3>
       </div>
          <?php $this->load->view($subview)?>
      </div>
    </div>
  </div>

