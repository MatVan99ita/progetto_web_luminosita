<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>

<div id="succesfull" class="justify-content-center col-md-12">
    <p>
        <img src="./upload/logo_chiaro-200x200.png" alt="Italian Trulli">
        <?php echo $templateParams["buonFine"] ?>
    </p>
    <p>
        <a href="login.php?<?php echo "mail=".$_POST["InputEmail1"];?>">Vai al login</a>
    </p>
</div>


<div id='account_successfull'>
        <h4>Creazione avvenuta con il cesso</h4>
        <button class='btn btn-primary'>Dashboard</button>
        <button class='btn btn-primary'>Prosegui sul sito</button>
    </div>
<?php
$data = $dbh->getUser($_POST["InputEmail1"], $_POST["InputPassword2"]);
print_r($data);
$id = $data[0]["UserID"];
$mail = $data[0]["Email"];
$pass = $data[0]["password"];
//Array ( [0] => Array ( [UserID] => 36 [Nome] => e [Cognome] => Papero [Email] => paperaino@topolinia.org ) )

if (isset($_COOKIE['id']) && isset($_COOKIE['mail']) && isset($_COOKIE['logged']) && isset($_COOKIE['hash']) ) {
    unset($_COOKIE['id']);
    unset($_COOKIE['mail']);
    unset($_COOKIE['logged']);
    unset($_COOKIE['hash']);
    setcookie("id", $id);
    setcookie("mail", $mail);
    setcookie("logged", true);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    setcookie("hash", $hash);
} else {
    setcookie("id", $id);
    setcookie("mail", $mail);
    setcookie("logged", true);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    setcookie("hash", $hash);
}
?>