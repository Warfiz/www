

$(document).ready(function() {

  $('html').click(function() {
      $('.modal').hide();
   })

   $('#footleft').click(function(e){
       e.stopPropagation();
   });

   $('#modal-button').click(function(e) {
       $('.modal').show();
   });


});
