<?php 
require_once 'bootstrap.php';

if(isset($_COOKIE["shoppingCart"])){
    $checkPay = isset($_POST["flexSwitchCheckPay"]) ? $_POST["flexSwitchCheckPay"] : false;
    $checkZone = isset($_POST["flexSwitchCheckZone"]) ? $_POST["flexSwitchCheckZone"] : false;
    //Salvataggio delle nuove info se segnato
    if($checkPay || $checkZone) {
        $payInfo = isset($_POST["paymentText"]) ? $_POST["paymentText"] : "NotSaved";
        $zoneInfo = isset($_POST["zoneText"]) ? $_POST["zoneText"] : "";
        $check = $dbh->saveCheckout($_COOKIE["id"], $checkPay, $payInfo, $checkZone, $zoneInfo);
        if(!$check) echo "problema con il salvataggio dei dati";
    }

    $check = $dbh->takeOrder($_COOKIE["shoppingCart"]);
    if($check) {
        //Da implemenare Invio notifica al venditore
        //$dbh->sendBuyerRequest($_COOKIE["shoppingCart"]);
        //MEssgaggio per utente: Ordine andato a buon fine e buona mangiata
        unset($_COOKIE["shoppingCart"]);
        setcookie("shoppingCart", "", time()-3600);
    } else { 
        echo "<label>Errore con l'ordine</label>";
    }
}

$templateParams["nome"] = "end_checkout.php";


require 'template/base.php'; ?>