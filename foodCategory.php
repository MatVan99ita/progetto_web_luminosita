<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Luminosità - ";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getFoodTypes();
//Articoli Categoria Template
$idcategoria = -1;
if(isset($_GET["id"])){
    $idcategoria = $_GET["id"];
}
$nomecategoria = $dbh->getSpecificCat($idcategoria);
print_r($nomecategoria);
if(count($nomecategoria)>0){
    $templateParams["titolo_pagina"] = "Sfiziosi ".$nomecategoria[0]["CategoryName"];
    $templateParams["articoli"] = $dbh->getFoodByType($idcategoria);
}
else{
    $templateParams["titolo_pagina"] = "Categoria non trovata"; 
    $templateParams["articoli"] = array();
}

require 'template/base.php';
?>