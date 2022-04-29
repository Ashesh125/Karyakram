<?php
class Database{
    private $host = "localhost";
    private $db_name = "id18828533_primary";
    private $username = "id18828533_wethree";
    private $password = "P@ssword1234"; 
    private $conn;

    //connect DB
    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO(
                'mysql:host=' . $this->host. 
                ';dbname=' . $this->db_name,  
                $this->username,
                $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){ 

            echo "Connection error:" . $e->getMessage();
        }
        return $this->conn;
    }
}
?>