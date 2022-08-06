<?php

require_once 'bootstrap.php';

if(isset($_POST)):
    $dbh->printFormattedArray($_POST);
else:
    echo "Nessun risultato trovato";
endif;

//require 'template/base.php';
?>