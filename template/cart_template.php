<?php 
$pretty = json_encode(json_decode($_COOKIE["shoppingCart"]), JSON_PRETTY_PRINT);
echo "<pre>" . $pretty . "<pre/>";

?>