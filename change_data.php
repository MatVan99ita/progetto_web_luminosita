
<?php
require_once 'bootstrap.php';
/**
 * qui doppio form uno per la password e uno solo 
 * per i dati generici dell'utente quindi c'è bisogno dell'uso dell'url per cosare il tipo di edit
 */
$templateParams["nome"] = "changeData_template.php";
if(isset($_URL["pass"])) {
    $templateParams["passData"] = true;
} else {
    $templateParams["user"] = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);
}
require 'template/base.php';
?>