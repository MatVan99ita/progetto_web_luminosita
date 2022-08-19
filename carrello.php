<?php
/**
 * Lista dei prodotti che si vogliono acquistare, scelta quantità e diminuzione quantità su db
 */
require_once 'bootstrap.php';

 $templateParams["nome"]="cart_template.php";
 $templateParams["titolo"] = "Carrello";

require 'template/base.php';
?>