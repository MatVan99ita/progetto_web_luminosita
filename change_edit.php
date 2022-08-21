<?php 
//banana
require_once 'bootstrap.php';
$url = explode('?', $_SERVER['REQUEST_URI'])[1];
// $templateParams["nome"] = "template di partenza delle user info con un check sull'andata a buon fine di quello che è stato

$templateParams["titolo"] = "CambiaDati";
if($url == "pass"){
    $check = $dbh->changePassword($_POST["InputOldPassword"], $_POST["InputPassword1"]);
    if(!$check){
        $templateParams["nome"] = "changeData_template.php?passData&error";
    } else {
        $templateParams["nome"] = "?buonFine";
    }
} else if($url == "datas"){
    $check = $dbh->changeInfo($_POST);
    
    if($check){}
        header("Location: ./login.php");
}
?>