<?php
session_start();
define("UPLOAD_DIR", "./upload/");
define("CAT_DIR", "./upload/categoryImage/");
define("LOGO", "./upload/logo_");
require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "luminosita_db", 3306);?>
