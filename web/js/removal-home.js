var firstNewsToLoad = 5;

$( "#moreNews" ).click(function() {
  $('#moreNews').html('<i class="fas fa-spinner">');
  $('#moreNews').prop('disabled', true);
  LastNewsToLoad = firstNewsToLoad + 5;
  $.ajax({
            type: 'GET',
            url: 'moreNews/fn=' + firstNewsToLoad + '&ln=' + LastNewsToLoad,
            success: function(data) {
              alert(data); },
            error: function() {
              alert('La requête n\'a pas abouti'); }
          });
  firstNewsToLoad = LastNewsToLoad;
  $('#moreNews').prop('disabled', false);
});
