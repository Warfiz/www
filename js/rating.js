$(document).ready(function () {

  $('#rating').click(function (e) {

    var productID = $(this).data('id');

    $.ajax({
       type: "POST",
       url: "../php/ajaxrateproduct.php",
       data : { pid : productID},
       dataType: "json",
       success: function(data){

        console.log(data);
        var count = data.ratingCount;
        if(count){
          $('#rating').html('+'+count);
        } else {
          $('#rating').html('+');
        }


       },
       error: function (error) {
        alert("error: "+error);
        console.log(error);
      }
    });
  });

});
