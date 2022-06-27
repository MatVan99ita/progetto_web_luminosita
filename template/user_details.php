

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php
//getAllUserLoggedInfo($mail, $id, $pass, $salt){
$utente = $dbh->getAllUserLoggedInfo($_COOKIE["mail"], $_COOKIE["id"]);
// Nome
$nome = $utente["Nome"];

// Cognome,
$cognome = $utente["Cognome"];

// Email,
$mail = $utente["Email"];

// codUnibo,
$unicode = $utente["codUnibo"];

// sesso,
$sesso = $utente["sesso"];

// zoneConsegna,
$consegne = $utente["zoneConsegna"];

// info_pagamento
$pagah = $utente["info_pagamento"];

/**
 * Array ( [0] => UserID [1] => Nome [2] => Cognome [3] => Email 
 * [4] => password [5] => salt [6] => vendors [7] => BuyerID 
 * [8] => codUnibo [9] => sesso [10] => zoneConsegna 
 * [11] => info_pagamento [12] => userID )
 */
?>

<div class="container" id="art">
        <table class="table table-striped table-bordered" style="width: 1000px">
        <thead>
            <tr>
                <th scope="col"><h2>Dashboard</h2></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" style="width: 10%">•</th>
                <td style="width: 100px"><h5>Utente:</h5></td>
                <td style="width: 100px"><?php echo $nome." ".$cognome; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Mail:</h5></td>
                <td><?php echo $mail; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Sesso:</h5></td>
                <td><?php echo $sesso; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Cod. Unibo:</h5></td>
                <td><?php echo $unicode; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Zone consegna:</h5></td>
                <td><?php echo $consegne; ?></td>
            </tr>
            
            <tr>
                <th scope="row">•</th>
                <td><h5>Info pagamento:</h5></td>
                <td><?php echo $pagah; ?></td>
            </tr>
        </tbody>
        </table>
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
        
        <h3 for="scrollmenu">Prodotti consigliati</h3>
        <div class="scrollmenu" id="scrolling">
            <?php foreach($templateParams["randomFoods"] as $food): 
                $img = CAT_DIR.$food["CategoryID"].". ".$food["categoryName"].".jpg"; 
                ?>
                <a href="foodCategory.php?id=<?php echo $food["CategoryID"]; ?>&list-type=container" class="card">
                    <section>
                        <img alt="immmagina puaoi" src="<?php echo $img; ?>"></img>
                        <h2 class="card-title"><?php echo $food["nomeProd"]; ?></h2>
                        <p class="card-text"><?php echo $food["prezzo"]."€"; ?></p>
                        <p class="card-text"><?php echo $food["categoryName"]; ?></p>
                    </section>
                </a>
            <?php endforeach; ?>
        </div>
        
</div>

<div id="change_data_form" class="container justify-content-center col-md-12">
    
</div>