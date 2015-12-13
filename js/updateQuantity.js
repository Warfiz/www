$(document).ready(function() {


  $(".quan").change(function() {

    var productID = $(this).data('id');
    var quantity  = $('#'+productID).val();

    $.get('php/updatequantity.php', {pid: productID, qua: quantity}, function(data) {

         location.reload();
     });



     return false;

  });






});
