$(document).ready(function () {

  $('#submitComment').click(function (e) {

    //reset error messages
    $('#error-message').html("");
    $('#deleteComment').hide();

    var productID = $(this).data('id');
    var comment = $('#comment').val();

    if (!comment){
      $('#error-message').html("Enter a comment");
    } else {
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
             $('#error-message').html("You already left a comment, see above");
             $('#comment').val(data.comment);
             $('#comment').css("background-color", "#E8E7E7");
             $('#deleteComment').show();
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
    }


  });


  $('#deleteComment').click(function (e) {

    var productID = $(this).data('id');


    $.ajax({
       type: "POST",
       url: "../php/ajaxdeletecomment.php",
       data : { pid : productID},
       dataType: "json",
       success: function(data){

        location.reload();

       },
       error: function (error) {
        alert("error: "+error);
        console.log(error);
      }
    });

  });

});//End of rdy
