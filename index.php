<?php

require_once 'bootstrap.php';
//
//Base Template
$templateParams["titolo"] = "Luminosità - Vicinanza . Silezio . Bevande";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbh->getFoodTypes();
$templateParams["user"] = "UTENZIONATOH";
$templateParams["list-type"]="card-deck";
$templateParams["js"] = array("./js/jquery-3.4.1.min.js", "./js/header_clock.js");
//Home Template

require 'template/base.php';


/*
    <div class="card card-custom mx-1 mb-2">
        <header>
            <div>
                <img src="<?php echo $img; ?>" alt="<?php echo $img; ?>" />
            </div>
            <h2><?php echo $tipo["CategoryName"]; ?></h2>
        </header>
        <section>
            <p><?php echo $tipo["CategoryDescr"]; ?></p>
        </section>
        <footer>
            <a href="foodCategory.php?id=<?php echo $tipo["CategoryID"]; ?>&list-type=container">Vai ai prodotti</a>
        </footer>
</article>*/
?>
