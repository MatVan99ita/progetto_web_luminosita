<div id="login_form" class="container justify-content-center col-md-12">
    <form action="" method="POST">
        <div class="form-group">
            <div class="input-group">
        <?php
        
        if($templateParams["easter_egg"]==66): ?>
            <img src="<?php echo UPLOAD_DIR."easter_egg.png";?>" alt="">
        <?php else: ?>
            <h3>Sicuro di volerlo eliminare?</h3>
        <?php endif; ?>
            </div>
            <div class="action">
                <input name="answer" value="SI" type="submit" class="btn btn-danger"/>
                <a href="login.php" class="btn btn-success">NO</a>
            </div>
        </div>
    </form>
</div>