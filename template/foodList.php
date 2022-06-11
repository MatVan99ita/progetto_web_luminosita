
//CategoryID, Nome, Descrizione, GlutenFree, Quantity, NomeAzienda
<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php foreach($templateParams["articoli"] as $art): ?>
    <article>
        <header>
            <div>
                <img src="" alt="<?php echo "Immagina PUAOI";/*echo UPLOAD_DIR.$tipo["imgarticolo"];*/ ?>" />
            </div>
            <h2><?php echo $art["Nome"]; ?></h2>
        </header>
        <section>
            <p><?php echo $tipo["Descrizione"]; ?></p>
        </section>
        <footer>
            <a href="foodCategory.php?id=<?php echo $tipo["catID"]; ?>">Vai ai prodotti</a>
        </footer>
    </article>
<?php endforeach; ?>