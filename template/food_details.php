
<?php 
/*
$templateParams["food"]
`prodottoID`, 
p.`vendorID`,
`CategoryID`, 
`CategoryName`,
`nomeProd`,
`descrProd`,
`glutenFree`,
`quantity`,
`prezzo`,
`venduto`
`nomeAzienda`*/
$art = $templateParams["food"];
$img = CAT_DIR.$art["CategoryID"].". ".$art["CategoryName"].".jpg";
$val = $dbh->starRate($art["venduto"]);
$value = explode('.', $val);
$int = (int) $value[0];
$decimal = (int) $value[1];
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
					<h3 class="product-title"><?php echo $art["nomeProd"]; ?></h3>
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
                                        <span class="fa fa-star-half-o checked"></span>
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
					<p class="product-description"><p><?php echo $art["descrProd"]; ?></p></p>
					<h4 class="price">Prezzo: <span><?php echo $art["prezzo"]; ?>€</span></h4>
					<h4 class="price">Quantità disponibile: <span><?php echo $art["quantity"]; ?></span></h4>
					<div class="action">
						<button class="add-to-cart btn btn-primary m-1" type="button">add to cart</button>
						<button class="like btn btn-danger m-1" type="button"><span class="fa fa-heart"></span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
