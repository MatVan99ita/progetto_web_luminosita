<?php

/* Qua c'è l'edit del prodotto sia per quanto riguarda i dati o quanto riguarda il refill

in più lo userò anche per creare nuovi prodotti
*/
require_once 'bootstrap.php';
$url = parse_url($_SERVER['REQUEST_URI'], $component = -1);
$query = explode("&", $url["query"]);
$dbh->printFormattedArray($query);
$type = explode('=', $query[0])[1];
$id = explode('=', $query[1])[1];

$templateParams["foodID"] = $id;
$templateParams["editType"] = $type;
$templateParams["food"] = $id < 0 ? 0 : $dbh->getFoodByID($id);
$templateParams["nome"] = "productEdit_Template.php";

$dbh->printFormattedArray($templateParams["food"]);

require 'template/base.php';

?>