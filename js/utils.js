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