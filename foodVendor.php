<?php
require_once 'bootstrap.php';
$url = parse_url($_SERVER['REQUEST_URI'], $component = -1);
$query = explode("&", $url["query"]);


//Base Template
$templateParams["titolo"] = "Luminosità - ";
$templateParams["categorie"] = $dbh->getFoodTypes();
//Articoli Categoria Template
$idcategoria = -1;
if($query[0]=="spec"){
    $templateParams["nome"] = "vendor_details.php";
    $templateParams["vendorID"] = explode("=", $query[1])[1];
    $templateParams["details"] = $dbh->specificVendorList($templateParams["vendorID"]);
    $templateParams["food_list"] = $dbh->specificVendorFoodList($templateParams["vendorID"]);
} elseif ($query[0]=="list") {
    $templateParams["nome"] = "vendor_list.php";
    $templateParams["lista"] = $dbh->vendorList();
}

require 'template/base.php';
?>