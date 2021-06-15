<?php
// 'product' object
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name="Product";
 
    // properties
    public $Pd_id;
    public $pd_name;
    public $cost;
    public $Description;
    public $Overall_rating;
    
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // read all products
    function read($from_record_num, $records_per_page){
 
    
    $query = "SELECT
                Pd_id, pd_name, cost, Description, Overall_rating
            FROM
                " . $this->table_name . "
            ORDER BY
                Pd_id
            LIMIT
                ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variables to be passed to LIMIT clause
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// used for pagination purpose
public function count(){
 
    // query to count all product records
    $query = "SELECT count(*) FROM " . $this->table_name;
 
    // prepare statement
    $stmt = $this->conn->prepare( $query );
 
    // execute query
    $stmt->execute();
 
    $rows = $stmt->fetch(PDO::FETCH_NUM);
 
    // return count
    return $rows[0];
}

// read all product based on ids list
public function readByIds($ids){
 
    $ids_arr = str_repeat('?,', count($ids) - 1) . '?';
 
    // select products
    $query = "SELECT Pd_id, pd_name, cost FROM " . $this->table_name . " WHERE Pd_id IN ({$ids_arr}) ORDER BY pd_name";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute($ids);
 
    return $stmt;
}

// funtion to read a single record from the table 
function readOne(){
 
    // query to select single record
    $query = "SELECT
                pd_name, Description, cost, Overall_rating
            FROM
                " . $this->table_name . "
            WHERE
                Pd_id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    //cleaning
    $this->Pd_id=htmlspecialchars(strip_tags($this->Pd_id));
 
    // bind product id value
    $stmt->bindParam(1, $this->Pd_id);
 
    // execute query
    $stmt->execute();
 
    // get row values
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    //Assigining results to object properties
    $this->pd_name = $row['pd_name'];
    $this->Description = $row['Description'];
    $this->cost = $row['cost'];
    $this->Overall_rating = $row['Overall_rating'];

}

}


?>