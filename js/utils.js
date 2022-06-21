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