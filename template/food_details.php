<?php

/* Qua c'è l'edit del prodotto sia per quanto riguarda i dati o quanto riguarda il refill

in più lo userò anche per creare nuovi prodotti
*/

require_once 'bootstrap.php';
$url = explode('?', $_SERVER['REQUEST_URI'])[1];
$url = explode('&', $url);

print_r($url);

// $templateParams["nome"] = "template di partenza delle user info con un check sull'andata a buon fine di quello che è stato

$templateParams["nome"] = "productEdit_Template.php?";
$templateParams["category"] = $dbh->getFoodTypes();
$templateParams["food"] = $dbh->getFoodByID($url[1]);

if($url == "edit"){
    
}

require 'template/base.php';

?>
<a class="" href="#" role="button">
    <img alt="borsina" src="<?php echo UPLOAD_DIR."shopping-icon.png"; ?>" style="width: 300px"/>
</a>