

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php foreach($templateParams["user"] as $art): ?>
    <article>
        <header>
            <h2><?php echo $art["Nome"]. " ".$art["Cognome"]; ?></h2>
        </header>
        <section>
            <p><?php echo $art["Email"]; ?></p>
            <p><?php echo $art["password"]; ?></p>
            <p><?php echo $art["quantity"]; ?></p>
            <p><?php echo $art["nomeAzienda"]; ?></p>
        </section>
        <footer>
            <a href="">Aggiungi al carrello</a>
        </footer>
    </article>
<?php endforeach; ?>