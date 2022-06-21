
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

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};



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
$(function() {
  $("#account_successfull").hide();
  var success = getUrlParameter('success');
  console.log(success);
  if(success){
    $("#account_successfull").show();
  }
});


/*function copyPass() {
  /* Get the text field *
  var copyText = document.getElementById("#InputPassword1");

  /* Select the text field *
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field *
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text *
  alert("Copied the text: " + copyText.value);
}//*/

$(document).ready(function() {
  var ctrlDown = false,
      ctrlKey = 17,
      cmdKey = 91,
      vKey = 86,
      cKey = 67;

  $(document).keydown(function(e) {
      if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
  }).keyup(function(e) {
      if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = false;
  });

  if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) {
    var input = document.getElementById('InputPassword1');
    var password = input.value;
    navigator.clipboard.writeText(password);
  };
  
  // Document Ctrl + C/V 
  $(document).keydown(function(e) {
      if (ctrlDown && (e.keyCode == cKey)) console.log("Document catch Ctrl+C");
      if (ctrlDown && (e.keyCode == vKey)) console.log("Document catch Ctrl+V");
  });
});

$(document).ready(function() {
  $("#show_hide_old_password a").on('click', function(event) {
      event.preventDefault();
      if($('#show_hide_old_password input').attr("type") == "text"){
          $('#show_hide_old_password input').attr('type', 'password');
          $('#show_hide_old_password i').addClass( "fa-eye-slash" );
          $('#show_hide_old_password i').removeClass( "fa-eye" );
      }else if($('#show_hide_old_password input').attr("type") == "password"){
          $('#show_hide_old_password input').attr('type', 'text');
          $('#show_hide_old_password i').removeClass( "fa-eye-slash" );
          $('#show_hide_old_password i').addClass( "fa-eye" );
      }
  });
});

$(document).ready(function(){
  $("#show_hide_new_password a").on('click', function(event) {
    event.preventDefault();
    if($('#show_hide_new_password input').attr("type") == "text"){
        $('#show_hide_new_password input').attr('type', 'password');
        $('#show_hide_new_password i').addClass( "fa-eye-slash" );
        $('#show_hide_new_password i').removeClass( "fa-eye" );
    }else if($('#show_hide_new_password input').attr("type") == "password"){
        $('#show_hide_new_password input').attr('type', 'text');
        $('#show_hide_new_password i').removeClass( "fa-eye-slash" );
        $('#show_hide_new_password i').addClass( "fa-eye" );
    }
});
});
/*

// Variable to hold request
var request;

/**
 * <form id="foo">
    <label for="bar">A bar</label>
    <input id="bar" name="bar" type="text" value="" />

    <input type="submit" value="Send" />
</form>
 *

// Bind to the submit event of our form
$("#register_form").submit(function(event){

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "/form.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});

/**
 * // You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$bar = isset($_POST['bar']) ? $_POST['bar'] : null;
 *

$.post('db/database.php', serializedData, function(response) {
  // Log the response to the console
  console.log("Response: "+response);
});//*/