<!DOCTYPE html>
<html lang="it">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<header id="head" class="row">
        <div class="column left"> 
            <img id="logo_head" src="<?php echo LOGO."chiaro.png"?>" alt="<?php echo $templateParams["titolo"]; ?>" />
            <p>DATA</p>
            <p>ORARIO</p>
        </div>
        <div class="column right">
            <img id="logo_head" src="<?php echo LOGO."scuro.png"?>" alt="<?php echo $templateParams["titolo"]; ?>" />
            <p>CARRELLO</p>
            <p>NOME</p>
        </div>
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