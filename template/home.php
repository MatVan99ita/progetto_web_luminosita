<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php foreach($templateParams["categorie"] as $tipo): ?>
    <?php 
    $img = CAT_DIR.$tipo["CategoryID"].". ".$tipo["CategoryName"].".jpg"; 
    $id = $tipo["CategoryID"]."_catImg";
    ?>
    <article id="categories" >
        <header>
            <div>
                <img src="<?php echo $img; ?>" alt="<?php echo $img; ?>" />
            </div>
            <h2><?php echo $tipo["CategoryName"]; ?></h2>
        </header>
        <section>
            <p><?php echo $tipo["CategoryDescr"]; ?></p>
        </section>
        <footer>
            <a href="foodCategory.php?id=<?php echo $tipo["CategoryID"]; ?>">Vai ai prodotti</a>
        </footer>
    </article>
    
<?php endforeach; ?>