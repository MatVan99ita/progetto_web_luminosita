<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/main_style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
<?php
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
            ?>
            <script src="<?php echo $script; ?>"></script>
        <?php
        endforeach;
    endif;
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <?php
    $scripts = array_diff(scandir(JS), array('..', '.'));
    foreach($scripts as $script): ?>
        <script src="<?php echo JS.$script; ?>"></script>
    <?php endforeach;?>

</head>
<body>
<header class="navbar navbar-inverse navbar-static-top">
        <div class="column left">
            <a href="index.php">
                <img class="img-fluid float-left" id="logo_head" src="<?php echo LOGO."chiaro-200x200.png"?>" alt="<?php echo $templateParams["titolo"]; ?>"/>      
            </a>
            <p>DATA</p>
            <p>ORARIO</p>
        </div>
        <div class="column right">
            <a href="login.php">
                <img class="img-fluid float-right" id="logo_head" src="<?php echo LOGO."scuro-200x200.png"?>" alt="<?php echo $templateParams["titolo"]; ?>" />
            </a>
            <p>Ciao, <?php echo "Tizio" ?></p>
            </div>
        </div>
</header>
<!--nav>
    <ul> <--le 4 voci in alto->
        <li><a <?php isActive("index.php");?> href="index.php">Home</a></li><li><a <?php isActive("archivio.php");?> href="archivio.php">Archivio</a></li><li><a <?php isActive("contatti.php");?> href="contatti.php">Contatti</a></li><li><a <?php isActive("login.php");?> href="login.php">Login</a></li>
    </ul>
</nav-->
<main class="container col col-lg-12 col-md-12 col-sm-12 col-1">
    <?php //class="<?php echo $templateParams["list-type"]"
    if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
    }
    ?>
</main>

<footer>
    <p><img id="logo_foot" style="width: 10px" src=<?php echo LOGO."chiaro.png"; ?> ><?php echo $templateParams["titolo"]; ?></p>
    <p>UniBo - Campus Cesena</p>
    <p><a href="vendor_register.php">Lavora per noi</a></p>
    
</footer>
</body>
</html>