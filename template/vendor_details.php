
<?php
$vendor = $templateParams["details"];
?>    
<div class="container">
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                        <div class="details col-md-6">
                            <h3 class="product-title"><?php echo $vendor["nomeAzienda"]; ?></h3>
                        </div>
                        <p class="product-description">
                            <p><?php echo $vendor["descrizione"]; ?></p>
                        </p>
                        <h4 class="price">Orari di consegna: <span><?php echo $vendor["orariConsegna"]; ?></span></h4>
                        <h4 class="price">Referente: <span><?php echo $vendor["Nome"]." ".$vendor["Cognome"]; ?></span></h4>
                        <h4 class="price">Contatti: <span> <p>Tel: <?php echo $vendor["contatto"]; ?></p> <p>Mail: <?php echo $vendor["Email"]; ?></p> </span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <h2>Lista dei prodotti venduti da <?php echo $vendor["nomeAzienda"]; ?></h2>
    <?php $gluten = UPLOAD_DIR."gluten-free.jpg";

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
                            <button data-id="<?php echo $art["prodottoID"]; ?>" data-name="<?php echo $art["nomeProd"]; ?>" data-price="<?php echo $art["prezzo"]; ?>" class="add-to-cart btn btn-primary m-1" type="button">add to cart</button>
                            <button class="like btn btn-danger m-1" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<div class="col">
        <div class="card" style="width: 20rem;">
            <img class="card-img-top" src="http://www.azspagirls.com/files/2010/09/orange.jpg" alt="Card image cap">
            <div class="card-block">
                <h4 class="card-title">Orange</h4>
                <p class="card-text">Price: $0.5</p>
                <a href="#" data-name="Orange" data-price="0.5" class="add-to-cart btn btn-primary">Add to cart</a>
            </div>
        </div>
    </div>