<?php
require_once 'bootstrap.php';



//Base Template
$templateParams["categorie"] = $dbh->getFoodTypes();
$templateParams["nome"] = "vendor_details.php";
//Articoli Categoria Template
$idcategoria = -1;
if(isset($_GET)){
    $url = parse_url($_SERVER['REQUEST_URI'], $component = -1);
    $query = explode("&", $url["query"]);
    if($query[0]=="spec"){
        $templateParams["vendorID"] = explode("=", $query[1])[1];
        $templateParams["details"] = $dbh->specificVendorList($templateParams["vendorID"]);
        $templateParams["foods"] = $dbh->specificVendorFoodList($templateParams["vendorID"]);

        $str = str_replace(" ", "_", $templateParams["details"]["nomeAzienda"]);
        $templateParams["titolo"] = "Venditori:".$str;
    } elseif ($query[0]=="list") {
        $templateParams["nome"] = "vendor_list.php";
        $templateParams["lista"] = $dbh->vendorList();
        
        $templateParams["titolo"] = "Venditori";
    }
} else {

}

require 'template/base.php';
?>