

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php foreach($templateParams["articoli"] as $art): ?>
    <article>
        <header>
            <div>
                <img src="" alt="<?php echo "Immagina PUAOI";/*echo UPLOAD_DIR.$tipo["imgarticolo"];*/ ?>" />
            </div>
            <h2><?php echo $art["nomeProd"]; ?></h2>
        </header>
        <section>
            <p><?php echo $art["descrProd"]; ?></p>
            <p><?php echo $art["glutenFree"]; ?></p>
            <p><?php echo $art["quantity"]; ?></p>
            <p><?php echo $art["nomeAzienda"]; ?></p>
        </section>
        <footer>
            <a href="">Aggiungi al carrello</a>
        </footer>
    </article>
<?php endforeach; ?>