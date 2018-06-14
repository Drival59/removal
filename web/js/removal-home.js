var firstNewsToLoad = 5;

$( "#moreNews" ).click(function() {
  $('#moreNews').html('<i class="fas fa-spinner">');
  $('#moreNews').prop('disabled', true);
  $.ajax({
            type: 'GET',
            url: 'moreNews/fn=' + firstNewsToLoad,
            success: function(data) {
              $('#moreNews').before(data);
              if (data.length != 0)
              {
                $('#moreNews').prop('disabled', false);
                $('#moreNews').html('Afficher plus d\'actualités');
              } else {
                $('#moreNews').toggleClass('hidden');
              }
               },
            error: function() {
              alert('La requête n\'a pas abouti'); }
          });
  firstNewsToLoad = firstNewsToLoad + 5;
});
