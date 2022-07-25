<?php 
    $checkPay = isset($_POST["flexSwitchCheckPay"]) ? $_POST["flexSwitchCheckPay"] : false;
    $checkZone = isset($_POST["flexSwitchCheckZone"]) ? $_POST["flexSwitchCheckZone"] : false;
    $payInfo = isset($_POST["paymentText"]) ? $_POST["paymentText"] : "NotSaved";
    $zoneInfo = isset($_POST["zoneText"]) ? $_POST["zoneText"] : "";
    $check = $dbh->saveCheckout($_COOKIE["id"], $checkPay, $payInfo, $checkZone, $zoneInfo);

    //Eliminazione del carrello in caso di successo
    if($check){
        unset($_COOKIE["shoppingCart"]);
    } else{
        echo "Errore nel pagamento"; 
    }
 ?>