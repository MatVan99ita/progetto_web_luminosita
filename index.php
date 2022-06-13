<?php

require_once 'bootstrap.php';
//
//Base Template
$templateParams["titolo"] = "Luminosità - Vicinanza . Silezio . Bevande";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getFoodTypes();
//Home Template

require 'template/base.php';
?>
