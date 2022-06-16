<?php
/**
 * per i venditori ci sarà la lista i loro prodotti
 * con un coso con i numeri per il refill degli elementi
 * 
 * per tutti gli utenti si potranno cambiare i nomi e altri dettagli dell'account
 * 
 * 
 */
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Luminosità - ";
$templateParams["nome"] = "user_details.php";
$templateParams["user"] = $dbh->getUser("gino", "pippo");
//Articoli Categoria Template


$templateParams["info"] = "";
require 'template/base.php';
?>