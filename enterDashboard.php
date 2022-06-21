<?php
require_once 'bootstrap.php';
print_r($_POST);
$templateParams["titolo"] = "Luminosità - ";
//Base Template
if(isset($_POST["InputEmail"]) && isset($_POST["InputPassword"])){
    $dbh->logUser($_POST["InputEmail"], $_POST["InputPassword"]);
}
header("login.php");
?>