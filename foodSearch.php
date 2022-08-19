<?php

require_once 'bootstrap.php';
if(!isset($_POST) || count($_POST)==0) {
    $order = array(1, "All");
    $text = "NaF";
    $test = true;
    $templateParams["articoli"] = array();
    $templateParams["searchParams"] = $text . ": Errore nella ricerca riprovare";
    $templateParams["titolo"] = "Errore nella ricerca riprovare";
} else {
    $templateParams["glutenSearch"] = isset($_POST["gluten"]) ? "" : "no-gluten";
    $order = explode("-", $_POST["order"]);
    $test = $order[0]!=1;
    if($test){
        if(strlen($_POST["search"])===0) {
            header("Location: ./foodCategory.php?id=" . $order[0] . "&list-type=container");
        } else {
            $ret = $dbh->searchFoodNameAndCategory($_POST["search"], $order[0]);
            $templateParams["titolo"] = "Ricerca:" . $_POST["search"];
        }
    } else {
        $ret = $dbh->searchFoodName($_POST["search"]);
    }

    if(count($ret)==0) {
        $templateParams["articoli"] = array();
        $templateParams["searchParams"] = "Nessun risultato per: '" . $_POST["search"] . "'";
        if($test) $templateParams["searchParams"] .= " in '". $order[1]."'";
    } else {
        $templateParams["articoli"] = $ret;
        $templateParams["searchParams"] = count($ret) . " risultati per '" . $_POST["search"] . "'";
        if($test) $templateParams["searchParams"] .= " in " . $order[1] . "'";
    }
}
$templateParams["nome"] = "foodList.php";
require 'template/base.php';
?>