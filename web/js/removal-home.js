var nbNewsToLoad = 5; // Nombre de chapitres qui s'affichent lors du clic

if ($(".hidden").length == 0 ) {
  $("#moreNews").hide();
}

$( "#moreNews" ).click(function() {
  $('#moreNews').html('<i class="fas fa-spinner">');
  $('#moreNews').prop('disabled', true);
  setTimeout(function() {
    $('.fa-spinner').toggleClass('rotate');
  }, 100);

  setTimeout(function() {
    for (var i = 0; i < nbNewsToLoad; i++) {
      $(".hidden:eq( 0 )").removeClass('hidden');
      if ($(".hidden").length == 0 ) {
        $("#moreNews").hide();
      }
    }
    $('#moreNews').text('Afficher plus d\'actualités');
    $('#moreNews').prop('disabled', false);
  }, 500);

});
