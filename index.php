<?php

require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Blog TW - Home";
$templateParams["nome"] = "home.php";
$templateParams["categorie"] = $dbo->findTE("utenet", "Mail");
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
//Home Template
$templateParams["articoli"] = $dbh->getPosts(2);

require 'template/base.php';
        $dbo = new Database();
        $query = "SELECT * FROM utente";
        $dbo->query($query);
        $dbo->execute();
        $info = $dbo->resultset();
        print_r($info);
