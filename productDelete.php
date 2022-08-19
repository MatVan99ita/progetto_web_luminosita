<?php 

require_once 'bootstrap.php';

$url = parse_url($_SERVER['REQUEST_URI'], $component = -1);
$query = explode("&", $url["query"]);
$type = $query[0];
$id = explode("=", $query[1])[1];

/* DA TESTARE PER EVITARE DI PASSARE INFO DIRETTAMENTE DA URL CHE SENNO' E' TROPPO PERICOLOSO... forse
if(isset($_POST['choose']))
{

$unit = $_POST['unit'];
$frequency = $_POST['frequency'];


// Set session variables
$_SESSION["unit"] = $unit;
$_SESSION["frequency"] = $frequency;

}
 */
$templateParams["easter_egg"] = random_int(0, 1000);
if(isset($_POST["answer"])) {
    unset($_POST["answer"]);
    $dbh->deleteProduct($id);
    header("Location: ./login.php");
}
$templateParams["nome"] = "productDelete_template.php";


$templateParams["titolo"] = "ProductDeleted";
require 'template/base.php';

?>