

<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<?php

print_r($templateParams["foods"]);

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
<?php
//############################################################################
?>
    <h3>Lista prodotti</h3>
    <table class="table table-striped table-bordered" style="width: 1000px">
        <thead>
            <tr>
            <?php foreach($templateParams["foods"][0] as $key => $food):
                echo "<th scope='col'>".$key."</th>";
                endforeach; ?>
                <th scope='col'>Edit</th>
                <th scope='col'>Refill</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($templateParams["foods"] as $food): ?>
            <tr>
                <?php 
                    foreach($food as $key => $det):
                    echo "<td>".$det."</td>";
                    if($key == "vendorID"): ?>
                        <th scope='col'><a class="btn btn-warning" href="product_edit.php?edit&id=<?php echo $food["prodottoID"]; ?>">Edit</a></th>
                        <th scope='col'><a class="btn btn-warning" href="product_edit.php?refill&id=<?php echo $food["prodottoID"]; ?>">Refill</a></th>
                <?php endif;
                endforeach;
                ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php 
    /**
     * Array ( 
     * [prodottoID] => 3 
     * [nomeProd] => Panino con la mortadella 
     * [descrProd] => La mortazza Bologna IGP 
     * [prezzo] => 0 
     * [glutenFree] => 0 
     * [quantity] => 50 
     * [CategoryName] => Panini 
     * [vendorID] => 3 )
     */?>
</div>

<div id="change_data_form" class="container justify-content-center col-md-12">
    
</div>