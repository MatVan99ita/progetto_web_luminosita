<?php 
/**
 * zona del login con il controllo su mail e password e se l'utente esiste
 * 
 */
?>

<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Luminosità -";
$templateParams["nome"]  = "loggin_in.php";

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
if(isUserLoggedIn()){
    $templateParams["nome"] = "loggin_in.php";
    //$templateParams["user_info"] = $dbh->getUserInfo($_SESSION["id"]);
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
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