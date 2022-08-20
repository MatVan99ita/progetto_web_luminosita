
<?php
require_once 'bootstrap.php';

if(isset($_SESSION["end_check"])){
    $_SESSION["end_check"] = false;
    unset($_SESSION["end_check"]);
    header("Location: ./carrello.php");
}

if(isset($_COOKIE["logged"])){
    if($_COOKIE["logged"]){
        if($_COOKIE["vendors"]==0){
            $templateParams["user"] = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);
        }
    }
}

if(isset($_POST["timeText"])){
    if(isset($_COOKIE["shoppingCart"])){
        $checkPay = isset($_POST["flexSwitchCheckPay"]) ? $_POST["flexSwitchCheckPay"] : false;
        $checkZone = isset($_POST["flexSwitchCheckZone"]) ? $_POST["flexSwitchCheckZone"] : false;
        //Salvataggio delle nuove info se segnato
        if($checkPay || $checkZone) {
            $payInfo = isset($_POST["paymentText"]) ? $_POST["paymentText"] : "NotSaved";
            $zoneInfo = isset($_POST["zoneText"]) ? $_POST["zoneText"] : "";
            $check = $dbh->saveCheckout($_COOKIE["id"], $checkPay, $payInfo, $checkZone, $zoneInfo);
            if(!$check) $templateParams["ERROR_save"] = "problema con il salvataggio dei dati";
        }
        
        $check = $dbh->takeOrder($_COOKIE["shoppingCart"]);
        if($check) {
            $dbh->writeEmail();
        } else { 
            $templateParams["ERROR_pay"] = "Errore con l'ordine";
        }
    }    
    $templateParams["nome"] = "end_checkout.php";
    $templateParams["titolo"] = "End_checkout";
} else {
    $templateParams["paga"]=$templateParams["user"]["info_pagamento"];
    $templateParams["luogo"]=$templateParams["user"]["zoneConsegna"];
    $templateParams["nome"] = "payment.php";

    $templateParams["titolo"] = "Checkout";
}
require 'template/base.php';
?>