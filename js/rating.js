$(document).ready(function () {

  $('#rating').click(function () {

    var productID = $(this).data('id');

    $.ajax({
       type: "POST",
       url: "../php/ajaxrateproduct.php",
       data : { pid : productID},
       dataType: "json",
       success: function(data){

        var count = data.ratingCount;
        $('#rating').html('+'+count);

       },
       error: function (error) {
        alert("error: "+error);
        console.log(error);
      }
    });
  });
});
