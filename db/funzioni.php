<?php 
function loggato() {
        // verifico se l'utente è loggato
        if (isset($_SESSION['login']) && $_SESSION['login']) {
            // utente loggato correttamente

        } else {
            // utente non loggato
            header("location: index.php");
            die();
        }
}

function data_db2usr($datadb) {
    // Data una data YYYY-MM-DD come stringa la trasforma in DD/MM/YYYY
    $a=array();
    $a=explode("-",$datadb);
    return ($a[2] . "/" . $a[1] . "/" . $a[0]); // restituisco la data nel formato "gg/mm/aaaa"
}

function data_usr2db($datausr) {
    // Data una data YYYY-MM-DD come stringa la trasforma in DD/MM/YYYY
    $a=array();
    $a=explode("/",$datausr);
    return ($a[0] . "-" . $a[1] . "-" . $a[2]); // restituisco la data nel formato "aaaa-mm-gg"
}