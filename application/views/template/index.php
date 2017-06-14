<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Club21 Cafe and Restaurant</title>

    <!-- Stylesheets -->
    <?php $this->load->view('template/header') ?>

    <!---->

    <!-- Optimize for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>

<body onload="set_interval()"  >
<!-- TOP BAR -->
    <?php //$this->load->view('template/top_bar')?>
<!-- end top-bar -->
<!-- HEADER -->
    <?php $this->load->view('template/header1')?>
    <?php //$this->load->view('template/digital_clock/index')?>
        <div class="page-full-width cf">
          <div id='content'>
            <?php (!is_null($sidebar))? $this->load->view($sidebar):''?>
            <div class='side-content <?=(!is_null($sidebar))? 'fl' : ''?>'>
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
                          <?php if($this->session->flashdata('debug')) {?>
                            <fieldset class='warning-box'>=============  <?=$this->session->flashdata('debug')  ?></fieldset>
                          <?php } ?>
                          <?php if($this->session->flashdata('warning')) {?>
                            <fieldset class='warning-box'><?=$this->session->flashdata('warning')  ?></fieldset>
                          <?php } ?>

                <?php $this->load->view($main_content)?>
              </div>
           </div>
        </div>

    <div id='footer'>
      <?php $this->load->view('template/footer')?>
    </div>
  </body>
</html>
<?php
//echo"<script>
//alert('"  .$_SESSIOM['timestamp'] ."' over!);
//</script>";
// if(time() - $_SESSION['timestamp'] > 500) { //subtract new timestamp from the old one
//    
//    unset($_SESSION['username'], $_SESSION['password'], $_SESSION['timestamp']);
//    $_SESSION['logged_in'] = false;
//    header("Location: " . site_url('login') ); //redirect to index.php
//    exit;
//} else {
//    $_SESSION['timestamp'] = time(); //set new timestamp
//}
?>
 <script type="text/javascript" charset="utf-8">
function myclock(){
      var disp_date = '<?= date(time_format)?>';
     	$("#clock").html(disp_date);

  }

    function updateClock ( )
  	{
    	var currentTime = new Date ( );
     	///var currentHours   = (currentTime.getHours   ( )<10)? '0'   .currentTime.getHours().toString() :currentTime.getHours();
     	///var currentMinutes = (currentTime.getMinutes ( )<10)? '0' .currentTime.getMinutes().toString() :currentTime.getMinutes();
     	///var currentSeconds = (currentTime.getSeconds ( )<10)? '0' .currentTime.getSeconds().toString() :currentTime.getSeconds();
     	/////var timeOfDay = currentTime.gettimeOfDay ( ); <10)?

     	///// Pad the minutes and seconds with leading zeros, if required
     	///currentMinutes = ( currentMinutes == 12 ) ? currentHours - 12 : currentHours;

     	///// Convert an hours component of "0" to "12"
     	///currentHours = ( currentHours == 0 ) ? 12 : currentHours;

     	///// Compose the string for display
      /////var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
      ///var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
     	///
     	var currentTimeString = currentTime.toTimeString();
     	$("#clock").html(currentTimeString);
     //	$("#clock").html(currentTimeString);
    	  	
    }

    $ (document).ready(function()
    { 
       setInterval('updateClock()', 1000);
       //setInterval('myclock()', 1000);
    });
  </script>


</script>
