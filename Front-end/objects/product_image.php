<?php
// 'product image' object
class ProductImage{
 
    // database connection and table name
    private $conn;
    private $table_name = "product_image";
 
    // properties
    public $id;
    public $product_id;
    public $name;
     
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    // function to fetch the first image related to a product
    function readFirst(){
 
    // select query
    $query = "SELECT id, product_id, name
            FROM " . $this->table_name . "
            WHERE product_id = ?
            ORDER BY name DESC
            LIMIT 0, 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // binding parameters
    $stmt->bindParam(1, $this->product_id);
 
    // execute query
    $stmt->execute();
 
    //return results
    return $stmt;
}

// function to fetch all images realted to a product
function readByProductId(){
 
    // select query
    $query = "SELECT id, product_id, name
            FROM " . $this->table_name . "
            WHERE product_id = ?
            ORDER BY name ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    $this->product_id=htmlspecialchars(strip_tags($this->product_id));
 
    // binding parameters
    $stmt->bindParam(1, $this->product_id);
 
    // execute query
    $stmt->execute();
 
    // return results
    return $stmt;
}
}

?>