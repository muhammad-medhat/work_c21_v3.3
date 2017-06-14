  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  	<link rel="stylesheet" href="<?php echo base_url();?>css/system.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
 
<!--[if gt IE 4]>
 <link rel="stylesheet" href="<?php echo base_url();?>css/ie-style.css" type="text/css" media="screen" />
 <![endif]-->    
    <script src="<?php echo base_url()  ?>js/jquery.min.js" type="text/javascript" charset="utf-8"></script>  
    <?php //<script src="<?php echo base_url()  js/jquery-ui/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>  ?>
<?php //<script src="https://code.jquery.com/jquery-1.12.4.js"></script> ?>
    <script src="<?php echo base_url()  ?>js/scripts.js" type="text/javascript" charset="utf-8"></script>  
    <script src="<?php echo base_url()  ?>js/sottable.js" type="text/javascript" charset="utf-8"></script>  


<?php $this->load->view('template/admin/common_js')?>

<?php //grocery crud js and css?>

<?php if(isset($css_files) || isset($js_files)) {?>
<?php foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php 
  endforeach;
} 
?>
