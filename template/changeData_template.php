
<?php
$url = parse_url($_SERVER['REQUEST_URI'], $component = -1);
$query = explode("&", $url["query"]);

if($query[0] == "passData"){
?> 

<div id="register_form" class="container justify-content-center col-md-12">
    <form action="#" method="POST">
        <h2>Cambio password</h2>

        <div class="form-group">
            <label>Old password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control" id="InputPassword1" name="InputPassword1" placeholder="Old password" required>
                <div class="input-group-addon">
                    <a href="" class="btn btn-secondary"><i class="fa fa-eye-slash yellow-color" aria-hidden="true"></i></a>
                </div>
            </div>
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

        <button id="submit" type="submit" class="btn btn-primary">Cambia</button>
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
</div>
<?php
} else if ($query[0] == "datas") {
    ?>
        <div>
            <input type="text" value="?>" disabled /><br>
            <input type="text" value="]; ?>" disabled /><br>
            <input type="text" value=" ?>" disabled /><br>
            <input type="text" value=" ?>" disabled /><br>
            <input type="text" value="egna"><br>
            <input type="text" value="amento"><br>
        </div>
        <div>
            <a href="change_edit.php?datas" class="btn btn-warning m-1">
                Cambia dati
            </a>
        </div>    
    <?php
}

?>