<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function printFormattedArray($array){
        print("<pre>".print_r($array,true)."</pre>");
    }

    public function timestampToAArray($timestamp)
    {
        $divided = explode(" ", $timestamp);
        $temp_calendar = explode("-", $divided[0]);
        $temp_clock = explode(":", $divided[1]);
        $calendar = array("day"=>$temp_calendar[2], "month"=>$temp_calendar[1], "year"=>$temp_calendar[0]);
        $clock = array("hour"=>$temp_clock[0], "minutes"=>$temp_clock[1], "seconds"=>$temp_clock[2]);
        return array("calendar"=>$calendar, "clock"=>$clock);
    }

    public function printFormattedTimestamp($timestamp)
    {
        $new_t = $this->timestampToAArray($timestamp);
        $cal = $new_t["calendar"];
        $clk = $new_t["clock"];
        return $cal["day"]."/".$cal["month"]."/".$cal["year"]." ".$clk["hour"].":".$clk["minutes"].":".$clk["seconds"];
    }

    public function getRandomFoods($n){
        $sql = "SELECT 
                    `prodottoID`, 
                    `nomeProd`, 
                    `descrProd`, 
                    `prezzo`, 
                    `glutenFree`, 
                    `quantity`, 
                    `CategoryName`, 
                    `CategoryID`, 
                    c1.vendorID, 
                    `venduto`, 
                    `nomeAzienda`, 
                    c1.vendorID 
                FROM `prodotto` AS p LEFT JOIN `venditore` AS c1 ON p.vendorID = c1.vendorID 
                LEFT JOIN foodcategory AS c2 ON p.foodType = c2.CategoryID 
                WHERE p.foodType =`CategoryID` 
                ORDER BY RAND() LIMIT ?;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFoodByID($id)
    {
        $sql = "SELECT * FROM prodotto as p LEFT JOIN foodcategory as fc ON p.foodType = fc.CategoryID WHERE prodottoID = ?;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        $food = $result->fetch_all(MYSQLI_ASSOC);
        return $food[0];
    }

    public function getFoodTypes(){
        $stmt = $this->db->prepare("SELECT CategoryID, CategoryName, CategoryDescr FROM foodcategory");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchFoodName($text){
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
        WHERE nomeProd LIKE '%".$text."%' ORDER BY `nomeProd`;";
        $stmt = $this->db->prepare($sql);
        //$stmt->bind_param('s', $text);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchFoodNameAndCategory($text, $id){
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
        WHERE `nomeProd` LIKE '%".$text."%' AND c2.CategoryID = ? ORDER BY `nomeProd`;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $id);
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
        $sql = "SELECT CategoryID, CategoryName, CategoryDescr FROM foodcategory WHERE CategoryID = ?";
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
        return $ven["vendors"]==0;
    }

    public function getAllUserLoggedInfo($mail, $id){

        if($_COOKIE["vendors"]==0){
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

        $sql = "UPDATE `utente` SET `password`= ? WHERE `Email`= ? AND `UserID` = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sss", $new_pass, $_COOKIE["mail"], $_COOKIE["id"]);
        $stmt->execute();
        return true;
    }
    
    public function changeInfo($post){
        $this->printFormattedArray($post);

        
        $sql = "UPDATE `utente` SET `Nome` = ?, `Cognome` = ?, `Email` = ? WHERE UserID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssss', $post["nome"], $post["cognome"], $post["mail"], $_COOKIE["id"]);
        $stmt->execute();
        if($this->db->error){
            $this->printFormattedArray($this->db->error);;
            return false;
        }

        if($_COOKIE["vendors"]==0) {

            $sql = "SELECT BuyerID FROM compratore WHERE UserID = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('s', $_COOKIE['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $ven = $result->fetch_all(MYSQLI_ASSOC);

            $sql="UPDATE `compratore` SET `codUnibo`= ?, `sesso` = ?, `zoneConsegna` = ?, `info_pagamento` = ? WHERE BuyerID = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('sssss', $post["cod_unibo"], $post["sex"], $post["consegna"], $post["pagamento"], $ven[0]["BuyerID"]);
            $stmt->execute();

        } else {
            $sql = "SELECT vendorID FROM venditore WHERE UserID = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('s', $_COOKIE['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $ven = $result->fetch_all(MYSQLI_ASSOC);
            $this->printFormattedArray($ven);
            //
            $sql="UPDATE `venditore` SET `nomeAzienda`= ?, `indirizzo`= ?, `orariConsegna`= ?, `contatto`= ?, `descrizione`= ? WHERE `vendorID`=?;";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('ssssss', $post["inputAzienda"], $post["inputIndirizzo"], $post["inputOrari"], $post["inputContatti"], $post["inputDescr"], $ven[0]["vendorID"]);
            $stmt->execute();
        }
        
        if($this->db->error){
            $this->printFormattedArray($this->db->error);;
            return false;
        }
        unset($_COOKIE['mail']);
        setcookie("mail", $post["mail"]);
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
            $this->printFormattedArray($this->db->error);;
            return false;
        }
        return true;
    }

    
    public function getVendorFoods($id){

        $sql = "SELECT vendorID FROM venditore WHERE userID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $ven = $result->fetch_all(MYSQLI_ASSOC);

        $sql = "SELECT `prodottoID`, `nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `CategoryName`, c2.CategoryID, c1.vendorID, `venduto` 
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
        
        //echo("<br><br>");
        //UserID, Email, password, salt
        $info = $this->getUserLogInfo($mail);
        //echo("<br><br>");
        // Crea una password usando la chiave appena creata.
        $password = hash('sha512', $password.$info[0]['salt']);
        /*
        echo($password);
        
        echo("<br><br>");
        echo($info[0]['password']);*/

        if($password == $info[0]["password"]){
            $inTwoMonths = 60 * 60 * 24 * 60 + time();
            setcookie("id", $info[0]["UserID"], $inTwoMonths);
            setcookie("mail", $mail, $inTwoMonths);
            setcookie("logged", true, $inTwoMonths);
            setcookie("vendors", $info[0]["vendors"], $inTwoMonths);
            return $info;
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

    /**
     * Lista generica con poche informazioni dei venditori
     */
    public function vendorList(){
        /*
        SELECT SUM(venduto) AS tot_prod, v.nomeAzienda, orariConsegna, contatto 
        FROM `prodotto` AS p, `venditore` AS v 
        WHERE p.vendorID=v.vendorID 
        GROUP BY v.nomeAzienda;
        */
        $sql = "SELECT SUM(venduto) AS vendite_tot, nomeAzienda, orariConsegna, contatto, v.vendorID FROM `prodotto` AS p, `venditore` AS v WHERE p.vendorID=v.vendorID GROUP BY nomeAzienda ORDER BY vendite_tot DESC;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Dettagli specifici di un venditore
     */
    public function specificVendorList($id){
        //$sql = "SELECT `vendorID`, `nomeAzienda`, `indirizzo`, `orariConsegna`, `contatto`, `descrizione`, `Email`, `Nome`, `Cognome` FROM `venditore` AS v LEFT JOIN `utente` AS u ON v.userID=u.userID WHERE vendorID = ?;";
        $sql="SELECT u.UserID, v.`vendorID`, `nomeAzienda`, `indirizzo`, `orariConsegna`, `contatto`, `descrizione`, `Email`, `Nome`, `Cognome` FROM `venditore` AS v LEFT JOIN `utente` AS u ON v.userID=u.UserID WHERE v.`vendorID` = ?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC);
        return $res[0];
        /*
        ########################

        vendorID
        nomeAzienda *
        indirizzo *
        orariConsegna *
        contatto *
        descrizione *
        userID
        
        ########################
        
        prodottoID
        nomeProd
        descrProd
        prezzo
        glutenFree
        quantity
        venduto
        vendorID
        foodType

        ########################
        */
    }

    
    public function specificVendorFoodList($id){
        $sql = "SELECT `prodottoID`, `nomeProd`, `descrProd`, `prezzo`, `glutenFree`, `quantity`, `CategoryName`, `CategoryID`, c1.vendorID, `venduto`, `nomeAzienda`, c1.vendorID
        FROM `prodotto` AS p LEFT JOIN `venditore` AS c1 
        ON p.vendorID = c1.vendorID 
        LEFT JOIN foodcategory AS c2 
        ON p.foodType = c2.CategoryID 
        WHERE c1.vendorID = ?
        ORDER BY `venduto` DESC;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * operation => + / - / =
     */
    public function changeQuantity($id, $quantity, $operation){
        if($operation != "=") {
            $sql = "SELECT quantity FROM prodotto WHERE prodottoID=?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $remain = $result->fetch_all(MYSQLI_ASSOC)[0]["quantity"];
            switch($operation){
                case '+':
                    $new_quantity = $remain + $quantity;
                    $err = $this->updateQuantity($new_quantity, $id);
                    break;
    
                case '-':
                    if($remain < $quantity){
                        echo "Quantità non disponibile";
                        return false;
                    }
                    $remain = $remain - $quantity;
                    $new_quantity = $remain < 0 ? 0 : $remain;
                    $err = $this->updateQuantity($new_quantity, $id);
                    break;
            }
        } else {
            $q = $quantity < 0 ? 0 : $quantity;
            $err = $this->updateQuantity($q, $id);
        }
        return $err;
    }


    public function updateProduct($op, $nome, $descr, $prezzo, $gluten, $quantity, $type, $id) {
        $sql = "UPDATE `prodotto` SET nomeProd=?, descrProd=?, prezzo=?, glutenFree=?, foodType=? WHERE prodottoID=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ssssss', $nome, $descr, $prezzo, $gluten, $type, $id);
        $stmt->execute();
        $this->changeQuantity($quantity, $id, $op);
        if($this->db->error){
            return false;
        }
        return true;
    }

    private function updateQuantity($new_quantity, $id){
        $new = $new_quantity < 0 ? 0 : $new_quantity;
        $sql = "UPDATE `prodotto` SET `quantity`=? WHERE `prodottoID`=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('ss', $new, $id);
        $stmt->execute();
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
            $this->printFormattedArray($this->db->error);;
            return false;
        }
        return true;
    }

    public function saveCheckout($userID, $savePay, $payInfo, $saveZone, $zoneInfo){
        
        $sql = "UPDATE `compratore` SET ";
        if($savePay)
            $sql .= "`info_pagamento` = ?". ($saveZone? ", ":" ");
        if($saveZone)
            $sql .= "`zoneConsegna` = ? ";
        $sql .= "WHERE `userID` = ?";

        
        $stmt = $this->db->prepare($sql);

        if($savePay && $saveZone) {
            $stmt->bind_param("sss", $payInfo, $zoneInfo, $userID);
        } else if($savePay && !$saveZone) {
            $stmt->bind_param("ss", $payInfo, $userID);
        } else if(!$savePay && $saveZone) {
            $stmt->bind_param("ss", $zoneInfo, $userID);
        } else {
            return false;
        }
        $stmt->execute();
        if($this->db->error){
            $this->printFormattedArray($this->db->error);;
            return false;
        }
        return true;
    }

    /**shoppingCart => Il cookie settato con tutte le info del carrello */
    public function takeOrder($shoppingCart) {
        $cart = json_decode($shoppingCart, true);
        foreach($cart as $product){
            $check = $this->changeQuantity($product["id"], $product["count"], '-');
            if(!$check) return false;
        }
        return true;

    }

    //NOTIFICATION ZONE
    public function writeEmail()
    {
        $cart = json_decode($_COOKIE["shoppingCart"], true);
        $body = json_encode($_COOKIE["shoppingCart"]);
        //$this->printFormattedArray($body);
        $id = $_COOKIE["id"];
        $mail = $_COOKIE["mail"];
        $tot = 0;
        $product_list = array();
        foreach ($cart as $product) {
            $tot = $tot == 0 ? $product["count"] : $tot + $product["count"];
            array_push($product_list, $product["id"]);
        }
        
        $hash = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));//<- usata solo per generare un codice dell'ordine
        $obj = "Ricevuta ordine #" . strtoupper(substr($hash, 0, 6)). ": n°" .$tot . " prodotti";
        $scrivi_mail_utente = "INSERT INTO `notifiche` (`dest`, `obj`, `body`, `customerID`) VALUE (?, ?, ?, ?);";
        $stmt = $this->db->prepare($scrivi_mail_utente);
        $stmt->bind_param("ssss", $mail, $obj, $body, $id);
        $stmt->execute();


        /* Query per la ricerca del venditore per inviare la notifica di vendita*/
        usort($cart, function ($item1, $item2) {
            return $item1['id'] <=> $item2['id'];
        });
        $cerca_venditori = "SELECT u.UserID, v.`vendorID`, `Email`, `prodottoID`, `quantity`, `venduto` FROM `prodotto` AS p LEFT JOIN `venditore` AS v ON p.vendorID = v.vendorID
                            LEFT JOIN `utente` AS u ON u.UserID = v.userID WHERE `prodottoID` IN (". implode(',', $product_list) .") ORDER BY prodottoID";
        $stmt = $this->db->prepare($cerca_venditori);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC);
        
        for ($i=0; $i < count($res); $i++) {
            $obj = "Ricevuta ordine #" . strtoupper(substr($hash, 0, 6)). ": " . $cart[$i]["name"] . " -> quantity: ".$cart[$i]["count"];
            $scrivi_mail_venditore = "INSERT INTO `notifiche` (`send`, `dest`, `obj`, `body`, `customerID`) VALUE (?, ?, ?, ?, ?);";
            $stmt = $this->db->prepare($scrivi_mail_venditore);
            $details = array("name"=>$cart[$i]["name"], "richieste"=>$cart[$i]["count"], "rimanenti"=>$res[$i]["quantity"], "venduto"=>$res[$i]["venduto"]);
            $body = json_encode($details);
            $stmt->bind_param("sssss", $mail, $res[$i]["Email"], $obj, $body, $res[$i]["UserID"]);
            $stmt->execute();
        }

        unset($_COOKIE["shoppingCart"]);
        setcookie("shoppingCart", "", time()-3600);
    }

    public function getUserNotification($id)
    {
        $sql = "SELECT `notificationID`, `send`, `isRead`, `obj`, `spedita` FROM `notifiche` WHERE `customerID`=? ORDER BY `isRead`, `spedita` DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotificationNum($id)
    {
        $sql = "SELECT COUNT(`notificationID`) AS 'totali' FROM `notifiche` WHERE `customerID`=?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]['totali'];
    }

    public function getNotificationToRead($id)
    {
        $sql = "SELECT COUNT(`isRead`) AS 'da_leggere' FROM `notifiche` WHERE `customerID`=? AND `isRead`=0";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]['da_leggere'];
    }

    public function getSpecificNotification($id, $isRead)
    {
        if($isRead==0) {
            $err = $this->setNotificationToReaded($id);
            if(!$err)
                return array();
        }
        $sql = "SELECT * FROM `notifiche` WHERE `notificationID`=?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function setNotificationToReaded($id){
        $sql = "UPDATE `notifiche` SET `isRead`='1' WHERE `notificationID`=?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if($this->db->error){
            $this->printFormattedArray($this->db->error);;
            return false;
        }
        return true;
    }

    public function checkUserIsVendor($id){
        $sql = "SELECT vendors FROM utente WHERE UserID=?;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $val = $stmt->get_result();
        $isVendor = $val->fetch_all(MYSQLI_ASSOC)[0];
        return $isVendor["vendors"] == 1;
    }

}