<!DOCTYPE html>
<?php if(isset($_COOKIE["logged"]) && isset($_COOKIE["mail"]) && isset($_COOKIE["id"])){
    $templateParams["toReadNotif"] = $dbh->getNotificationToRead($_COOKIE["id"]);
} else {
    $templateParams["toReadNotif"] = 0;
}?>
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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
    <link rel='stylesheet' href='https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css'/>
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    
    <?php
    $scripts = array_diff(scandir(JS), array('..', '.'));
    foreach($scripts as $script): ?>
        <script src="<?php echo JS.$script; ?>"></script>
    <?php endforeach;
    $templateParams["category"] = $dbh->getFoodTypes();
    ?>
</head>
<body>
<header class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="index.php" class="navbar-brand">
                <img style="width: 200%" src="<?php echo LOGO."scuro.png"; ?>" alt="logo" class="img-fluid" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item mx-auto active w-auto">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mx-auto active w-auto">
                        <a class="nav-link active" aria-current='page' href="foodVendor.php?list">Venditori  </a>
                    </li>
                    <li class="nav-item mx-auto dropdown w-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categoria
                        </a>
                        <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                            <?php foreach($templateParams["category"] as $category): ?>
                            <li class="dropdown-item">
                                <a class="btn btn-secondary w-100 bg-dark" href="foodCategory.php?id=<?php echo $category["CategoryID"]; ?>">
                                    <?php echo $category["CategoryName"]; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0 mr-auto mx-auto" action="foodSearch.php" method="POST">
                    <select name="order">
                        <option class="topshow" value="1-All">All</option>
                        <?php foreach($templateParams["category"] as $category): ?>
                            <option value="<?php echo $category["CategoryID"]."-".$category["CategoryName"]; ?>" ><?php echo $category["CategoryID"] . " - " . $category["CategoryName"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" name="search" id="search_head" class="form-control search-food-name" placeholder="Search Here" />
                    <div class="input-group-addon">
                        <button type="submit" class="fas fa-search bg-red"></button>
                    </div>
                </form>
                <a class="nav-link disabled dropdown-divider"> </a>
                
                <?php if($_COOKIE["vendors"]=="0"): ?>
                    <div class="nav-item cart mt-2">
                        <a href="carrello.php">
                            <img class="img-fluid" style="width: 50px" src="<?php echo UPLOAD_DIR."carts.png"; ?>" alt="cart" />
                            <span class="dot number" id="products_num">
                                <span class="total-count dot"></span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
                    
                <?php if(isset($_COOKIE["logged"]) && isset($_COOKIE["mail"]) && isset($_COOKIE["id"])): ?>
                    <div class="nav-item cart mt-2">
                        <a href="notifications_list.php">
                            <img class="img-fluid" style="width: 50px" src="<?php echo UPLOAD_DIR."bell.png"; ?>" alt="cart" />
                            <span class="dot number" id="notification_num">
                                <span class=""><?php echo $templateParams["toReadNotif"]; ?></span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
                        
                <div class="nav-item cart mt-2">
                    <a href="login.php">
                        <?php if(isset($_COOKIE["id"]) && isset($_COOKIE["mail"])): ?>
                            <img class="img-fluid" style="width: 50px" src="<?php echo UPLOAD_DIR."user.png"; ?>" alt="dashboard" />
                        <?php else: ?>
                            <img class="img-fluid" style="width: 50px" src="<?php echo UPLOAD_DIR."login.png"; ?>" alt="login" />
                        <?php endif; ?>                        
                        <a class="nav-link disabled dropdown-divider"> </a>
                    </a>
                </div>

                <a class="nav-link disabled dropdown-divider"> </a>

                

            </div>       
        </nav>
                        
</header>

<div id="myNav" class="overlay">
            <a href="index.php" class="navbar-brand">
                <img style="width: 50%" src="<?php echo LOGO."scuro.png"; ?>" alt="logo" class="img-fluid" />
            </a>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>

            <a id="login_dashboard_link"class="nav-link active cart mt-2" href="login.php">
                <?php if(isset($_COOKIE["id"]) && isset($_COOKIE["mail"])): ?>
                    <img class="img-fluid" style="width: 50px" src="<?php echo UPLOAD_DIR."user.png"; ?>" alt="dashboard" />
                    Dashboard
                <?php else: ?>
                    <img class="img-fluid" style="width: 50px" src="<?php echo UPLOAD_DIR."login.png"; ?>" alt="login" />
                    Login
                <?php endif; ?>
            </a>

            <?php if($_COOKIE["vendors"]=="0"): ?>
                <a id="cart_link" class="nav-link active cart mt-2" href="carrello.php">
                    <img id="cart_img" class="img-fluid" style="width: 50px" src="<?php echo UPLOAD_DIR."carts.png"; ?>" alt="cart" />
                    Carrello (<span class="total-count">0</span>)
                </a>
            <?php endif; ?>
            
            <?php if(isset($_COOKIE["logged"]) && isset($_COOKIE["mail"]) && isset($_COOKIE["id"])): ?>
                <a id="notification_link" class="nav-link active cart mt-2" href="notifications_list.php">
                    <img id="notification_img" class="img-fluid" style="width: 50px" src="<?php echo UPLOAD_DIR."bell.png"; ?>" alt="cart" />
                    Notifiche (<span class=""><?php echo $templateParams["toReadNotif"]; ?></span>)
                </a>
            <?php endif; ?>

            <form class="form-inline my-2 my-lg-0 mr-auto mx-auto" action="foodSearch.php" method="POST">
            <select name="order">
                <option class="topshow" value="1-All">All</option>
                <?php foreach($templateParams["category"] as $category): ?>
                    <option value="<?php echo $category["CategoryID"]."-".$category["CategoryName"]; ?>" ><?php echo $category["CategoryID"] . " - " . $category["CategoryName"]; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="search" id="search_nav" class="form-control search-food-name" placeholder="Search Here">
            <div class="input-group-addon">
                <button type="submit" class="fas fa-search bg-red"></button>
            </div>
        </form>

            <a class="nav-link disabled dropdown-divider"> </a>
            <a href="" class="nav-link disabled">Categorie</a>
            <?php foreach($templateParams["category"] as $category): ?>
                <a class="nav-link active" href="foodCategory.php?id=<?php echo $category["CategoryID"]; ?>"><?php echo $category["CategoryID"] . " - " . $category["CategoryName"]; ?></option>
            <?php endforeach; ?>

            <a class="nav-link active" aria-current="page" href="foodVendor.php?list">Venditori</a>

        </div>
<main class="container col col-lg-12 col-md-12 col-sm-12 col-1">
    <?php //class="<?php echo $templateParams["list-type"]"
    if(isset($templateParams["nome"])){
        require($templateParams["nome"]);
    }
    ?>
</main>


<footer>
    <p><img id="logo_foot" style="width: 10px" src=<?php echo LOGO."chiaro.png"; ?> alt="logo_footer"><?php echo $templateParams["titolo"]; ?></p>
    <p>UniBo - Campus Cesena</p>
    <p><a href="vendor_register.php">Lavora per noi</a></p>
</footer>
</body>
</html>