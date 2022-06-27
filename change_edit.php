<?php 

require_once 'bootstrap.php';
$url = explode('?', $_SERVER['REQUEST_URI'])[1];
// $templateParams["nome"] = "template di partenza delle user info con un check sull'andata a buon fine di quello che è stato

if($url == "pass"){
    $check = $dbh->changePassword($_POST["InputOldPassword"], $_POST["InputPassword1"]);
    if(!$check){
        $templateParams["nome"] = "changeData_template.php?passData&error";
    } else {
        $templateParams["nome"] = "?buonFine";
    }
} else if($url == "datas"){
    $check = $dbh->changeInfo($_POST["nome"], $_POST["cognome"], $_POST["mail"], $_POST["sex"], $_POST["cod_unibo"], $_POST["consegna"], $_POST["pagamento"]);
    
    if($check){}
        header("Location: ./login.php");
}
?>