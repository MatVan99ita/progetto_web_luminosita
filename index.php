<?php

require_once 'bootstrap.php';
//
//Base Template
$templateParams["titolo"] = "Luminosità - Vicinanza . Silezio . Bevande";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getFoodTypes();
$templateParams["user"] = "UTENZIONATOH";
$templateParams["js"] = array("jquery-3.4.1.min.js", "header_clock.js");
//Home Template

require 'template/base.php';
?>
