<?php 

require_once 'bootstrap.php';

$url = explode("&", explode('?', $_SERVER['REQUEST_URI'])[1]);

$id = str_replace("id=", "", $url[1]);

if($url[0]=="edit"){
    $gluten = isset($_POST["gluten"]) ? "1": "0";
    $val = $dbh->updateProduct("=", $_POST["name"], $_POST["inputDescr"], $_POST["price"], $gluten, $_POST["quantityInput"], $_POST["categoryInput"], $id);
} else if($url[0]=="refill"){
    $val = $dbh->refillProduct("=", $_POST["quantityInput"], $id);
} else if ($url[0] == "new"){
    $gluten = isset($_POST["gluten"]) ? "1": "0";
    $val = $dbh->addNewProduct($_POST["name"], $_POST["inputDescr"], $_POST["price"], $gluten, $_POST["quantityInput"], $_POST["categoryInput"]);
}
header("Location: ./login.php");
?>