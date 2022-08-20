

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php
//getAllUserLoggedInfo($mail, $id, $pass, $salt){
$utente = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);
// Nome
$nome = $utente["Nome"];

// Cognome,
$cognome = $utente["Cognome"];

// Email,
$mail = $utente["Email"];

// codUnibo,
$unicode = $utente["codUnibo"];

// sesso,
$sesso = $utente["sesso"];

// zoneConsegna,
$consegne = $utente["zoneConsegna"];

// info_pagamento
$pagah = $utente["info_pagamento"];

/**
 * Array ( [0] => UserID [1] => Nome [2] => Cognome [3] => Email 
 * [4] => password [5] => salt [6] => vendors [7] => BuyerID 
 * [8] => codUnibo [9] => sesso [10] => zoneConsegna 
 * [11] => info_pagamento [12] => userID )
 */
?>

<div class="container" id="art">
        <table class="table table-striped table-bordered" style="width: 1000px">
        <thead>
            <tr>
                <th scope="col"><h2>Dashboard</h2></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" style="width: 10%">•</th>
                <td style="width: 100px"><h5>Utente:</h5></td>
                <td style="width: 100px"><?php echo $nome." ".$cognome; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Mail:</h5></td>
                <td><?php echo $mail; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Sesso:</h5></td>
                <td><?php echo $sesso; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Cod. Unibo:</h5></td>
                <td><?php echo $unicode; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Zone consegna:</h5></td>
                <td><?php echo $consegne; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Info pagamento:</h5></td>
                <td><?php echo $pagah; ?></td>
            </tr>
        </tbody>
        </table>
        <div>
            <a href="change_data.php?datas" class="btn btn-warning m-1">
                Cambia dati
            </a>
            
            <a href="change_data.php?passData" class="btn btn-danger m-1">
                Cambia password
            </a>

            <a href="logout.php" onclick="deleteAllCookies()" class="btn btn-danger m-1">
                Logout
            </a>
        </div>
        
        <?php /* Scroll menu carino
        <h3 for="scrollmenu">Prodotti consigliati</h3>
        <div class="scrollmenu" id="scrolling">
            <?php foreach($templateParams["randomFoods"] as $food): 
                $img = CAT_DIR.$food["CategoryID"].". ".$food["categoryName"].".jpg"; 
                ?>
                <a href="foodCategory.php?id=<?php echo $food["CategoryID"]; ?>&list-type=container" class="card">
                    <section>
                        <img alt="immmagina puaoi" src="<?php echo $img; ?>"></img>
                        <h2 class="card-title"><?php echo $food["nomeProd"]; ?></h2>
                        <p class="card-text"><?php echo $food["prezzo"]."€"; ?></p>
                        <p class="card-text"><?php echo $food["categoryName"]; ?></p>
                    </section>
                </a>
            <?php endforeach; ?>
        </div>
            --*/?>
</div>

<div id="change_data_form" class="container justify-content-center col-md-12">
    <h3>Prodotti consigliati</h3>
</div>
<?php foreach($templateParams["randomFoods"] as $art):
    $img = CAT_DIR.$art["CategoryID"].".".$art["CategoryName"].".jpg";
    $val = $dbh->starRate($art["venduto"]);
    $value = explode('.', $val);
    $int = (int) $value[0];
    $decimal = isset($value[1]) ? (int) $value[1]: 0;
    ?>
    
    
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
                        <div class="preview-pic tab-content">
                          <div class="tab-pane active" id="<?php echo $art["prodottoID"]; ?>-pic-1"><img src="<?php echo $img; ?>"  alt="<?php echo $img; ?>"/></div>
                          <div class="tab-pane" id="<?php echo $art["prodottoID"]; ?>-pic-2"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></div>
                          <div class="tab-pane" id="<?php echo $art["prodottoID"]; ?>-pic-3"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></div>
                          <div class="tab-pane" id="<?php echo $art["prodottoID"]; ?>-pic-4"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></div>
                          <div class="tab-pane" id="<?php echo $art["prodottoID"]; ?>-pic-5"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                          <li class="active"><a data-target="#<?php echo $art["prodottoID"]; ?>-pic-1" data-toggle="tab"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></a></li>
                          <li><a data-target="#<?php echo $art["prodottoID"]; ?>-pic-2" data-toggle="tab"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></a></li>
                          <li><a data-target="#<?php echo $art["prodottoID"]; ?>-pic-3" data-toggle="tab"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></a></li>
                          <li><a data-target="#<?php echo $art["prodottoID"]; ?>-pic-4" data-toggle="tab"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></a></li>
                          <li><a data-target="#<?php echo $art["prodottoID"]; ?>-pic-5" data-toggle="tab"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></a></li>
                        </ul>
                        
                    </div>
                    <div class="details col-md-6">
                        <h4 class="card-title product-title"><?php echo $art["nomeProd"]; ?></h4>
                        <div class="rating">
                            <div class="stars">
                                <?php
                                if($decimal==0):
                                    $j = $int;
                                    for($i=0; $i<5; $i++):
                                        if($j>0): 
                                            $j--;?> 
                                            <span class="fa fa-star checked"></span>
                                        <?php else: ?>
                                            <span class="fa fa-star"></span>
                                  <?php endif;
                                    endfor; ?>
                                <?php else:
                                    $j = $int;
                                    $k = $decimal;
                                    for($i=0; $i<5; $i++):
                                        if($j>0): 
                                            $j--;?> 
                                            <span class="fa fa-star checked"></span>
                                        <?php 
                                        elseif($k>0 && $j==0):
                                            $k=-1; ?>
                                            <span class="fa fa-star-half checked"></span>
                                        <?php else: ?>
                                            <span class="fa fa-star"></span>
                                        <?php endif; ?>
                                    <?php 
                                    endfor;
                                endif; ?>
                                <span><?php echo $val; ?></span>
                            </div>
                            <span class="review-no">Venduto <?php echo $art["venduto"];?> volte</span>
                        </div>
                        <p class="product-description"><p>Venduto da: <a href="foodVendor.php?spec&id=<?php echo $art["vendorID"] ?>"><?php echo $art["nomeAzienda"]; ?></a></p></p>
                        <p class="product-description"><p><?php echo $art["descrProd"]; ?></p></p>
                        <p class="product-description">
                            <span class="form-check-label">Gluten Free</span>
                            <div class="col-md-3">
                                <div class="custom-control custom-checkbox image-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ck-<?php echo $art["prodottoID"]; ?>" name="gluten" disabled>
                                    <label style="width: 200px" class="custom-control-label" for="ck-<?php echo $art["prodottoID"]; ?>">
                                        <img src="<?php echo UPLOAD_DIR."gluten-free.jpg"; ?>" alt="gluten-free" class="<?php if($art["glutenFree"] == "0") echo "no-gluten"; ?> img-fluid">
                                    </label>
                                </div>
                            </div>
                        </p>
                        <h4 class="price card-text">Prezzo: <span><?php echo $art["prezzo"]; ?>€</span></h4>
                        <h4 class="price">Quantità disponibile: <span><?php echo $art["quantity"]; ?></span></h4>
                        <div class="action">
                            <button data-id="<?php echo $art["prodottoID"]; ?>" data-name="<?php echo $art["nomeProd"]; ?>" data-price="<?php echo $art["prezzo"]; ?>" class="add-to-cart btn btn-primary m-1" type="button" <?php if($_COOKIE["vendors"]=="1") echo "disabled"; ?>>add to cart</button>
                            <button class="like btn btn-danger m-1" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
