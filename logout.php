<?php 



setcookie($_COOKIE['id'], "", time()-3600);
setcookie($_COOKIE['mail'], "", time()-3600);
setcookie($_COOKIE['logged'], "", time()-3600);
setcookie($_COOKIE['vendors'], "", time()-3600);

header("Location: ./login.php"); 

?>