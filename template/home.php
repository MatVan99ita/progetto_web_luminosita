<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;
?>
<div class="row mt-5 justify-content-left">
    <?php foreach($templateParams["categorie"] as $tipo): ?>
        <?php 
        $img = CAT_DIR.$tipo["CategoryID"].". ".$tipo["CategoryName"].".jpg"; 
        $id = $tipo["CategoryID"]."_catImg";
        ?>
        
            <div class="card" id="card_cat">
                <img src="<?php echo $img; ?>" class="card-img-top" alt="<?php echo $img; ?>">
                <div class="card-header">
                    <h2 class="card-title"><?php echo $tipo["CategoryName"]; ?></h2>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $tipo["CategoryDescr"]; ?></p>
                    <a href="foodCategory.php?id=<?php echo $tipo["CategoryID"]; ?>&list-type=container">Vai ai prodotti</a>
                </div>
            </div>
        
    <?php endforeach; ?>
</div>