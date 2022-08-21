
<div id="login_form" class="container justify-content-center">
    
    <?php  ?>
    <form action="enterDashboard.php" method="POST"> 
    <h2>Login</h2>
    <div class="form-group">
        <label for="InputEmail1">Email address</label>
        <input type="email" class="form-control" id="InputEmail" name="mail" aria-describedby="emailHelp" placeholder="Enter email" value="<?php if(isset($_GET["mail"])) echo $_GET["mail"]; ?>">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="InputPassword1">Password</label>
        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
    </div>
    <input type="submit" class="btn btn-primary" value="Login"></input>
    </form>
    
    <a href="register.php">Crea un account</a>
</div>