$(document).ready(function(){
  $('.year').bind("paste",function(e) {
      e.preventDefault();
  });
});
function change_state(){
  alert('state');
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
//c21##############################################################
function mg_round(num){
//this function will round to the nearse 0.05 so the base will ne 100/20
  var base = 4;
var ret = Math.floor(num*base);
return ret/base;
}
