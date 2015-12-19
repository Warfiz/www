$(document).ready(function () {

  $('#submitComment').click(function (e) {

    var productID = $(this).data('id');
    var comment = $('#comment').val();

    $.ajax({
       type: "POST",
       url: "../php/ajaxwritecomment.php",
       data : { pid : productID, com : comment},
       dataType: "json",
       success: function(data){

         console.log(data);

         var commentError = data.commentError;

         var comment = "<div class=\"comment\"><h3>"+data.user+"</h3><p>"+data.comment+"</p></div>";

         if (commentError){
           $('#error-message').html("You already left a comment");
         } else {
           $('.comments').prepend(comment);
           $('#comment').val("");
         }



       },
       error: function (error) {
        alert("error: "+error);
        console.log(error);
      }
    });
  });

});
