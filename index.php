<?php

require_once 'bootstrap.php';
//
//Base Template
$templateParams["titolo"] = "Luminosità - ";
$templateParams["nome"] = "home.php";
$templateParams["varie"] = $dbh->TEST_QUERY();
//Home Template

require 'template/base.php';
?>
