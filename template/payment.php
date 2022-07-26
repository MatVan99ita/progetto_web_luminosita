<div id="register_form" class="container justify-content-center col-md-12">
    <form action="end_checkout.php" method="POST">
        <h2>Checkout</h2>

<?php
if($templateParams["paga"] == "NotSaved"):
    //Qua vanno le cose per immettere il pagamento e salvarlo in caso
    ?>
    
        <div class="form-group">
            <label for="paymentText">Pagamento: </label>
            <input id="paymentText" name="paymentText" type="text" class="form-control" placeholder="Enter payment info" required>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckPay">
              <label class="form-check-label" for="flexSwitchCheckPay">Salva per pagamenti futuri</label>
            </div>
        </div>

        <div class="form-group">
            <label for="zoneText">Zona consegna: </label>
            <input id="zoneText" name="zoneText" type="text" class="form-control" placeholder='Scrivi dove vorresti che arrivasse il tuo cibo(Default: Segreteria piano terra)' <?php if(!empty($templateParams["luogo"])): ?> value="<?php echo $templateParams["luogo"]; ?>" <?php endif; ?> required>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckZone">
              <label class="form-check-label" for="flexSwitchCheckZone">Salva per consegne future</label>
            </div>
        </div>

<?php else:
    //Qua si dice chè è stato pagato e bottone per tornare alla home
?>

        <div class="form-group">
            <label for="paymentText">Pagamento: </label>
            <input id="paymentText" name="paymentText" type="text" class="form-control" value="<?php echo $templateParams["paga"]; ?>" required>
            <input type="hidden" id="hiddenPay" name="paymentText" class="form-control" value="<?php echo $templateParams["paga"]; ?>">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="flexSwitchCheckPay" id="flexSwitchCheckPay" value="true">
              <label class="form-check-label" for="flexSwitchCheckPay">Salva per pagamenti futuri</label>
            </div>
            <button class="btn btn-primary" id="paymentBtn" onclick="enablePay()">Cambia dati pagamento</button>
        </div>
    
        <div class="form-group">
            <label for="zoneText">Zona consegna: </label>
            <input id="zoneText" name="zoneText" type="text" class="form-control" placeholder='Scrivi dove vorresti che arrivasse il tuo cibo(Default: Segreteria piano terra)' <?php if(!empty($templateParams["luogo"])): ?> value="<?php echo $templateParams["luogo"]; ?>" <?php endif; ?> required>
            <input type="hidden" id="hiddenZone" name="zoneText" class="form-control" <?php if(!empty($templateParams["luogo"])): ?> value="<?php echo $templateParams["luogo"]; ?>" <?php endif; ?>>
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="flexSwitchCheckZone" id="flexSwitchCheckZone" value="true">
              <label class="form-check-label" for="flexSwitchCheckZone">Salva per consegne future</label>
            </div>
            <button class="btn btn-primary" id="zoneBtn" onclick="enableZone()">Cambia zona consegna</button>
        </div>

<?php endif; ?>

        <div class="form-group">
            <label for="timeText">Orario di consegna:</label>
            <input id="timeText" name="timeText" type="datetime-local" class="form-control">
            <label style="font-size: 13px; color: red" for="">Le date non idonee valgono come di seguito: 1 ora dalla richiesta o appena disponibile negli orari di consegna del venditore</label>
        </div>

        <button type="submit" id="submit" class="btn btn-success total-cart-checkout"></button>
    </form>
</div>

