
<div id="login_form" class="container justify-content-center col-md-12">
    <form action="product_updated.php?<?php echo $templateParams["editType"]."&".$templateParams["foodID"]; ?>" method="POST">
<?php if($templateParams["editType"] == "refill"): ?>
        <h2>Refill prodotto</h2>
        <div class="form-group">
            <label>Quantità attuale:   .</label>      
            <label>    <?php echo $templateParams["food"]["quantity"]; ?></label>
        </div>

        <div class="form-group">
            <label>Cambia quantità</label>
            <div class="input-group" id="show_hide_new_password">
                <input type="number" name="quantityInput" class="form-control" value="<?php echo $templateParams["food"]["quantity"]; ?>">
            </div>
        <div>
<?php
elseif($templateParams["editType"] == "update"):
    //`nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `CategoryName`
    /*
    $templateParams["editType"] = $url[0];
    $templateParams["category"] = $dbh->getFoodTypes();
    $templateParams["food"] = $dbh->getFoodByID($url[1]);
    `glutenFree`, `quantity`, `CategoryName`
        
 */
    ?>
        <h2>Aggiorna prodotto</h2>

        <div class="form-group">
            <label>Nome</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" value="<?php echo $templateParams["food"]["nomeProd"]; ?>" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="inputSurname">Descrizione</label>
            <textarea id="inputDescr" name="inputDescr" rows="2" cols="50" class="form-control"><?php echo $templateParams["food"]["descrProd"]; ?></textarea>
        </div>

        <div class="form-group">
            <label>Prezzo €</label>
            <div class="input-group" id="show_hide_password">
                <input type="number" name="price" value="<?php echo $templateParams["food"]["prezzo"]; ?>" class="form-control" min=0.01 step=0.01>
            </div>
        </div>

        <div class="form-group">
            <label class="form-check-label" for="flexSwitchCheckDefault">Gluten Free</label>
            <div class="col-md-3">
                <div class="custom-control custom-checkbox no-gluten image-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ck1a" <?php if($templateParams["food"]["glutenFree"] == "1") echo "checked"; ?> name="gluten">
                    <label style="width: 200px" class="custom-control-label" for="ck1a">
                        <img src="<?php echo UPLOAD_DIR."gluten-free.jpg"; ?>" alt="gluten-free" class="img-fluid">
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <label>Quantità attuale:</label>
                <label><?php echo $templateParams["food"]["quantity"]; ?></label>
            </div>
            <div class="input-group">
                <label>Cambia quantità</label>
                <div class="input-group" id="show_hide_new_password">
                    <input type="number" name="quantityInput" class="form-control" value="<?php echo $templateParams["food"]["quantity"]; ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <div class="input-group">
                <select name="categoryInput" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <?php foreach($templateParams["category"] as $category): ?>
                    <option value="<?php echo $category["CategoryID"]; ?>" <?php if ($templateParams["food"]["CategoryName"]==$category["CategoryName"]) echo "selected"; ?>><?php echo $category["CategoryID"] . " - " . $category["CategoryName"]; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
<?php 
elseif($templateParams["editType"] == "new"):?>
        <h2>Aggiungi nuovo prodotto</h2>

        <div class="form-group">
            <label>Nome</label>
            <div class="input-group" id="show_hide_password">
                <input type="text" name="name" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputSurname">Descrizione</label>
            <textarea id="inputDescr" name="inputDescr" rows="2" cols="50" class="form-control" required> </textarea>
        </div>

        <div class="form-group">
            <label>Prezzo €</label>
            <div class="input-group" id="show_hide_password">
                <input type="number" name="price" value="1" class="form-control" min=0.01 step=0.01 required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-check-label" for="flexSwitchCheckDefault">Gluten Free</label>
            <div class="col-md-3">
                <div class="custom-control custom-checkbox no-gluten image-checkbox">
                    <input type="checkbox" class="custom-control-input" id="ck1a" name="gluten">
                    <label style="width: 200px" class="custom-control-label" for="ck1a">
                        <img src="<?php echo UPLOAD_DIR."gluten-free.jpg"; ?>" alt="gluten-free" class="img-fluid">
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Quantità disponibile</label>
            <div class="input-group">
                <input type="number" name="quantityInput" class="form-control" value="0" required>
            </div>
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <div class="input-group">
                <select name="categoryInput" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <?php foreach($templateParams["category"] as $category): ?>
                    <option value="<?php echo $category["CategoryID"]; ?>" ><?php echo $category["CategoryID"] . " - " . $category["CategoryName"]; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
        </div>
<?php
/*
<?php foreach($templateParams["category"] as $category): ?>
                        <option value="<?php echo $category["CategoryID"]; ?>" data-tokens="<?php echo $category["CategoryName"]; ?>"><?php echo $category["CategoryID"] . " - " . $category["CategoryName"]; ?></option>
                    <?php endforeach; ?>
*/

endif; ?>
            <input type="submit" class="btn btn-primary">
            <a href="login.php" class="btn btn-danger m-1">
                Annulla
            </a>
        </div>
    </form>
</div>