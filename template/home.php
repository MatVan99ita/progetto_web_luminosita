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
        
            <div id="card_cat" class="col-4" media="screen and (min-width: 480px) and (max-width: 1920px)">
                <div class="image">
                    <a href="foodCategory.php?id=<?php echo $tipo["CategoryID"]; ?>&list-type=container">
                        <img src="<?php echo $img; ?>" class="card-img-top bg-image hover-zoom" alt="<?php echo $img; ?>">
                    </a>
                </div>
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