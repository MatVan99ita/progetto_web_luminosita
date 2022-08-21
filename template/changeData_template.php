
<?php
$url = parse_url($_SERVER['REQUEST_URI'], $component = -1);
$query = explode("&", $url["query"]);
$dbh->printFormattedArray($query);
?>
<div id="login_form" class="container justify-content-center col-md-12">
    <form action="<?php echo "change_edit.php?".$query[0]; ?>" method="POST">
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
<?php
elseif ($query[0] == "datas" && $_COOKIE["vendors"]==0):
    $utente = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);
    // Nome
    $nome = $utente["Nome"];

    // Cognome,
    $cognome = $utente["Cognome"];

    // Email,
    $mail = $utente["Email"];

    // codUnibo,
    $unicode = $utente["codUnibo"];

    // sesso,
    $sesso = $utente["sesso"];
    
    // zoneConsegna,
    $consegne = $utente["zoneConsegna"];
    
    // info_pagamento
    $pagah = $utente["info_pagamento"];
    
    ?>
    
        <h2>Cambio dati</h2>

        <div class="form-group">
            <label>Nome</label>
            <div class="input-group">
                <input type="text" name="nome" value="<?php echo $nome; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Cognome</label>
            <div class="input-group">
                <input type="text" name="cognome" value="<?php echo $cognome; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <div class="input-group">
                <input type="email" name="mail" value="<?php echo $mail; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Sesso</label>
            <div class="input-group">
                <input type="text" name="sex" value="<?php echo $sesso; ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Cod. UniBo</label>
            <div class="input-group">
                <input type="text" name="cod.unibo" value="<?php echo $unicode; ?>" placeholder="cod unibo" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Zona consegna</label>
            <div class="input-group">
                <input type="text" name="consegna" value="<?php echo $consegne; ?>" placeholder="zone di consegna" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label>Info pagamento</label>
            <div class="input-group">
                <input type="text" name="pagamento" value="<?php echo $pagah; ?>" placeholder="info pagamento" class="form-control">
            </div>
        </div>
<?php elseif ($query[0] == "datas" && $_COOKIE["vendors"]==1):
        $utente = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);

        $nome = $utente["Nome"];
        $cognome = $utente["Cognome"];
        $mail = $utente["Email"];
        $nomeAzienda = $utente["nomeAzienda"];
        $indirizzo = $utente["indirizzo"];
        $orari = $utente["orariConsegna"];
        $tel = $utente["contatto"];
        $descr = $utente["descrizione"];
        ?>
    
        <h2>Diventa partner</h2>

        <div class="form-group">
            <label for="inputName">Nome</label>
            <input id="inputName" name="nome" type="text" class="form-control" placeholder="Enter your name" value="<?php echo $nome; ?>">
        </div>

        <div class="form-group">
            <label for="inputSurname">Cognome</label>
            <input id="inputSurname" name="cognome" type="text" class="form-control" placeholder="Enter your surname" value="<?php echo $cognome; ?>">
        </div>
        
        <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" class="form-control" id="InputEmail1" name="mail" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $mail; ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="inputnomeAzienda">Nome azienda</label>
            <input id="inputnomeAzienda" name="inputAzienda" type="text" class="form-control" placeholder="Nome dell'azienda" value="<?php echo $nomeAzienda; ?>">
        </div>

        <div class="form-group">
            <label for="inputAdress">Indirizzo</label>
            <input id="inputAdress" name="inputIndirizzo" type="text" class="form-control" placeholder="(Ex.: via Paolo Rossi, 15)" value="<?php echo $indirizzo; ?>">
        </div>

        <div class="form-group">
            <label for="inputOrari">Orari di consegna</label>
            <input id="inputOrari" name="inputOrari" type="text" class="form-control" placeholder="(Ex.: 9:00/10:30 - 12:30/17:45) Default => 8:00/20:00" value="<?php echo $orari; ?>">
        </div>

        <div class="form-group">
            <label for="inputTel">Contatto</label>            
            <input id="inputTel" name="inputContatti" class="form-control" type="tel" pattern="[0-9]{10}" placeholder="(+39) 000 000 00 00" value="<?php echo $tel; ?>">
        </div>

        <div class="form-group">
            <label for="inputDescr">Descrizione dell'azienda</label>
            <textarea id="inputDescr" name="inputDescr" rows="2" cols="50" class="form-control"><?php echo $descr; ?></textarea>
        </div>
<?php endif; ?>
        <div class="form-group">
            <input type="submit" class="btn btn-success m-1" value="Cambia dati">
            </input>
            <a href="login.php" class="btn btn-danger m-1">
                Annulla
            </a>
        </div>
    </form>

    <?php if($query[0] == "passData"): ?>
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
    <?php endif; ?>
</div>