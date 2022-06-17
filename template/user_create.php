<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>

<div id="register_form" class="container justify-content-center col-md-12">
    <form action="#" method="POST">
        <h2>Crea un account</h2>

        <div class="form-group">
            <label for="inputName">Nome</label>
            <input id="inputName" name="inputName" type="text" class="form-control" placeholder="Enter your name" required>
        </div>

        <div class="form-group">
            <label for="inputSurname">Cognome</label>
            <input id="inputSurname" name="inputSurname" type="text" class="form-control" placeholder="Enter your surname" required>
        </div>

        <div class="form-group">
            <label for="gender_fluid">Sesso</label>
            <select id="gender_fluid" name="gender_fluid" class="form-select" aria-label="Default select example" style="width: 100%" required>
                <option selected>Select gender...</option>
                <option value="Uomo">Uomo</option>
                <option value="Donna">Donna</option>
                <option value="Altro">Other...</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" class="form-control" id="InputEmail1" name="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label>Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control" id="InputPassword1" name="InputPassword1" pattern = "(?=.*\d)(?=.*[a-z])(?=.*?[0-9])(?=.*?[~`!@#$%^&amp;*()_=+\[\]{};:&apos;.,&quot;\\|\/?&gt;&lt;-]).{8,}" placeholder="Password" required>
                <div class="input-group-addon">
                    <a href="" class="btn btn-secondary"><i class="fa fa-eye-slash yellow-color" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="InputPassword2">Ripeti password</label>
            <input type="password" class="form-control" id="InputPassword2" name="InputPassword2" pattern = "(?=.*\d)(?=.*[a-z])(?=.*?[0-9])(?=.*?[~`!@#$%^&amp;*()_=+\[\]{};:&apos;.,&quot;\\|\/?&gt;&lt;-]).{8,}" placeholder="Password" required>
            <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
        </div>
        <button id="submit" type="submit" class="btn btn-primary">Crea</button>
    </form>
    
    <div>
        <?php if(isset($templateParams["erroreCreazione"])): ?>
            <p style="color: red"><?php echo $templateParams["erroreCreazione"]; ?></p>
        <?php endif;?>
    </div>
    <a id="log_user" href="login.php">
        Hai già un account?
    </a>
    
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
</div>