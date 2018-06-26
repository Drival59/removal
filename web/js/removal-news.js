var firstCommentsToLoad = 10;

$( "#moreComments" ).click(function() {
  $('#moreComments').html('<div class="loader"></div>');
  $('#moreComments').prop('disabled', true);
  $.ajax({
            type: 'GET',
            url: urlNews + '/moreComments/fc=' + firstCommentsToLoad,
            success: function(data) {
              $('.btn-outer').before(data);
              if (data.length != 0)
              {
                $('#moreComments').prop('disabled', false);
                $('#moreComments').html('Afficher plus de commentaires');
              } else {
                $('.btn-outer').toggleClass('hidden');
              }
               },
            error: function() {
              alert('La requête n\'a pas abouti'); }
          });
  firstCommentsToLoad = firstCommentsToLoad + 10;
});
