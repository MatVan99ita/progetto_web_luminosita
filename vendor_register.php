<?php
require_once 'bootstrap.php';
//$nome, $cognome, $mail, $password, $nomeAzienda, $periodo="", $descr="", $sesso=""
if(
    isset($_POST["inputName"]) && 
    isset($_POST["inputSurname"]) && 
    isset($_POST["InputEmail1"]) && 
    isset($_POST["InputPassword2"]) && 
    isset($_POST["inputAzienda"]) && 
    isset($_POST["inputContatti"]) && 
    isset($_POST["inputIndirizzo"])
) {
    $descr = isset($_POST["inputDescr"]) ? $_POST["inputDescr"] : "";
    $periodo = isset($_POST["inputOrari"]) ? $_POST["inputOrari"] : "Lun-Ven 8:00/20:00";
    
    /*public function addVendor(
        $nome, 
        $cognome, 
        $mail, 
        $password, 
        $nomeAzienda, 
        $contatto, 
        $indirizzo, 
        $periodo="", 
        $descr="", 
        $sesso=""){*/

    $create_res = $dbh->addVendor(
                                    $_POST["inputName"],
                                    $_POST["inputSurname"],
                                    $_POST["InputEmail1"],
                                    $_POST["InputPassword2"],
                                    $_POST["inputAzienda"],
                                    $_POST["inputContatti"],
                                    $_POST["inputIndirizzo"],
                                    $periodo,
                                    $descr
                                );
    if(!$create_res[0]){
        $templateParams["nome"] = "vendor_create.php";
        $templateParams["erroreCreazione"] = $create_res[1];
    }
    else{
        $templateParams["nome"] = "user_created.php";
        $templateParams["buonFine"] = $create_res[1];
    }
} else {
    $templateParams["nome"] = "vendor_create.php";
}
require 'template/base.php';
?>