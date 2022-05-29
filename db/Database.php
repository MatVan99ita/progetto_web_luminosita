<?php

require_once ('config.php');


class Database {

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;

    public $error;

    private $stmt;



    public function __construct($host=NULL,$user=NULL,$pass=NULL,$dbname=NULL) {

        if ($host!==NULL)
            $this->host=$host;
        
        if ($user!==NULL)
            $this->user=$user;
        
        if ($pass!==NULL)
            $this->pass=$pass;
        
        if ($dbname!==NULL)
            $this->dbname=$dbname;
        
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => false,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        
        // Create a new PDO instanace
        
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        $this->dbh->exec("SET NAMES 'utf8'");
    }

    public function close() {
        $this->dbh = null;
        return true;
    }
    
    public function query($query) {
        $this->stmt = $this->dbh->prepare($query);
    }
    
    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    public function execute($nameValuePairArray = NULL) {
        try {   
            if (is_array($nameValuePairArray) && !empty($nameValuePairArray)) 
                return $this->stmt->execute($nameValuePairArray);
            else
                return $this->stmt->execute();
        } 
        catch(PDOException $e) {
            $this->error = $e->getMessage();
        }   
        return FALSE;
    }

    public function executeTE($nameValuePairArray = NULL) {
        if (is_array($nameValuePairArray) && !empty($nameValuePairArray)) 
            return $this->stmt->execute($nameValuePairArray);
        else
            return $this->stmt->execute();
        return FALSE;
    }
    
    
    public function resultset($nameValuePairArray = NULL, $FETCH_ASSOC = PDO::FETCH_ASSOC) {
        try {   
            $this->execute($nameValuePairArray);
            if (isset($FETCH_ASSOC) && $FETCH_ASSOC == PDO::FETCH_ASSOC)
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            else
                return $this->stmt->fetchAll();
        } 
        catch(PDOException $e) {
            $this->error = $e->getMessage();
        }   
        return FALSE;
    }    

    public function resultsetTE($nameValuePairArray = NULL, $FETCH_ASSOC = PDO::FETCH_ASSOC) {
        $this->executeTE($nameValuePairArray);
        if (isset($FETCH_ASSOC) && $FETCH_ASSOC == PDO::FETCH_ASSOC)
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        else
            return $this->stmt->fetchAll();
        return FALSE;
    }    

    
    public function single($nameValuePairArray = NULL, $FETCH_ASSOC = PDO::FETCH_ASSOC) {
        try {
            $this->execute($nameValuePairArray);
            if (isset($FETCH_ASSOC) && $FETCH_ASSOC == PDO::FETCH_ASSOC)
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
            else
                return $this->stmt->fetch();
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();
        }   
        return FALSE;
    }    

    public function singleTE($nameValuePairArray = NULL, $FETCH_ASSOC = PDO::FETCH_ASSOC) {
        $this->executeTE($nameValuePairArray);
        if (isset($FETCH_ASSOC) && $FETCH_ASSOC == PDO::FETCH_ASSOC)
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        else
            return $this->stmt->fetch();
        return FALSE;
    }    
    
    public function rowCount() {
        return $this->stmt->rowCount();
    }    

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }    
    
    public function beginTransaction(){
        return $this->dbh->beginTransaction();
    }    
    
    public function endTransaction(){
        return $this->dbh->commit();
    }    
    
    public function debugDumpParams(){
        return $this->stmt->debugDumpParams();
    }    
    
  
    
    
    function findTE($table,$field,$value){
        $query = "SELECT * FROM $table WHERE $field = :value";
        $this->query($query);
        $this->bind(':value',$value);
        $row = $this->singleTE();
        return $row;
    }

    function findAllTE($table,$field=NULL,$value=NULL){
        
        $query = "SELECT * FROM $table";
        
        if ($field){
            $query .= " WHERE $field = :value";
        }
        
        $this->query($query);
        
        if ($field)
            $this->bind(':value',$value);
        
        $rows = $this->resultSetTE();
        return $rows;
    }

    public function insert($table,$data){
        
        if (!empty($data)){
            
            $fields = "";
            
            $values = "";
            
            foreach($data as $field => $value){
                
                if ($fields==""){
                    $fields = "$field";
                    $values = ":$field";
                }
                else {
                    $fields .= ",$field";
                    $values .= ",:$field";
                }
            }
            
            $query = "INSERT INTO $table ($fields) VALUES ($values) ";
            
            $this->query($query);
            
            foreach($data as $field => $value){
                $this->bind(":$field",$value);
            }
            
            if ($this->execute()===FALSE)
                return FALSE;
            else
                return $this->lastInsertId();
                    
        }
        
        $this->error = "Nessun campo specificato";
        
        return FALSE;
    }
    
     public function insertTE($table,$data){

         $fields = "";

        $values = "";

        foreach($data as $field => $value){

            if ($fields==""){
                $fields = "$field";
                $values = ":$field";
            }
            else {
                $fields .= ",$field";
                $values .= ",:$field";
            }
        }

        $query = "INSERT INTO $table ($fields) VALUES ($values) ";

        $this->query($query);

        foreach($data as $field => $value){
            $this->bind(":$field",$value);
        }

        if ($this->executeTE()===FALSE)
            return FALSE;
        else
            return $this->lastInsertId();

        return FALSE;
    }
    
    
    public function updateTE($table,$id_field,$id_value,$data){
        $assign = "";

        foreach($data as $field => $value){

            if ($field==$id_field)
                continue;

            if ($assign==''){
                $assign = "$field=:$field";
            }
            else {
                $assign .= ",$field=:$field";
            }
        }

        $query = "UPDATE $table SET $assign WHERE $id_field=:$id_field ";

        $this->query($query);

        foreach($data as $field => $value){
            if ($field==$id_field)
                continue;
            $this->bind(":$field",$value);
        }

        $this->bind(":$id_field",$id_value);
        
        return $this->executeTE();
    }  
    
    
    public function deleteTE($table,$id_field,$id_value){
        $query = "DELETE FROM $table WHERE $id_field=:$id_field ";
        $this->query($query);
        $this->bind(":$id_field",$id_value);
        return $this->executeTE();
    }      
    
    /**
     * Delete più di un record alla volta per id.
     * 
     * @param string $table La tabella.
     * @param string $id_field Il campo contente gli id.
     * @param array $id_values Array contente gli id.
     * @return bool TRUE in caso di successo, FALSE in caso di fallimento.
     */
    public function deleteMultiTE($table, $id_field, $id_values) {        
        $queryTemplate = "DELETE FROM $table WHERE $id_field IN (%s)";

        $placeholdersArray = array();
        $idValuesCount = count($id_values);
        for ($i = 0; $i < $idValuesCount; $i++) {
            $id_value = $id_values[$i];
            $placeholdersArray[":$id_field"."_$i"] = $id_value;            
        }
        $query = sprintf($queryTemplate, implode(',', array_keys($placeholdersArray)));
        $this->query($query);
        
        return $this->executeTE($placeholdersArray);
    }    
        
}




?>
