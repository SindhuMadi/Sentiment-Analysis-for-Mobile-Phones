<?php

class Database{

	private $host = "localhost";
	private $username = "smadishe";
	private $password = "smadishe";
	private $db_name = "smadishe_db";


	public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}

?>