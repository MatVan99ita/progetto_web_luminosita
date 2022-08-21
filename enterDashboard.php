<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Dashboard";
print_r($_POST);
//Base Template
if(isset($_POST["mail"]) && isset($_POST["password"])){
    $dbh->logUser($_POST["mail"], $_POST["password"]);
}
header("Location: ./login.php");
?>