if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

/*
window.addEventListener('mousewheel', function(e){
    e.preventDefault();
    var step = -100;  
    if (e.wheelDelta < 0) {
      step *= -1;
    }
    var newPos = window.pageXOffset + step;
    $('body').scrollLeft(newPos);    
})*/

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
  const scroll = document.getElementById('scrolling');

  scroll.addEventListener('wheel', (evt) => {
    evt.preventDefault();
    scroll.scrollLeft += evt.deltaY;
  });
});

$(document).ready(function() {
  $("#paymentText").prop("disabled", true);
  $("#zoneText").prop("disabled", true);
  var dt = new Date();
  dt.setHours( dt.getHours() + 1 );
  const dateTimeLocalValue = (new Date(dt.getTime() - dt.getTimezoneOffset() * 60000).toISOString()).slice(0, 16);
  $("#timeText").val(dateTimeLocalValue);
  const scroll = document.getElementById('inputDescr');

  scroll.addEventListener('wheel', (evt) => {
    evt.preventDefault();
    scroll.scrollTop += evt.deltaY;
  });
});


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


$(".image-checkbox").each(function () {
  if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
      $(this).addClass('image-checkbox-checked');
  } else {
      $(this).removeClass('image-checkbox-checked');
  }
});

// sync the state to the input
$(".image-checkbox").on("click", function (e) {
  $(this).toggleClass('image-checkbox-checked');
  var $checkbox = $(this).find('input[type="checkbox"]');
  $checkbox.prop("checked", !$checkbox.prop("checked"))

  e.preventDefault();
});
//# sourceURL=pen.js


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