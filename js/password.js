
/**
 * Check sulla password di verifica
 */
$(document).ready(function() {
  $("#InputPassword2").on('keyup', function() {
  var password = $("#InputPassword1").val();
  var confirmPassword = $("#InputPassword2").val();
  if (password != confirmPassword)
  $("#CheckPasswordMatch").html("Password does not match !").css("color", "red");
  else
  $("#CheckPasswordMatch").html("Password match !").css("color", "green");
  });
  });

/**
 * Check sulla validità della password
 */
$(document).ready(function() {
  $("#InputPassword1").keyup(function() {
    var pswd = $(this).val();

    //validate the length
    if ( pswd.length < 8 ) {
      $('#length').removeClass('valid').addClass('invalid');
    } else {
      $('#length').removeClass('invalid').addClass('valid');
    }

    //validate letter
    if ( pswd.match(/[A-z]/) ) {
      $('#letter').removeClass('invalid').addClass('valid');
    } else {
      $('#letter').removeClass('valid').addClass('invalid');
    }

    //validate capital letter
    if ( pswd.match(/[A-Z]/) ) {
      $('#capital').removeClass('invalid').addClass('valid');
    } else {
      $('#capital').removeClass('valid').addClass('invalid');
    }

    //validate number
    if ( pswd.match(/\d/) ) {
      $('#number').removeClass('invalid').addClass('valid');
    } else {
      $('#number').removeClass('valid').addClass('invalid');
    }

    //validate number
    if ( pswd.match(/[.,:;_!@#$%\^&*(){}[\]<>?/|\-]/) ) {
      $('#special').removeClass('invalid').addClass('valid');
    } else {
      $('#special').removeClass('valid').addClass('invalid');
    }
  }).focus(function() {
    $('#pswd_info').show();
  }).blur(function() {
    $('#pswd_info').hide();
  });

});

/**
 * Popup per l'avvenuta creazione
 */
 $(document).ready(function() {
  $("#InputPassword1").keyup(function() {
    
  }).focus(function() {
    $('#pswd_info').show();
  }).blur(function() {
    $('#pswd_info').hide();
  });

});