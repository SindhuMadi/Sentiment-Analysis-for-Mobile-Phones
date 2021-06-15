<?php
	session_start();
	
	if (!isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == false))
	{
   	
	    echo '<script type="text/javascript">'; 
            echo 'alert("Please login to continue");'; 
            echo 'window.location.href = "loginSA.php";';
            echo '</script>';

   	exit();
	}
	
	include 'config/database.php';
    	// get database connection
    	$database = new Database();
    	$db = $database->getConnection();	
	
	include_once "objects/product.php";
	include_once "objects/product_image.php";
	include_once "objects/review_dummy.php";

	$review = $_POST['message'];
	$Pd_id = $_POST['pid'];
	$User_id = $_SESSION['uid']; 
	

	
	// get id
	$sql1 = "SELECT MAX(review_id) AS id FROM Review";

	$stmt1 = $db->prepare( $sql1 );
  
        // execute query
        $stmt1->execute();
        $row = $stmt1->fetch(PDO::FETCH_ASSOC);

	$reviewid = $row['id'] + 1;

	//insert review into the review table
	$sql2 = "Insert into Review(product_id, userid, review_id, review, rating) VALUES (".$Pd_id.", ".$User_id.", ".$reviewid.", '".trim($review)."', null)";

	
	//insert overall rating for each product in the product table
	$sql3 = "UPDATE Product SET Overall_rating = (select avg(rating) as avgrating From Review WHERE Pd_id = $Pd_id) WHERE Pd_id = $Pd_id" ;

	$stmt2 = $db->prepare( $sql2 );
  
        // execute query
        $stmt2->execute();
	
	$stmt3 = $db->prepare( $sql3 );
  
        // execute query
        $stmt3->execute();

	echo '<script type="text/javascript">';         
    echo 'window.location.href = "products.php";';
    echo '</script>';
    
		
?>