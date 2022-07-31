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
$dbh->printFormattedArray($templateParams["mail"]);
$templateParams["amount"] = 0;
$templateParams["count"] = 0;
$val = json_decode(json_decode($templateParams["mail"]["body"], true), true);
for ($i=0; $i < count($val); $i++) { 
    $templateParams["amount"] += $val[$i]["price"];
    $templateParams["count"] += $val[$i]["count"];
}
$templateParams["body"] = $val;
$dbh->printFormattedArray($templateParams["body"]);


require 'template/base.php';
?>