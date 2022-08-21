<?php 


require_once 'bootstrap.php';

setcookie($_COOKIE['id'], "", time()-3600);
setcookie($_COOKIE['mail'], "", time()-3600);
setcookie($_COOKIE['logged'], "", time()-3600);
setcookie($_COOKIE['vendors'], "", time()-3600);

unset($_COOKIE['id']);
unset($_COOKIE['mail']);
unset($_COOKIE['logged']);
unset($_COOKIE['vendors']);

header("Location: ./login.php");
?>