

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php
//getAllUserLoggedInfo($mail, $id, $pass, $salt){
$user = $dbh -> getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"], $_COOKIE["hash"]);
print_r($user);
print_r($_POST["InputPassword1"]);
?>