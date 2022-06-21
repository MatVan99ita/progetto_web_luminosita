

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php
//getAllUserLoggedInfo($mail, $id, $pass, $salt){
$utente = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);

// Nome
$nome = $utente[0]["Nome"];

// Cognome,
$cognome = $utente[0]["Cognome"];

// Email,
$mail = $utente[0]["Email"];

// codUnibo,
$unicode = $utente[0]["codUnibo"];

// sesso,
$sesso = $utente[0]["sesso"];

// zoneConsegna,
$consegne = $utente[0]["zoneConsegna"];

// info_pagamento
$pagah = $utente[0]["info_pagamento"];

/**
 * Array ( [0] => UserID [1] => Nome [2] => Cognome [3] => Email 
 * [4] => password [5] => salt [6] => vendors [7] => BuyerID 
 * [8] => codUnibo [9] => sesso [10] => zoneConsegna 
 * [11] => info_pagamento [12] => userID )
 */
?>
<div class="container" id="art">
        <form id="user_det" action="#" method="POST">
            <h2>Dashboard</h2>

            <div class="form-group">
                <label>Utente: </label>
                <label><?php echo $nome." ".$cognome; ?></label>
            </div>
            <div class="form-group">
                <label>Mail: </label>
                <label><?php echo $mail; ?></label>
            </div>
            <div class="form-group">
                <label>Sesso: </label>
                <label><?php echo $sesso; ?></label>
            </div>
            <div class="form-group">
                <label>Cod. UniBo: </label>
                <label><?php echo $unicode; ?></label>
            </div>
            <div class="form-group">
                <label>Zone consegna: </label>
                <label><?php echo $consegne; ?></label>
            </div>
            <div class="form-group">
                <label>Info pagamento: </label>
                <label><?php echo $pagah; ?></label>
            </div>
        </form>

        <div>
            <a href="change_data.php?datas" class="btn btn-warning m-1">
                Cambia dati
            </a>
            
            <a href="change_data.php?passData" class="btn btn-danger m-1">
                Cambia password
            </a>

            <a href="login.php" onclick="deleteAllCookies()" class="btn btn-danger m-1">
                Logout
            </a>
        </div>

        <div class="container">
  
            <h1 style="text-align:center;color:green;"> 
            GeeksforGeeks 
            </h1>
            <h3>
            To make horizontal scrollable in a bootstrap row?
            </h3>
            <div class="container horizontal-scrollable">
            <div class="row text-center">
                <?php foreach(range(0,40) as $i): ?>
                    <div id="user_food" class="col-3" media="screen and (min-width: 480px) and (max-width: 1920px)">
                        <div class="card-header">
                            <h2 class="card-title"><?php echo "CIBO"; ?></h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo "BUONP"; ?></p>
                            <a href="#">Vai ai prodotti</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
</div>

<div id="change_data_form" class="container justify-content-center col-md-12">
    
</div>