<?php

require_once 'bootstrap.php';
$templateParams["params"] = "search";
if(!isset($_POST) || count($_POST)==0) {
    $order = array(1, "All");
    $text = "NaF";
    $test = true;
    $templateParams["articoli"] = array();
} else {
    $dbh->printFormattedArray($_POST);
    $order = explode("-", $_POST["order"]);
    $test = $order[0]!=1;

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
}
$templateParams["nome"] = "foodList.php";
require 'template/base.php';
?>