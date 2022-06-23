
<div id="login_form" class="container justify-content-center col-md-12">
    <form action="product_details.php" method="POST">
<?php 


if($templateParams["editType"] == "refill"): ?>
        <h2>Refill prodotto</h2>
        <div class="form-group">
            <label>Quantità attuale:</label>
            <label><?php echo $templateParams["food"]["quantity"]; ?></label>
        </div>

        <div class="form-group">
            <label>Cambia quantità</label>
            <div class="input-group" id="show_hide_new_password">
                <input type="number" name="quantityInput" class="form-control" value="<?php echo $templateParams["food"]["quantity"]; ?>">
            </div>
    <div>
<?php
elseif($templateParams["editType"] == "edit"):
    //`nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `CategoryName`
    /*
    $templateParams["editType"] = $url[0];
    $templateParams["category"] = $dbh->getFoodTypes();
    $templateParams["food"] = $dbh->getFoodByID($url[1]);
    `glutenFree`, `quantity`, `CategoryName`
        
 */
    ?>
    
        <h2>Cambio dati</h2>

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
                <input type="number" name="price" value="<?php echo $templateParams["food"]["prezzo"]; ?>" class="form-control" min=0.0 step="any">
            </div>
        </div>

        <div class="form-group">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" <?php if ($templateParams["food"]["glutenFree"] == "0") echo "checked"; ?>/>
                <label class="form-check-label" for="flexSwitchCheckDefault">Gluten Free</label>
            </div>
        </div>

        <div class="form-group">
            <div class="form-group">
                <label>Quantità attuale:</label>
                <label><?php echo $templateParams["food"]["quantity"]; ?></label>
            </div>
            <div class="form-group">
                <label>Cambia quantità</label>
                <div class="input-group" id="show_hide_new_password">
                    <input type="number" name="quantityInput" class="form-control" value="<?php echo $templateParams["food"]["quantity"]; ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Categoria</label>
            <div class="input-group">
                <select class="selectpicker" data-live-search="true" data-dropup-auto="true" style="width: 'auto'">
                    <option data-tokens="porco">bananan1</option>
                    <option data-tokens="dio">bananan2</option>
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