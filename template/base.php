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
    <h1>Luminostà - </h1>
</header>
<nav>
    <ul>
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

<aside>
    <section>
        <h2>info casuali da rimuovere</h2>
        <ul>
            <?php foreach($templateParams["varie"] as $elemento):
                echo $elemento;
            endforeach; ?>
        </ul>
    </section>
</aside>

<footer>
    <p><img src="UP">Luminosità - Vicinanza . Silezio . Bevande</p>
    <p>UniBo - Campus Cesena</p>
</footer>
</body>
</html>