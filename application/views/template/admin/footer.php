<?php
echo "<div id='footer'>Codigniter version is " .CI_VERSION ."</div>";

?>
<script>
$(document).ajaxSuccess(function(xhr) {
// not working
  //alert('success');
  $( ".log" ).text( xhr.responseText  );
});
</script>
