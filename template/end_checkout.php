<?php 
    
    if(isset($templateParams["ERROR_save"])) {
        if( isset($templateParams["ERROR_pay"])) {
            echo "<span>".$templateParams["ERROR_save"]."</span><br><span>".$templateParams["ERROR_pay"]."</span>";
        }
        else {
            echo "<span>".$templateParams["ERROR_save"]."</span>";
        }
    }
    else{
        echo "<h4>Ordine andato a buon fine</h4>";
    }
    $_SESSION["end_check"] = true;
        
 ?>