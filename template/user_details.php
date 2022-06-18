

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php
//getAllUserLoggedInfo($mail, $id, $pass, $salt){
$utente = $templateParams["user"][0];
print_r($utente);
/**
 * Array ( [0] => UserID [1] => Nome [2] => Cognome [3] => Email 
 * [4] => password [5] => salt [6] => vendors [7] => BuyerID 
 * [8] => codUnibo [9] => sesso [10] => zoneConsegna 
 * [11] => info_pagamento [12] => userID )
 */
?>
<div class="container" id="art">
        <h2>Dashboard</h2>
        <div>
            <input type="text" value="<?php echo $utente["Nome"]; ?>" disabled /><br>
            <input type="text" value="<?php echo $utente["Cognome"]; ?>" disabled /><br>
            <input type="text" value="<?php echo $utente["Email"]; ?>" disabled /><br>
            <input type="text" value="<?php echo $utente["sesso"]; ?>" disabled /><br>
            <input type="text" value="<?php echo $utente["zoneConsegna"]; ?>" placeholder="Data missing" disabled /><br>
            <input type="text" value="<?php echo $utente["info_pagamento"]; ?>" placeholder="Data missing" disabled /><br>
        </div>
        <div>
            <a href="change_data.php?datas" class="btn btn-warning m-1">
                Cambia dati
            </a>
        </div>
        <div>
            <a href="change_data.php?passData" class="btn btn-danger m-1">
                Cambia password
            </a>
        </div>
    <center>
        <div class="container">
  
            <h1 style="text-align:center;color:green;"> 
            GeeksforGeeks 
            </h1>
            <h3>
            To make horizontal scrollable in a bootstrap row?
            </h3>
            <div class="container horizontal-scrollable">
                <div class="row text-center">
                    <div class="col-xs-4">1</div>
                    <div class="col-xs-4">2</div>
                    <div class="col-xs-4">3</div>
                    <div class="col-xs-4">4</div>
                    <div class="col-xs-4">5</div>
                    <div class="col-xs-4">6</div>
                    <div class="col-xs-4">7</div>
                </div>
            </div>
        </div>
    </center>
</div>