<?php require_once("bootstrap.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Luminosità - Official Web Site for UniBo</title>
</head>
<body>

    <section>
        <?php
        $dbo = new Database();
        $query = "SELECT * FROM utente";
        $dbo->query($query);
        $dbo->execute();
        $info = $dbo->resultset();
        print_r($info);
        ?>
    </section>
        <br>
        <input type="submit" value="Cerca">
    </form>
</body>
</html>