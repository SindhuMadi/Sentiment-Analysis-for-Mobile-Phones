<?php
// 'product review' object
class Review{
 
    // database connection and table name
    private $conn;
    private $table_name = "Review";
 
    // properties
    public $userid;
    public $product_id;
    public $review_id;
    public $review;
    public $rating;
    
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }

    

// function to fetch all product reviews related to a product
function readByProductId(){
 
    // select query
    $query = "SELECT userid, product_id, review_id, review, rating
            FROM " . $this->table_name . "
            WHERE product_id = ?";
 
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