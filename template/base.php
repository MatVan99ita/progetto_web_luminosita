<!DOCTYPE html>

<html lang="it">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<head>
    <title><?php echo $templateParams["titolo"]; ?></title>
    <link rel="stylesheet" type="text/css" href="./css/main_style.css"/>

<?php
    if(isset($templateParams["js"])):
        foreach($templateParams["js"] as $script):
            ?>
            <script src="<?php echo $script; ?>"></script>
        <?php
        endforeach;
    endif;
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
    <link rel='stylesheet' href='https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css'/>
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    
    <?php
    $scripts = array_diff(scandir(JS), array('..', '.'));
    foreach($scripts as $script): ?>
        <script src="<?php echo JS.$script; ?>"></script>
    <?php endforeach;?>

</head>
<body>
<header class="navbar navbar-inverse navbar-static-top">
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <nav class="navbar navbar-expand-xl navbar-light">
                    <div class="container-fluid">
                        <a href="index.php" class="navbar-brand"><img src="<?php echo LOGO."scuro-200x200.png"; ?>" alt="logo" class="img-fluid" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Beer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Wine</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Liquor
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Cider</a></li>
                                        <li><a class="dropdown-item" href="#">Mead</a></li>
                                        <li><a class="dropdown-item" href="#">Others</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-4 col-md-3">
                <div class="header-search mt-2">
                    <div class="search-form">
                        <form method="get">
                            <div class="input-group">
                                <div class="select-style">
                                    <select name="order">
                                        <option class="topshow" value="1">All</option>
                                        <option value="a">Beer</option>
                                        <option value="b">Wine</option>
                                        <option value="c">Liquor</option>
                                        <option value="d">Cider</option>
                                        <option value="e">Mead</option>
                                        <option value="f">Others</option>
                                    </select>
                                </div>
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Here" />
                                <div class="input-group-addon">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 cart-login">
                <div class="float-end cart mt-2">
                    <a href="carrello.php" class="fas fa-shopping-cart">
                        <span class="number">10</span>
                    </a>
                </div>

                <div class="float-end">
                    <button type="button" class="btn btn-light mt-2 btn-sm">Login</button>
                </div>
            </div>

            <div class="col-12 mt-sm-2 mt-lg-0">
                <div class="store-location p-0 text-end">
                    <div class="form-check-inline">
                        <input type="radio" id="test1" name="radio-group" data-toggle="modal" data-target=".bd-example-modal-lg" />
                        <label for="test1">Choose a Store</label>
                    </div>

                    <div class="form-check-inline">
                        <img class="img-fluid" src="/images/or.png" alt="Esplanda" width="20" />
                    </div>

                    <div class="form-check-inline">
                        <input type="radio" id="test2" name="radio-group" data-toggle="modal" data-target=".bd-example-modal-lg1" />
                        <label for="test2">Show Local Availblity</label>
                    </div>
                </div>
            </div>
        </div>
        <a href="foodVendor.php?list" class="btn btn-primary">I nostri partner</a>
            <a href="carrello.php" class="btn btn-primary">Vai al carrello</a>
            <a href="notifiche.php" class="btn btn-primary">Notifiche</a>
            <a href="login.php">
                <img class="img-fluid float-right" id="logo_head" src="<?php echo LOGO."scuro-200x200.png"?>" alt="<?php echo $templateParams["titolo"]; ?>" />
            </a>
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