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
    $templateParams["articoli"] = $dbh->getFoodByType($nomecategoria["CategoryID"]);
}
else{
    $templateParams["titolo_pagina"] = "Categoria non trovata"; 
    $templateParams["articoli"] = array();
}

require 'template/base.php';
?>