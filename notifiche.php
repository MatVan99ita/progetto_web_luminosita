<?php 
/**
 * Zona stile outlook per controllare notifiche ricevute e inviate(?)
*/
require_once 'bootstrap.php';

$url = explode('?', $_SERVER['REQUEST_URI'])[1];
$url = explode('&', $url);
$id = explode('=', $url[0]);
$read = explode('=', $url[1]);
print_r($url);
$templateParams["nome"] = "notifications_templ.php";
$templateParams["mail"] = $dbh->getSpecificNotification($id[1], $read[1]);

require 'template/base.php';
?>