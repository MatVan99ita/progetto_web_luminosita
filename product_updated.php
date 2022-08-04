<?php 

require_once 'bootstrap.php';
$dbh->printFormattedArray($_POST);
$url = parse_url($_SERVER['REQUEST_URI'], $component = -1);
$query = explode("&", $url["query"]);

$type = $query[0];
$id = $query[1];

if($type=="update") {
    echo "update";
    $gluten = isset($_POST["gluten"]) ? "1": "0";
    echo $gluten;
    $val = $dbh->updateProduct("=", $_POST["name"], $_POST["inputDescr"], $_POST["price"], $gluten, $_POST["quantityInput"], $_POST["categoryInput"], $id);
} else if($type=="refill") {
    $val = $dbh->refillProduct("=", $_POST["quantityInput"], $id);
} else if ($type == "new") {
    $gluten = isset($_POST["gluten"]) ? "1": "0";
    $val = $dbh->addNewProduct($_POST["name"], $_POST["inputDescr"], $_POST["price"], $gluten, $_POST["quantityInput"], $_POST["categoryInput"]);
}
header("Location: ./login.php");
?>