<?php 
require_once 'bootstrap.php';

$templateParams["titolo"] = "EndCheckout";
if(isset($_COOKIE["shoppingCart"])){
    $checkPay = isset($_POST["flexSwitchCheckPay"]) ? $_POST["flexSwitchCheckPay"] : false;
    $checkZone = isset($_POST["flexSwitchCheckZone"]) ? $_POST["flexSwitchCheckZone"] : false;
    //Salvataggio delle nuove info se segnato
    if($checkPay || $checkZone) {
        /*[paymentText] => ginopippo
        [flexSwitchCheckPay] => true
        [zoneText] => ginopeppo
        [flexSwitchCheckZone] => true
        [timeText] => 2022-07-26T18:38*/
        $payInfo = isset($_POST["paymentText"]) ? $_POST["paymentText"] : "NotSaved";
        $zoneInfo = isset($_POST["zoneText"]) ? $_POST["zoneText"] : "";
        echo "<br>";
        echo "<br>";
        echo $payInfo;
        echo "<br>";
        echo $zoneInfo;
        echo "<br>";
        echo "<br>";
        $check = $dbh->saveCheckout($_COOKIE["id"], $checkPay, $payInfo, $checkZone, $zoneInfo);
        if(!$check) echo "problema con il salvataggio dei dati";
    }

    $check = $dbh->takeOrder($_COOKIE["shoppingCart"]);
    if($check) {
        $dbh->writeEmail();
    } else { 
        echo "<label>Errore con l'ordine</label>";
    }
}

$templateParams["nome"] = "end_checkout.php";


require 'template/base.php'; ?>