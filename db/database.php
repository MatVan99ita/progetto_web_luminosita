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
        $stmt = $this->db->prepare("SELECT nomeProd, prezzo, CategoryID, categoryName FROM prodotto, foodcategory WHERE prodotto.foodType =`CategoryID` ORDER BY RAND() LIMIT ?");
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

    public function userIsVendor($id){
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

        $query = "SELECT Nome, Cognome, Email, codUnibo, sesso, zoneConsegna, info_pagamento FROM utente INNER JOIN compratore ON utente.UserID = compratore.userID WHERE Email = ? AND utente.UserID = ?";
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
        $id = $utente[0]["UserID"];

        //...e lo inseriamo su compratore
        $sql="INSERT INTO `compratore`(`sesso`, `userID`) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss',$sesso, $id);
        $stmt->execute();

        //infine setto i cookie per i dati che servono per mantenere l'accesso
        if (isset($_COOKIE['id']) && isset($_COOKIE['mail']) && isset($_COOKIE['logged']) ) {
            unset($_COOKIE['id']);
            unset($_COOKIE['mail']);
            unset($_COOKIE['logged']);
        }
        setcookie("id", $id);
        setcookie("mail", $mail);
        setcookie("logged", true);
        
        return array(true, "Registrazione avvenuta con successo");
    }

    private function getHashedPassword(){
        $sql = "SELECT password, salt FROM utente WHERE Email = ? AND UserID = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $_COOKIE['mail'], $_COOKIE['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $ven = $result->fetch_all(MYSQLI_ASSOC);
        return $ven[0];
    }

    public function changePassword($old_pass, $new_pass){
        $db_privates = $this->getHashedPassword();

        $salt = $db_privates["salt"];
        $db_old_pass = $db_privates["password"];

        $new_pass = hash('sha512', $new_pass.$salt);
        $old_pass = hash('sha512', $old_pass.$salt);

        if($old_pass == $new_pass || $old_pass != $db_old_pass){
            return false;
        }

        $sql = "UPDATE `utente` SET `password`= $new_pass WHERE `Email`= ? AND `UserID` = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $_COOKIE["mail"], $_COOKIE["id"]);
        $stmt->execute();
        return true;
    }
    
    public function changeInfo($datas){
        return $datas;
    }

    public function updateProduct($datas){
    }

    public function refillProduct($quantity){
    }

    public function logout(){
    }

    public function logUser($mail, $password){
        
        echo("<br><br>");
        //UserID, Email, password, salt
        $info = $this->getUserLogInfo($mail);
        print_r($info);
        echo("<br><br>");
        // Crea una password usando la chiave appena creata.
        $password = hash('sha512', $password.$info[0]['salt']);
        
        echo($password);
        
        echo("<br><br>");
        echo($info[0]['password']);

        if($password == $info[0]["password"]){
            setcookie("id", $info[0]["UserID"]);
            setcookie("mail", $mail);
            setcookie("logged", true);
        }
    }
    

    private function getUserLogInfo($mail){
        $query = "SELECT UserID, Email, password, salt FROM utente WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $mail);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}