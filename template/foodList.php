

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>

<?php foreach($templateParams["articoli"] as $art):
    $img = CAT_DIR.$art["CategoryID"].". ".$art["CategoryName"].".jpg";
    ?>
<div id="login_form" class="container justify-content-center col-md-12">
    <form action="product_updated.php?<?php echo $templateParams["editType"]."&".$templateParams["foodID"]; ?>" method="POST">
    <div class="form-group">
            <label>Nome</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" value="<?php echo $templateParams["food"]["nomeProd"]; ?>" class="form-control">
            </div>
        </div>
    </form>
</div>



    <article class="row" id="art">
        <header>
            <?php /* Qua l'immagine deve ricondurre ai dettagli precisi con tutte le specifiche */ ?>
            <a class="col" href="foodDet.php?id=<?php echo $art["prodottoID"]; ?>&nome=<?php echo $art["nomeProd"]; ?>">
                <img src="<?php echo $img; ?>" alt="<?php echo "Immagina PUAOI"; ?>" style="width: 30%"/>
            </a>
            <h2 class="col"><?php echo $art["nomeProd"]; ?></h2>
        </header>
        <section class="col">
            <p><?php echo $art["descrProd"]; ?></p>
            <p><?php echo $art["glutenFree"]; ?></p>
            <p><?php echo $art["quantity"]; ?></p>
            <p><?php echo $art["nomeAzienda"]; ?></p>
        </section>
        <footer>
            <a href="#">
                <img alt="borsina" src="<?php echo UPLOAD_DIR."shopping-icon.png"; ?>" style="width: 30%"/>
            </a>
        </footer>
    </article>
<?php endforeach; ?>