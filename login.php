<?php 
/**
 * zona del login con il controllo su mail e password e se l'utente esiste
 * 
 */
?>

<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Luminosità -";

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["mail"], $_POST["pass"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
        $templateParams["nome"] = "register.php";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}
else if(isset($_COOKIE["logged"])){
    if($_COOKIE["logged"]){
    $templateParams["nome"] = "user_details.php";
    //$templateParams["user_info"] = $dbh->getUserInfo($_SESSION["id"]);
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
    } else if(isset($_POST["mail"]) && !isset($_POST["password"])){
        $templateParams["nome"] = "loggin_in.php";
        $templateParams["mail_created"] = $_POST["mail"];
    }
}
else{
    $templateParams["nome"] = "loggin_in.php";
}
//$templateParams["vendors"] = $dbh->isVendors($mail, $password(però si potrebbe usare direttamente l'id));
//$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
//*/
require 'template/base.php';
?>