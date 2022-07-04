<div id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
            </div>
            <div class="modal-body">
                <table>
<?php
    $tot_sos = 0;
    $tot_con = 0;
if(isset($_COOKIE["shoppingCart"])):
    $cookie_cart = json_decode($_COOKIE["shoppingCart"], true);
    foreach($cookie_cart as $cookie):
        $sum = $cookie["price"] * $cookie["count"];
        $tot_sos += $sum;
        $tot_con += $cookie["count"];
    ?>
    <tr>
        <td> <?php echo $cookie["name"]; ?> </td> 
        <td> <?php echo $cookie["price"]."€"; ?></td>
        <td>
            <div class='input-group'>
                <button class='minus-item input-group-addon btn btn-primary' data-id="<?php echo $cookie["id"]; ?>">-</button>
                <input type='number' style="width: 50px" class='item-count form-control' data-id="<?php echo $cookie["id"]; ?>" value="<?php echo $cookie["count"]; ?>"/>
                <button class='plus-item btn btn-primary input-group-addon' data-id="<?php echo $cookie["id"]; ?>">+</button>
            
            </div>
        </td>
        <td>
            <button class='delete-item btn btn-danger' data-id="<?php echo $cookie["id"]; ?>">X</button>
        </td>
        <td> 
            <div>
                <?php echo $sum."€"; ?> 
            </div>
        </td> 
    </tr>
    <?php 
    
    endforeach; 
endif;
?>
                </table>
                <div>Prezzo totale: € <span class="total-cart"><?php echo $tot_sos; ?></span></div>
                <div>Prodotti totali: <span class="total-count"><?php echo $tot_con; ?></span></div>
            </div>
            <div class="modal-footer">
                <a href="checkout.php" type="button" class="btn btn-primary">Order now</a>
                <a href="carrello.php" class="clear-cart btn btn-danger">Clear Cart</a><!-- Nav -->
            </div>
        </div>
    </div>
</div>

