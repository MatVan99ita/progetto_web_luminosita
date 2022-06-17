
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
 $("#submit").click(function() {
  $("#account_successfull").show();
});

// Variable to hold request
var request;

/**
 * <form id="foo">
    <label for="bar">A bar</label>
    <input id="bar" name="bar" type="text" value="" />

    <input type="submit" value="Send" />
</form>
 */

// Bind to the submit event of our form
$("#foo").submit(function(event){

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
 */

// You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$bar = isset($_POST['bar']) ? $_POST['bar'] : null;