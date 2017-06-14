function change_status(_type, _id, _status){
  $.ajax({
    url: '<?php echo site_url("blogs/publish/")?>' + _type + '/' + _id + '/' + _status,
    complete: function (jqXHR, textStatus) {
      // callback
    },
    success: function (data, textStatus, jqXHR) {
      alert('asdf');
    },
    error: function (jqXHR, textStatus, errorThrown) {
      alert('error callback');
    }
  });
}
