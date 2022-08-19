<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Dashboard";
print_r($_POST);
//Base Template
if(isset($_POST["InputEmail"]) && isset($_POST["InputPassword"])){
    $dbh->logUser($_POST["InputEmail"], $_POST["InputPassword"]);
}
header("Location: ./login.php");
?>