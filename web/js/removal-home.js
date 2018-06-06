var nbNewsToLoad = 5; // Nombre de chapitres qui s'affichent lors du clic

if ($(".hidden").length == 0 ) {
  $("#moreNews").hide();
}

$( "#moreNews" ).click(function() {
  for (var i = 0; i < nbNewsToLoad; i++) {
    $(".hidden:eq( 0 )").removeClass('hidden');
    if ($(".hidden").length == 0 ) {
      $("#moreNews").hide();
    }
  }
});
