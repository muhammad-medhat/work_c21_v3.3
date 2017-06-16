  	<meta http-equiv="content-Type" content="text/html; charset=utf-8" /> 
  	<link rel="stylesheet" href="<?= base_url();?>css/orders/style.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="<?= base_url();?>css/orders/system.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?= base_url();?>css/orders/print.css" type="text/css" media="print" />


    <!-- <link rel='stylesheet' href="<?= base_url()  ?>js/jquery-ui-1.12.1.custom/jquery-ui.min.css" type="text/css" /> -->

    <link rel="icon" href="<?=base_url()?>images/logo.png" title="Club21 Cafe and Restaurant" type="icon" />
  
<!--[if gt IE 4]>
 <link rel="stylesheet" href="<?php echo base_url();?>css/ie-style.css" type="text/css" media="screen" />
 <![endif]-->    
    <script src="<?= base_url()  ?>js/jquery.min.js" type="text/javascript" charset="utf-8"></script>  
<!--    <script src="<?= base_url()  ?>js/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>  -->
  <script src="<?= base_url()  ?>assets/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script> 
  <link rel="stylesheet" href="<?= base_url();?>assets/jquery-ui-1.12.1.custom/jquery-ui.min.css" type="text/css"  />

    <script src="<?= base_url()  ?>js/scripts.js" type="text/javascript" charset="utf-8"></script>  
    <script src="<?= base_url()  ?>js/sottable.js" type="text/javascript" charset="utf-8"></script>  


<?php $this->load->view('template/admin/common_js')?>
<script type="text/javascript" charset="utf-8">
    var timer = 0;
    function set_interval() {
      // the interval 'timer' is set as soon as the page loads
      timer = setInterval("auto_logout()", 1000 * <?=$this->config->item('sess_expiration')?>);
      // the figure '10000' above indicates how many milliseconds the timer be set to.
      // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
      // So set it to 300000
    }
    
    function reset_interval() {
      //resets the timer. The timer is reset on each of the below events:
      // 1. mousemove   2. mouseclick   3. key press 4. scroliing
      //first step: clear the existing timer
    
      if (timer != 0) {
        clearInterval(timer);
        timer = 0;
        // second step: implement the timer again
        timer = setInterval("auto_logout()", 1000* <?=$this->config->item('sess_expiration')?>);
        // completed the reset of the timer
      }
    }
    
    function auto_logout() {
      // this function will redirect the user to the logout script
      if(!get_session())
 //       alert('auto logout');
        window.location = "<?= site_url('login/logout')?>";
    }

    function get_session(){
      var shift_id = '<?=$this->session->userdata('shift_id') ?>';
      return shift_id;
      //alert('shift is ' + shift_id);
    }

</script>
