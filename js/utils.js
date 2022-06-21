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

function deleteAllCookies() {
  var cookies = document.cookie.split(";");
  for (var i = 0; i < cookies.length; i++) {
      var cookie = cookies[i];
      var eqPos = cookie.indexOf("=");
      var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
      document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
  }
 }