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

    
    public function getFoodSpecificDetails($type) {
        $sql = "SELECT  
                    `prodottoID`, 
                     p.`vendorID`,
                    `CategoryID`, 
                    `CategoryName`,
                    `nomeProd`,
                    `descrProd`,
                    `glutenFree`,
                    `quantity`,
                    `prezzo`,
                    `venduto`,
                    `nomeAzienda` 
                FROM `prodotto` AS p LEFT JOIN `venditore` AS c1 ON p.vendorID = c1.vendorID
                LEFT JOIN `foodcategory` AS c2 ON p.foodType = c2.CategoryID
                WHERE `foodType` = ?;";
        /**SELECT 
         * `prodottoID`, 
         * `nomeProd`, 
         * `glutenFree`, 
         * `quantity`, 
         * `prezzo`, 
         * `nomeAzienda`, 
         * `CategoryName` 
         * FROM `prodotto` AS p LEFT JOIN `venditore` AS c1 ON p.vendorID = c1.vendorID 
         * LEFT JOIN `foodcategory` AS c2 ON p.foodType = c2.CategoryID 
         * WHERE `foodType` = ?; */
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $type);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function starRate($value){
        $val = $value / 5;
        if($val > 5) {
            return $this->starRate($val);
        }
        return $val;
    }

    public function getSpecificCat($id){
        $sql = "SELECT CategoryID, CategoryName FROM foodcategory WHERE CategoryID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUser($mail){
        $sql = "SELECT UserID, Nome, Cognome, Email, salt FROM utente WHERE Email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $mail);
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

        if(!$_COOKIE["vendors"]){
            /*
            Nome
            Cognome
            Email
            codUnibo
            sesso
            zoneConsegna
            info_pagamento
            */
            $query = "SELECT Nome, Cognome, Email, codUnibo, sesso, zoneConsegna, info_pagamento FROM utente INNER JOIN compratore ON utente.UserID = compratore.userID WHERE Email = ? AND utente.UserID = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $mail, $id);
        } else {
            /*
            nomeAzienda
            indirizzo
            orariConsegna
            contatto
            descrizione
            */
            $query = "SELECT Nome, Cognome, Email, nomeAzienda, indirizzo, orariConsegna, contatto, descrizione FROM utente INNER JOIN venditore ON utente.UserID = venditore.userID WHERE Email = ? AND utente.UserID = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $mail, $id);
        }

        
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_all(MYSQLI_ASSOC);
        return $user[0];
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
        $utente = $this->getUser($mail); //qui va sistemato
        $id = $utente[0]["UserID"];

        //...e lo inseriamo su compratore
        $sql="INSERT INTO `compratore`(`sesso`, `userID`) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss',$sesso, $id);
        $stmt->execute();

        //infine setto i cookie per i dati che servono per mantenere l'accesso
        if (isset($_COOKIE['id']) && isset($_COOKIE['mail']) && isset($_COOKIE['logged']) && isset($_COOKIE["vendors"]) ) {
            unset($_COOKIE['id']);
            unset($_COOKIE['mail']);
            unset($_COOKIE['logged']);
            unset($_COOKIE['vendors']);
        }
        setcookie("id", $id);
        setcookie("mail", $mail);
        setcookie("logged", true);
        setcookie("vendors", 0);
        
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
    
    public function changeInfo($nome, $cognome, $mail, $sex, $codUni, $consegna, $paga){

        $sql = "UPDATE `utente` SET `Nome` = ?, `Cognome` = ?, `Email` = ? WHERE UserID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssss', $nome, $cognome, $mail, $_COOKIE["id"]);
        $stmt->execute();
        if($this->db->error){
            print_r($this->db->error);
            return false;
        }

        $sql = "SELECT BuyerID FROM compratore WHERE UserID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $_COOKIE['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $ven = $result->fetch_all(MYSQLI_ASSOC);

        echo $ven[0]["BuyerID"];
        
        $sql="UPDATE `compratore` SET `codUnibo`= ?, `sesso` = ?, `zoneConsegna` = ?, `info_pagamento` = ? WHERE BuyerID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssss', $codUni, $sex, $consegna, $paga, $ven[0]["BuyerID"]);
        $stmt->execute();
        if($this->db->error){
            print_r($this->db->error);
            return false;
        }

        unset($_COOKIE['mail']);
        setcookie("mail", $mail);
        return true;
    }

    /*
    
    UPDATE `prodotto` SET 
    `nomeProd`='[value-2]',
    `descrProd`='[value-3]',
    `prezzo`='[value-4]',
    `glutenFree`='[value-5]',
    `quantity`='[value-6]',
    `foodType`='[value-8]' WHERE id = $id
    */
    public function updateProduct($nome, $descr, $prezzo, $gluten, $quantity, $type, $id) {
        $sql = "UPDATE `prodotto` SET nomeProd=?, descrProd=?, prezzo=?, glutenFree=?, foodType=? WHERE prodottoID=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssssss', $nome, $descr, $prezzo, $gluten, $type, $id);
        $stmt->execute();
        $this->refillProduct($quantity, $id);
        if($this->db->error){
            return false;
        }
        return true;
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM `prodotto` WHERE prodottoID=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        if($this->db->error){
            print_r($this->db->error);
            return false;
        }
        return true;
    }

    public function refillProduct($quantity, $id){
        $sql = "UPDATE `prodotto` SET quantity=? WHERE prodottoID=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $quantity, $id);
        $stmt->execute();
        if($this->db->error){
            print_r($this->db->error);
            return false;
        }
        return true;
    }

    public function addNewProduct($nome, $descr, $price, $gluten, $quantity, $cat){

        $sql = "SELECT `vendorID` FROM `venditore` WHERE `userID`= ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $_COOKIE["id"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $ven = $result->fetch_all(MYSQLI_ASSOC);
        $vendorID = $ven[0]["vendorID"];

        $sql = "INSERT INTO `prodotto`(`nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `vendorID`, `foodType`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssssss', $nome, $descr, $price, $gluten, $quantity, $vendorID, $cat);
        $stmt->execute();
        if($this->db->error){
            print_r($this->db->error);
            return false;
        }
        return true;
    }

    
    public function getVendorFoods($mail, $id){

        $sql = "SELECT vendorID FROM venditore WHERE userID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $ven = $result->fetch_all(MYSQLI_ASSOC);

        $sql = "SELECT `prodottoID`, `nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `CategoryName`, c1.vendorID 
        FROM `prodotto` AS p LEFT JOIN `venditore` AS c1 
        ON p.vendorID = c1.vendorID 
        LEFT JOIN foodcategory AS c2 
        ON p.foodType = c2.CategoryID 
        WHERE c1.vendorID = ?;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $ven[0]["vendorID"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $ven = $result->fetch_all(MYSQLI_ASSOC);

        return $ven;
        // `prodottoID`, `nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `CategoryName`, c1.vendorID

        /*
            SELECT `prodottoID`, `nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `CategoryName`, c1.vendorID 
            FROM `prodotto` AS p LEFT JOIN `venditore` AS c1 
            ON p.vendorID = c1.vendorID 
            LEFT JOIN foodcategory AS c2 
            ON p.foodType = c2.CategoryID 
            WHERE c1.vendorID = ?;
        */
        /*
            SELECT p. p_id, p.cus_id, p.p_name, c1.name1, c2.name2  
            FROM product AS p  
            LEFT JOIN customer1 AS c1  
            ON p.cus_id=c1.cus_id  
            LEFT JOIN customer2 AS c2  
            ON p.cus_id = c2.cus_id  
        */
    }

    public function logUser($mail, $password){
        
        echo("<br><br>");
        //UserID, Email, password, salt
        $info = $this->getUserLogInfo($mail);
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
            setcookie("vendors", $info[0]["vendors"]);
        }
    }
    

    private function getUserLogInfo($mail){
        $query = "SELECT UserID, Email, vendors, password, salt FROM utente WHERE Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $mail);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function addVendor($nome, $cognome, $mail, $password, $nomeAzienda, $contatto, $indirizzo, $periodo, $descr){

        // Crea una chiave casuale
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // Crea una password usando la chiave appena creata.
        $password = hash('sha512', $password.$random_salt);
        
        $sql = "INSERT INTO `utente`(`Nome`, `Cognome`, `Email`, `password`, `salt`, `vendors`) 
        VALUES (?, ?, ?, ?, ?, 1)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('sssss',$nome, $cognome, $mail, $password, $random_salt);
        $stmt->execute();
        
        /*controllo se la query è andata a buon fine poichè nel db la mail è un valore unico per utente e 
        quindi non serve un controllo sull'esistenza dell'utente*/
        if($this->db->error){
            return array(false, "$mail esiste già");
        }

        $utente = $this->getUser($mail);
        $id = $utente[0]["UserID"];

        $sql="INSERT INTO `venditore`(`nomeAzienda`, `indirizzo`, `orariConsegna`, `contatto`, `descrizione`, `userID`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssssss', $nomeAzienda, $indirizzo, $periodo, $contatto, $descr, $id);
        $stmt->execute();

        //infine setto i cookie per i dati che servono per mantenere l'accesso
        if (isset($_COOKIE['id']) && isset($_COOKIE['mail']) && isset($_COOKIE['logged']) && isset($_COOKIE["vendors"]) ) {
            unset($_COOKIE['id']);
            unset($_COOKIE['mail']);
            unset($_COOKIE['logged']);
            unset($_COOKIE['vendors']);
        }
        setcookie("id", $id);
        setcookie("mail", $mail);
        setcookie("logged", true);
        setcookie("vendors", 1);
        
        return array(true, "Registrazione avvenuta con successo");
    }

}