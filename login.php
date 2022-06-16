<?php 
/**
 * zona del login con il controllo su mail e password e se l'utente esiste
 * 
 */
?>

<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}
$templateParams["titolo"] = "Luminosità -";
if(isUserLoggedIn()){
    
    $templateParams["nome"] = "loggin_in.php";
    //$templateParams["user_info"] = $dbh->getUserInfo($_SESSION["id"]);
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
}
else{
    $templateParams["nome"] = "not_login.php";
}
//$templateParams["vendors"] = $dbh->isVendors($mail, $password(però si potrebbe usare direttamente l'id));
//$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);

require 'template/base.php';
?>