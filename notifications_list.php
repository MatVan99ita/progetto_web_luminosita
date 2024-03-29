<?php 
/**
 * Zona stile outlook per controllare notifiche ricevute e inviate(?)
*/
require_once 'bootstrap.php';

$templateParams["titolo"] = "ListaNotifiche";
$templateParams["nome"] = "notif_list_templ.php";
if(isset($_COOKIE["logged"]) && isset($_COOKIE["mail"]) && isset($_COOKIE["id"])){

    
    $templateParams["mail"] = $dbh->getUserNotification($_COOKIE["id"]);
    $templateParams["totNotification"] = $dbh->getNotificationNum($_COOKIE["id"]);
    if(isset($_POST["allRead"])){
        foreach ($templateParams["mail"] as $mail) {
            $dbh->setNotificationToReaded($mail["notificationID"]);
        }
        unset($_POST["allRead"]);
        header("Location: ./notifications_list.php");
    }
} else {
    $templateParams["mail"] = array();
    $templateParams["totNotification"] = 0;
}
require 'template/base.php';
?>