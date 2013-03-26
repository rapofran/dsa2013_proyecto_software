
$(document).ready(
  function() {
    $('.sf_admin_form_field_url_picture img').wrap('<a href=\"#\" onclick=\"openfilebrowser();\"></a>');
    if ($('.sf_admin_form_field_url_picture img').attr('src') == '/uploads/members/') {
      $('.sf_admin_form_field_url_picture img').attr('src', '/images/' + 'cameraadd.png');
    }
    $('#member_url_picture').bind('change', function(){ actualizarimagen(); });
});

function openfilebrowser(){
  $('#member_url_picture').click();
}

function actualizarimagen(){
  if ($('#member_url_picture').val() != "") {
    $('.sf_admin_form_field_url_picture img').attr('src', '/images/' + 'cameraok.png');
  }
}
