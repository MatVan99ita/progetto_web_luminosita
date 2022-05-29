<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ENAIP Verifica (prova)</title>
</head>
<body>
    <h2>Ricerca corsi disponibili</h2>
    <form action="ricerca.php" method="POST">
        <label for="inp-eta">Età:</label>
        <input type="numero" name="inp-eta">
        <br>
    <section>
        <label for="Stato">Stato di attività:</label>
        <select name="statolista" id="statolista">
            <option value="0" seleted>Occupato</option>
            <option value="1">Disoccupato</option>
        </select>
    </section>
    <!-- <section>
        <input type="radio" name="statoradio" value="0" checked>Round
        <input type="radio" name="statoradio" value="1">Ceil
        <input type="radio" name="statoradio" value="2">Floor
    </section> 
     <br>
    <section>
        <input type="checkbox" name="statocheck1" name="statocheck1" value="0">abs
        <input type="checkbox" name="statocheck2" name="statocheck2" value="1">sqrt
        <input type="checkbox" name="statocheck3" name="statocheck3" value="2">pow
    </section>
     -->
        <!-- <label for="mail">Email:</label>
        <input type="email" name="mail">
        <br>
        <label for="password">Password:</label>
        <input type="password" name=password> -->
        <br>
        <input type="submit" value="Cerca">
    </form>
</body>
</html>