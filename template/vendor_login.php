

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php
$user = $templateParams["user"];
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
                <td style="width: 100px"><h5>Referente:</h5></td>
                <td style="width: 100px"><?php echo $user["Nome"]." ".$user["Cognome"]; ?></td>
            </tr>

            <tr>
                <th scope="row">•</th>
                <td><h5>Azienda:</h5></td>
                <td><?php echo $user["nomeAzienda"]; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Mail:</h5></td>
                <td><?php echo $user["Email"]; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Tel:</h5></td>
                <td><?php echo $user["contatto"]; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Indirizzo:</h5></td>
                <td><?php echo $user["indirizzo"]; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Orari di consegna:</h5></td>
                <td><?php echo $user["orariConsegna"]; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Descrizione:</h5></td>
                <td><?php echo $user["descrizione"]; ?></td>
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

            <a href="login.php" onclick="deleteAllCookies()" class="btn btn-danger m-1">
                Logout
            </a>
        </div>
</div>

<div id="change_data_form" class="container justify-content-center col-md-12">
    <h3>Prodotti</h3>
</div>
<?php 
/*Array
(
[0] => Array
    (
        [prodottoID] => 3
        [nomeProd] => Panino con la mortadella
        [descrProd] => La mortazza Bologna IGPfrgethsrnb
        [prezzo] => 1.00
        [glutenFree] => 0
        [quantity] => 950
        [CategoryName] => Panini
        [CategoryID] => 4
        [vendorID] => 3
        [venduto] => 13
    )
*/
$gluten = UPLOAD_DIR."gluten-free.jpg";

foreach($templateParams["foods"] as $art):
    $img = CAT_DIR.$art["CategoryID"].". ".$art["CategoryName"].".jpg";
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
                          <div class="tab-pane active" id="pic-1"><img style="width: 400px; height 252px" src="<?php echo $img; ?>"/></div>
                          <div class="tab-pane" id="pic-2"><img src="<?php echo $img; ?>" /></div>
                          <div class="tab-pane" id="pic-3"><img src="<?php echo $img; ?>" /></div>
                          <div class="tab-pane" id="pic-4"><img src="<?php echo $img; ?>" /></div>
                          <div class="tab-pane" id="pic-5"><img src="<?php echo $img; ?>" /></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                          <li class="active"><a data-target="#pic-1" data-toggle="tab"><img style="width: 400px; height 252px" src="<?php echo $img; ?>"/></a></li>
                          <li><a data-target="#pic-2" data-toggle="tab"><img src="<?php echo $img; ?>" /></a></li>
                          <li><a data-target="#pic-3" data-toggle="tab"><img src="<?php echo $img; ?>" /></a></li>
                          <li><a data-target="#pic-4" data-toggle="tab"><img src="<?php echo $img; ?>" /></a></li>
                          <li><a data-target="#pic-5" data-toggle="tab"><img src="<?php echo $img; ?>" /></a></li>
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
                        <p class="product-description"><p>Descrizione: <?php echo $art["descrProd"]; ?></p></p>
                        <p class="product-description">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Gluten Free</label>
                            <div class="col-md-3">
                                <div class="custom-control custom-checkbox image-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ck1a" name="gluten" disabled>
                                    <label style="width: 200px" class="custom-control-label" for="ck1a">
                                        <img src="<?php echo $gluten; ?>" alt="gluten-free" class="<?php if($art["glutenFree"] == "0") echo "no-gluten"; ?> img-fluid">
                                    </label>
                                </div>
                            </div>
                        </p>
                        <h4 class="price card-text">Prezzo: <span><?php echo $art["prezzo"]; ?>€</span></h4>
                        <h4 class="price">Quantità disponibile: <span><?php echo $art["quantity"]; ?></span></h4>
                        <div class="action">
                            <a href="product_edit.php?edit-type=update&id=<?php echo $art["prodottoID"]; ?>" class="like btn btn-warning m-1" type="button">modifica</a>
                            <a href="product_edit.php?edit-type=refill&id=<?php echo $art["prodottoID"]; ?>" class="like btn btn-success m-1" type="button">refill</a>
                            <a href="productDelete.php?delete&id=<?php echo $art["prodottoID"]; ?>" class="like btn btn-danger m-1" type="button">rimuovi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    

    <a href="product_edit.php?edit-type=new&id=-1" class="like btn btn-success m-1" type="button">
        Aggiungi un nuovo prodotto
    </a>
</div>
