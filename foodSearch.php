<?php

require_once 'bootstrap.php';
if(isset($_POST)):
    $order = explode("-", $_POST["order"]);
    $test = $order[0]!=1;
    $dbh->printFormattedArray($_POST);
    if($test){
        $ret = $dbh->searchFoodNameAndCategory($_POST["search"], $_POST["order"]);
    } else {
        $ret = $dbh->searchFoodName($_POST["search"]);
    }
    
    if(count($ret)==0) {
        $str = "Nessun risultato per: ".$_POST["search"];
        if($test) $str .= " in ". $order[1];
        echo $str;
    } else {
        $dbh->printFormattedArray($ret);
        $templateParams["articoli"] = $ret;
    }
    $templateParams["nome"] = "foodList.php";
else:
    echo "Nessun risultato trovato";
    $templateParams["nome"] = "end_checkout.php";
endif;

require 'template/base.php';
?>