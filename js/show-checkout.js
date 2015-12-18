

$(document).ready(function() {

  $("#show-checkout-button").on('click', function () {
    $(".basket-summary").toggle();
    $(".checkout").toggle();
    $(".checkout-form").css('visibility', 'visible');
  });


  $('#accept-condition').change(function () {
    if(this.checked){
      $('#confirm').prop('disabled', false);
    }
    if(!this.checked){
      $('#confirm').prop('disabled', true);
    }
  });

  $('#cancel').on('click', function () {
    location.reload();
  });


  $('#use-info').change(function () {

    if(this.checked){

      $.ajax({
         type: "POST",
         url: "../inc/ajaxGetUserInfo.php",
         dataType: "json",
         success: function(data){

            $.each(data, function (key, value) {
              if (value) {
                var selector = $('#'+key);
                disableInput(selector, value);
              }
            });

         },
         error: function (error) {
          alert("error: "+error);
          console.log(error);
        }
      });

    }

    if(!this.checked){
      $('.stored-info').find('input').each(function (index) {
          console.log($(this).val(""));
          enableInput($(this));
      })

    }

  });

  function disableInput(selector, data) {
    console.log(selector + " : " + data);
    selector.val(data);
    selector.prop('readonly', true);
    selector.css('color', '#AAA');
  }

  function enableInput(selector) {
    selector.val("");
    selector.css('color', '#444');
    selector.prop('readonly', false);
  }


});
