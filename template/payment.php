<?php

$paga = $templateParams["paga"];

if($paga == "NotSaved"):
    //Qua vanno le cose per immettere il pagamento e salvarlo in caso
    ?>
    <input type="text" name="" id="" class="form-group" value="banana">
    <input type="checkbox" name="saveCheck" id="saveCheck" class="form-group">
    <label for="saveCheck">Salva per pagamenti futuri</label>
<?php else:
    //Qua si dice chè è stato pagato e bottone per tornare alla home
?>
<input type="text" name="paymentText" id="paymentText" class="form-group" value="<?php echo $paga; ?>">
<input type="checkbox" name="saveCheck" id="saveCheck" class="form-group" checked>
<button class="btn btn-primary" id="paymentBtn" onclick="enableText()">Cambia dati pagamento</button>
<label for="saveCheck">Salva per pagamenti futuri</label>

<?php endif; ?>

<input type="button" value="€$ PAGAH $€" class="btn btn-success">