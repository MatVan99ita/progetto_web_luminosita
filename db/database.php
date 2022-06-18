<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getRandomFoods($n){
        $stmt = $this->db->prepare("SELECT * FROM prodotto ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFoodTypes(){
        $stmt = $this->db->prepare("SELECT CategoryID, CategoryName, CategoryDescr FROM foodcategory");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFoodByType($type){
        $sql = "SELECT CategoryID, CategoryName, prodottoID, nomeProd, descrProd, glutenFree, quantity, nomeAzienda FROM prodotto, foodcategory, venditore WHERE foodType = ? GROUP BY(nomeProd);";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $type);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSpecificCat($id){
        $sql = "SELECT CategoryID, CategoryName FROM foodcategory WHERE CategoryID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUser($mail, $pass){
        $sql = "SELECT UserID, Nome, Cognome, Email, salt FROM utente WHERE Email = ? AND password = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $mail, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        $ven = $result->fetch_all(MYSQLI_ASSOC);
        return $ven;
    }

    public function userIsVendors($id){
        $sql = "SELECT vendors from utente where id= ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $ven = $result->fetch_all(MYSQLI_ASSOC);
        echo $ven;
        return $ven["vendors"]==0;
    }

    public function getAllUserLoggedInfo($mail, $id){
        
        /*
        UserID      <- non serve
        Nome
        Cognome
        Email
        password    <- non serve(ma va controllata ogni volta dal form che la invia in chiaro)
        salt        <- per le cose di hashing
        vendors     <- per generare la seconda parte di template
        BuyerID     <- non serve
        codUnibo
        sesso
        zoneConsegna
        info_pagamento
        userID      <- non serve
        */

        $query = "SELECT * FROM utente INNER JOIN compratore ON utente.UserID = compratore.userID WHERE Email = ? AND utente.UserID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $mail, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addUser($nome, $cognome, $mail, $sesso, $password){

        // Crea una chiave casuale
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // Crea una password usando la chiave appena creata.
        $password = hash('sha512', $password.$random_salt);

        //setto i cookie per la criptazione
        if(isset($_COOKIE["salt"])){
            unset($_COOKIE["salt"]);
            setcookie("salt", $random_salt);
        } else {
            setcookie("salt", $random_salt);
        }
        $sql = "INSERT INTO `utente`(`Nome`, `Cognome`, `Email`, `password`, `salt`, `vendors`) 
        VALUES (?, ?, ?, ?, ?, 0)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssss',$nome, $cognome, $mail, $password, $random_salt);
        $stmt->execute();
        
        /*controllo se la query è andata a buon fine poichè nel db la mail è un valore unico per utente e 
        quindi non serve un controllo sull'esistenza dell'utente*/
        if($this->db->error){
            return array(false, "$mail esiste già");
        }
        
        //se non entra nell'if aggiungerà l'utente anche sulla tabella compratore

        //prendiamo l'id dell'utente appena creato...
        $utente = $this->getUser($mail, $password); //qui va sistemato
        print_r($utente[0]);
        $id = $utente[0]["UserID"];

        //...e lo inseriamo su compratore
        $sql="INSERT INTO `compratore`(`sesso`, `userID`) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss',$sesso, $id);
        $stmt->execute();

        //infine setto i cookie per i dati che servono per mantenere l'accesso
        if (isset($_COOKIE['id']) && isset($_COOKIE['mail']) && isset($_COOKIE['logged'])) {
            unset($_COOKIE['id']);
            unset($_COOKIE['mail']);
            unset($_COOKIE['logged']);
            setcookie("id", $id);
            setcookie("mail", $mail);
            setcookie("logged", true);
        } else {
            setcookie("id", $id);
            setcookie("mail", $mail);
            setcookie("logged", true);
        }
        
        return array(true, "Registrazione avvenuta con successo");
    }

}