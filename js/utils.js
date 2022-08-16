if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

const deleteAllCookies = () => {
  console.log(document.cookie);
  const cookies = document.cookie.split(";");

  for (const cookie of cookies) {
    const eqPos = cookie.indexOf("=");
    const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
  }
}

$(document).ready(function() {
  $("#paymentText").prop("disabled", true);
  $("#zoneText").prop("disabled", true);
  var dt = new Date();
  dt.setHours( dt.getHours() + 1 );
  const dateTimeLocalValue = (new Date(dt.getTime() - dt.getTimezoneOffset() * 60000).toISOString()).slice(0, 16);
  $("#timeText").val(dateTimeLocalValue);
  const scroll = document.getElementById('inputDescr');


  $("#readed").mouseenter(function() {//light > dark
    console.log("entera");
    $("#readed").removeClass( "list-group-item-light" ).addClass( "list-group-item-dark" );
  }).mouseleave(function() {
    console.log("esce");
    $("#readed").removeClass( "list-group-item-dark" ).addClass( "list-group-item-light" );
  });

  $(function () {
    $(".toRead").hover(
      function () {
        $(this).removeClass( "list-group-item-primary" ).addClass( "list-group-item-info" );
      }, 
      function(){
        $(this).removeClass( "list-group-item-info" ).addClass( "list-group-item-primary" );
      }
    );
  });

  $(function () {
    $(".readed").hover(
      function () {
        console.log("3");
        $(this).removeClass( "list-group-item-light" ).addClass( "list-group-item-dark" );
      }, 
      function(){
        $(this).removeClass( "list-group-item-dark" ).addClass( "list-group-item-light" );
      }
    );
  });

  //da studiare
  function showResult(str) {
    if (str.length==0) {
      document.getElementById("livesearch").innerHTML="";
      document.getElementById("livesearch").style.border="0px";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","livesearch.php?q="+str,true);
    xmlhttp.send();
  }

  //########## USATO NEL TAMPLATE DI AGGIORNAMENTO DEI PRODOTTI ########## e va
  $(".active-gluten-check").each(function () {
    var check = $(this).find('input[type="checkbox"]');
    var imageCheck = $(this);
    if (check.attr("checked")) {
      imageCheck.removeClass('no-gluten');
      imageCheck.addClass('image-checkbox-checked');
    } else {
      imageCheck.addClass('no-gluten');
      imageCheck.removeClass('image-checkbox-checked');
    }
  });

  // sync the state to the input
  $(".active-gluten-check").on("click", function (e) {
    $(this).toggleClass('image-checkbox-checked');
    var $this = $(this);
    var $checkbox = $(this).find('input[type="checkbox"]');

    $checkbox.prop("checked", !$checkbox.is(":checked"));
    if($checkbox.is(":checked")){
      $this.removeClass("no-gluten");
    } else {
      $this.addClass("no-gluten");
    }
    e.preventDefault();
  });

  if($(".active-gluten-check").is("checked")){
    $(this).removeClass('no-gluten');
  } else {
    $(this).addClass('no-gluten');
  }

  //######################################################################

  $(".gluten-search").each(function () {
    $(this).find('input[type="checkbox"]').first().attr("checked", false);
    //$(".gluten-filter").prop("hidden", false);
  });

  $(".gluten-search").on("click", function(){
    var $checkbox = $(this).find('input[type="checkbox"]');
    if($checkbox.prop("checked")){
      $(".gluten-filter").addClass("not-equal-to-search");
    } else {
      $(".gluten-filter").removeClass("not-equal-to-search");
    }
    //$(".gluten-filter").prop("hidden", $checkbox.prop("checked"));
  });


  //######################################################################*/

  function enablePay(){
    $("#paymentText").prop("disabled", false);
    $("#paymentBtn").prop("disabled", true);
    $("#hiddenPay").prop("disabled", true);
    $("#paymentBtn").removeClass( "btn-primary" ).addClass( "btn-secondary" )
  }

  function enableZone(){
    $("#zoneText").prop("disabled", false);
    $("#zoneBtn").prop("disabled", true);
    $("#hiddenZone").prop("disabled", true);
    $("#zoneBtn").removeClass( "btn-primary" ).addClass( "btn-secondary" )
  }

  $(".dropdown").mouseenter(function() {
    $(this).toggleClass("show");
    $(this).attr("aria-expanded","true");
    $(this).children(".dropdown-menu").addClass("show");
  }).mouseleave(function() {
    $(this).toggleClass("show");
    $(this).attr("aria-expanded","false");
    $(this).children(".dropdown-menu").removeClass("show");
  });

});