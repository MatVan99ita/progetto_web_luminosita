<?php 


require_once 'bootstrap.php';
$url = explode('?', $_SERVER['REQUEST_URI'])[1];
$url = explode('=', $url);

print_r($url);

$templateParams["nome"] = "food_details.php";
$templateParams["category"] = $dbh->getFoodTypes();
$templateParams["food"] = $dbh->getFoodSpecificDetails($url[1]);
/*`prodottoID`, 
p.`vendorID`,
`CategoryID`, 
`CategoryName`,
`nomeProd`,
`descrProd`,
`glutenFree`,
`quantity`,
`prezzo`,
`nomeAzienda`*/

require 'template/base.php';
?>