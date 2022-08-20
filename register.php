<?php
require_once 'bootstrap.php';

if(isset($_POST["inputName"]) && isset($_POST["inputSurname"]) && isset($_POST["InputEmail1"]) && isset($_POST["InputPassword2"]) && isset($_POST["gender_fluid"])){
    $create_res = $dbh->addUser($_POST["inputName"], $_POST["inputSurname"], $_POST["InputEmail1"], $_POST["gender_fluid"], $_POST["InputPassword2"]);
    if(!$create_res[0]){
        $templateParams["nome"] = "user_create.php";
        $templateParams["erroreCreazione"] = $create_res[1];
    }
    else{
        $templateParams["nome"] = "user_created.php";
        $templateParams["buonFine"] = $create_res[1];
    }
} else {
    $templateParams["nome"] = "user_create.php";
}
$templateParams["titolo"] = "CreazioneUtente";
require 'template/base.php';
?>