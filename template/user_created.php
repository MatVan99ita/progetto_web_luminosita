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