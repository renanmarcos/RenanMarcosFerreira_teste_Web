$(function () {

    $('form').on('submit', function (e) {

      e.preventDefault();

      $.ajax({
        type: 'POST',
        url: '../functions/login.php',
        data: $('form').serialize(),
        success: function (data) {
            if (data == 1) {
                location.reload();  
                //$('#login-card').fadeOut('fast');
                //$('#logged-card').fadeIn('fast');
            } else {
                alert("erro");
            }
        }
      });

    });

  });