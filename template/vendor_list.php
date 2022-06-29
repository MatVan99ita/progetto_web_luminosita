<?php 

print("<pre>".print_r($templateParams["lista"],true)."</pre>");?>
<?php

/*[vendite_tot]
  [nomeAzienda]
  [orariConsegna]
  [contatto]
  */
foreach($templateParams["lista"] AS $vendor):
?>

<div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                        <div class="details col-md-6">
                            <a href="foodVendor.php?spec&id=<?php echo $vendor["vendorID"]; ?>"><h3 class="product-title"><?php echo $vendor["nomeAzienda"]; ?></h3></a>
                        </div>
                        <h4 class="price">Orari di consegna: <span><?php echo $vendor["orariConsegna"]; ?></span></h4>
                        <h4 class="price">Contatto: <span> <?php echo $vendor["contatto"]; ?></span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>