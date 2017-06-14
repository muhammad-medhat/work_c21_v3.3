<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Club21 Cafe and Restaurant</title>

    <!-- Stylesheets -->
    <?php $this->load->view('template/admin/header') ?>

    <!---->

    <!-- Optimize for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body>
<!-- TOP BAR -->
    <?php $this->load->view('template/admin/top_bar')?>
<!-- end top-bar -->
<!-- HEADER -->
    <?php $this->load->view('template/admin/header-tabs')?>
<!-- MAIN CONTENT -->
    <div id="content">

              <div class="page-full-width cf">
              
                          <?php $this->load->view($sidebar)?>
                          <div class='side-content fl'>
                                      <div class='content-module'>
                                       
                                        <div class="content-module-heading cf">
                                          <h3><?=$subtitle?></h3>
                                        </div>
                                  <?php if(validation_errors()) {?>
                                     <fieldset class='error-message'><?= validation_errors(); ?> </fieldset>
                                   <?php } ?>
                                   <?php if($this->session->flashdata('message')) {?>
                                     <fieldset class='information-box'><?=$this->session->flashdata('message')  ?></fieldset>
                                   <?php } ?>
                                        <?php $this->load->view($main_content)?>
                                      </div>
                          </div>
             </div>
    </div>
    <div id='footer'>
      <?php $this->load->view('template/admin/footer')?>
    </div>
  </body>
</html>

