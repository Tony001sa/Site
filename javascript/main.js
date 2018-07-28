$(document).ready(function(){
  "use strict"
  $("input[name=email]").blur(function(){
    if($(this).val() != ''){
      var email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/;
      if(!email_pattern.test($(this).val())){
        $('#error_email_message').text('Неправильный формат');
        $('input[type=submit]').attr('disabled', true);
      }
      else {
        $('#error_email_message').empty();
        $('input[type=submit]').attr('disabled', false);
      }
    }
    else{
      $('#error_email_message').text("Введите почту");
    }
  });

  $("input[name=password]").blur(function(){
    if($(this).val().length < 2) {
      $('#error_password_message').text('Минимальная длина 2 символа');
      $('input[type=submit]').attr('disabled', true);
    }
    else {
      $('#error_password_message').empty();
      $('input[type=submit]').attr('disabled', false);
    }
  });
});
