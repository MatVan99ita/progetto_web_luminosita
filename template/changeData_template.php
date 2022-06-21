
<?php
$url = parse_url($_SERVER['REQUEST_URI'], $component = -1);
$query = explode("&", $url["query"]);
?>
<div id="change_data_form" class="container justify-content-center col-md-12">
    <form action="#" method="POST">
<?php if($query[0] == "passData"): ?>
        <h2>Cambio password</h2>
        <div class="form-group">
            <label>Old password</label>
            <div class="input-group" id="show_hide_old_password">
                <input type="password" class="form-control" id="InputOldPassword" name="InputOldPassword" placeholder="Old password" required>
                <div class="input-group-addon">
                    <a href="" class="btn btn-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>New password</label>
            <div class="input-group" id="show_hide_new_password">
                <input type="password" class="form-control" id="InputPassword1" name="InputPassword1" pattern = "(?=.*\d)(?=.*[a-z])(?=.*?[0-9])(?=.*?[~`!@#$%^&amp;*()_=+\[\]{};:&apos;.,&quot;\\|\/?&gt;&lt;-]).{8,}" placeholder="New password" required>
                <div class="input-group-addon">
                    <a href="" class="btn btn-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="InputPassword2">Repeat new password</label>
            <input type="password" class="form-control" id="InputPassword2" name="InputPassword2" pattern = "(?=.*\d)(?=.*[a-z])(?=.*?[0-9])(?=.*?[~`!@#$%^&amp;*()_=+\[\]{};:&apos;.,&quot;\\|\/?&gt;&lt;-]).{8,}" placeholder="Repeat new password" required>
            <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
        </div>
        </form>
    
    <div>
        <?php if(isset($templateParams["erroreCreazione"])): ?>
            <p style="color: red"><?php echo $templateParams["erroreCreazione"]; ?></p>
        <?php endif;?>
    </div>
    
    <div id="pswd_info">
            <h4>Password must meet the following requirements:</h4>
            <ul>
                <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                <li id="number" class="invalid">At least <strong>one number</strong></li>
                <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                <li id="special" class="invalid">At least <strong>1 special character(Ex.: .,_?! etc...)</strong></li>
            </ul>
        </div>
<?php
elseif ($query[0] == "datas"):
    $utente = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);
    // Nome
    $nome = $utente[0]["Nome"];

    // Cognome,
    $cognome = $utente[0]["Cognome"];

    // Email,
    $mail = $utente[0]["Email"];

    // codUnibo,
    $unicode = $utente[0]["codUnibo"];

    // sesso,
    $sesso = $utente[0]["sesso"];
    
    // zoneConsegna,
    $consegne = $utente[0]["zoneConsegna"];
    
    // info_pagamento
    $pagah = $utente[0]["info_pagamento"];
    
    ?>
    
        <h2>Cambio dati</h2>

        <div class="form-group">
            <label>Nome</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" value="<?php echo $nome; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Cognome</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" value="<?php echo $cognome; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <div class="input-group" id="show_hide_password">
                <input type="email" name="name" value="<?php echo $mail; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Sesso</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" value="<?php echo $sesso; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Cod. UniBo</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" value="<?php echo $unicode; ?>" placeholder="cod unibo" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Zona consegna</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" value="<?php echo $consegne; ?>" placeholder="zone di consegna" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Info pagamento</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" value="<?php echo $pagah; ?>" placeholder="info pagamento" class="form-control">
            </div>
        </div>
        
<?php endif; ?>
<div>
            <a href="change_edit.php?<?php echo $query[0]; ?>" class="btn btn-success m-1">
                Cambia dati
            </a>
            <a href="login.php" class="btn btn-danger m-1">
                Annulla
            </a>
        </div>
    </form>
</div>