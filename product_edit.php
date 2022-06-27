<?php

/* Qua c'è l'edit del prodotto sia per quanto riguarda i dati o quanto riguarda il refill

in più lo userò anche per creare nuovi prodotti
*/

require_once 'bootstrap.php';

$url = explode('?', $_SERVER['REQUEST_URI'])[1];
$url = explode('&', $url);
$type = $url[0];
$id = explode('=', $url[1])[1];

$templateParams["foodID"] = $url[1];
$templateParams["editType"] = $url[0];
$templateParams["category"] = $dbh->getFoodTypes();
$templateParams["food"] = $id < 0 ? 0 : $dbh->getFoodByID($id);
$templateParams["nome"] = "productEdit_Template.php";


require 'template/base.php';

?>