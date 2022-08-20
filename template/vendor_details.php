
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
                        <h4 class="price">Contatti: <span><br> Tel: <?php echo $vendor["contatto"]; ?><br>Mail: <?php echo $vendor["Email"]; ?> </span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <h2>Lista dei prodotti venduti da <?php echo $vendor["nomeAzienda"]; ?></h2>
    <?php $gluten = UPLOAD_DIR."gluten-free.jpg";

foreach($templateParams["foods"] as $art):
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
                          <div class="tab-pane active" id="<?php echo $art["prodottoID"]; ?>-pic-1"><img src="<?php echo $img; ?>" alt="<?php echo $img; ?>"/></div>
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
                        <p class="<?php echo $art["nomeProd"]; ?>-description"><p>Descrizione: <?php echo $art["descrProd"]; ?></p></p>
                        <p class="product-description">
                            <span class="form-check-label" for="<?php echo $art["prodottoID"]; ?>-description">Gluten Free</span>
                            <div class="col-md-3">
                                <div class="custom-control custom-checkbox image-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="ck-<?php echo $art["prodottoID"]; ?>" name="gluten" disabled>
                                    <label style="width: 200px" class="custom-control-label" for="ck-<?php echo $art["prodottoID"]; ?>">
                                        <img src="<?php echo $gluten; ?>" alt="gluten-free" class="<?php if($art["glutenFree"] == "0") echo "no-gluten"; ?> img-fluid">
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