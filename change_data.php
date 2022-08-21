
<?php
require_once 'bootstrap.php';

$templateParams["nome"] = "changeData_template.php";
$templateParams["titolo"] = "CambiaDati";
$dbh->printFormattedArray($_POST);
if(isset($_URL["pass"])) {
    $templateParams["passData"] = true;
} else {
    $templateParams["user"] = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);
}
require 'template/base.php';
?>