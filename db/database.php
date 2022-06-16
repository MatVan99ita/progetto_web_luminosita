<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
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
        //$ven = userIsVendors($mail, $pass);
        $sql = "SELECT UserID, Nome, Cognome, Email FROM utente WHERE Email = ? AND password = ?";
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

    public function checkLogin($username, $password){
        $query = "SELECT userID, Nome, Cognome, Email, vendors FROM utente WHERE Email = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addUser($nome, $cognome, $sesso, $mail, $password){
        /*manca un controllo da qualche parte per la mail che sia corretta
            [credo si possa fare direttamente dall'html con il textbox in modalità mail spero]
        */
        $sql = "INSERT INTO `utente`(`Nome`, `Cognome`, `Email`, `password`, `vendors`) 
        VALUES (?, ?, ?, ?, 0)";
        $stmt = $this->db->prepare($sql1);
        $stmt->bind_param('ssss',$nome, $cognome, $mail, $password);
        $stmt->execute();
        
        //controllo se la query è andata a buon fine
        if($this->db->error){
            //echo($this->db->error);
            return $this->db->error
        }

        $utenteId = this->getUser($mail, $password); //qui va sistemato

        $sql="INSERT INTO `compratore`(`sesso`, `userID`) VALUES (?, utenteID)";
        $stmt = $this->db->prepare($sql1);
        $stmt->bind_param('s',$sesso, $utenteId);
        $stmt->execute();
    }

}