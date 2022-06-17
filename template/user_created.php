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

<div id="account_successfull">
        <h4>Password must meet the following requirements:</h4>
        <ul>
            <li id="letter" class="invalid">At least <strong>one letter</strong></li>
            <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
            <li id="number" class="invalid">At least <strong>one number</strong></li>
            <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
            <li id="special" class="invalid">At least <strong>1 special character(Ex.: .,_?! etc...)</strong></li>
        </ul>
    </div>