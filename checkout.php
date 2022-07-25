
<?php
require_once 'bootstrap.php';

if(isset($_COOKIE["logged"])){
    if($_COOKIE["logged"]){
        if($_COOKIE["vendors"]==0){
            $templateParams["user"] = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);
        }
    }
}
$templateParams["paga"]=$templateParams["user"]["info_pagamento"];
$templateParams["luogo"]=$templateParams["user"]["zoneConsegna"];
$templateParams["nome"] = "payment.php";


require 'template/base.php';
?>