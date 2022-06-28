<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Luminosità - ";
$templateParams["nome"] = "foodList.php";
$templateParams["categorie"] = $dbh->getFoodTypes();
//Articoli Categoria Template
$idcategoria = -1;
if(isset($_GET["id"])){
    $idcategoria = $_GET["id"];
}
$nomecategoria = $dbh->getSpecificCat($idcategoria)[0];
if(count($nomecategoria)>0){
    $templateParams["titolo_pagina"] = $nomecategoria["CategoryName"];
    $templateParams["articoli"] = $dbh->getFoodMinimalDetailByType($nomecategoria["CategoryID"]);
    $templateParams["list-type"]="container";
}
else{
    $templateParams["titolo_pagina"] = "Al momento non ci sono prodotti"; 
    $templateParams["articoli"] = array();
}

require 'template/base.php';
?>