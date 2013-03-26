$(document).ready( function(){
  $('.search input[type="submit"]').hide();
  $('#searchinput').keyup(function(key)
  {
    if(key.keyCode == 13) {
      $('#loader').show();
      $('#articles').load(
        $(this).parents('form').attr('action'),
        { query: this.value + '*' },
        function() { $('#loader').hide(); }
      );
    }
  });
});
