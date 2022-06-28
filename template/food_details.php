<h2>PRODOTTO</h2>
<?php /*`prodottoID`, 
p.`vendorID`,
`CategoryID`, 
`CategoryName`,
`nomeProd`,
`descrProd`,
`glutenFree`,
`quantity`,
`prezzo`,
`nomeAzienda`*/?>
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
        <div class="custom-control custom-checkbox image-checkbox">
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
        </select>
    </div>
</div>