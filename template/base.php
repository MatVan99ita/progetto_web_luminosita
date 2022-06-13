<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <?php
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
            ?>
            <script src="<?php echo $script; ?>"></script>
        <?php
        endforeach;
    endif;
    ?>
</head>
<body>
<header>
    <div id="logo_zone"><img id="logo_head" src="<?php echo LOGO."chiaro.png"?>" alt="<?php echo $templateParams["titolo"]; ?>" /></div>
    <div id="user_zone"><img id="logo_head" src="<?php echo LOGO."scuro.png"?>" alt="<?php echo $templateParams["titolo"]; ?>" /></div>
</header>
<nav>
    <ul> <!--le 4 voci in alto-->
        <li><a <?php isActive("index.php");?> href="index.php">Home</a></li><li><a <?php isActive("archivio.php");?> href="archivio.php">Archivio</a></li><li><a <?php isActive("contatti.php");?> href="contatti.php">Contatti</a></li><li><a <?php isActive("login.php");?> href="login.php">Login</a></li>
    </ul>
</nav>
<main>
    <?php
    if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
    }
    ?>
</main>

<footer>
    <p><img id="logo_foot" src=<?php echo LOGO."chiaro.png"; ?> ><?php echo $templateParams["titolo"]; ?></p>
    <p>UniBo - Campus Cesena</p>
</footer>
</body>
</html>