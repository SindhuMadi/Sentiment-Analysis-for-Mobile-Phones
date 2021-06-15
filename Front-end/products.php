<?php
// start session
session_start();

//checking if the user is logged in
if (!isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == false))
	{
   	
	    echo '<script type="text/javascript">'; 
            echo 'alert("Please login to continue");'; 
            echo 'window.location.href = "loginSA.php";';
            echo '</script>';

   	exit();
}	


// connect to database
include 'config/database.php';
 
// include objects
include_once "objects/product.php";
include_once "objects/product_image.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);

$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// for pagination purposes
//default page is 1
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
$records_per_page = 6; //number of products displayed per page
$from_record_num = ($records_per_page * $page) - $records_per_page;
 
// page title
$page_title="Products";
 
// including header with navigation bar
include 'layout_header.php';

//to display alerts if the product was added or already exists in cart
echo "<div class='col-md-12'>";
    if($action=='added'){
        echo "<div class='alert alert-info'>";
            echo "Product was added to your cart!";
        echo "</div>";
    }
 
    if($action=='exists'){
        echo "<div class='alert alert-info'>";
            echo "Product already exists in your cart!";
        echo "</div>";
    }
echo "</div>";

// fetching all products from database
$stmt=$product->read($from_record_num, $records_per_page);
 
// number of products or rows
$num = $stmt->rowCount();
 
// if atleast one product is fetched
if($num>0){
    
    $page_url="products.php?";
    $total_rows=$product->count();
 
    // display fetched products based on template designed
    include_once "read_products_template.php";
}
 
// if no products are fetched from database
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>No products found.</div>";
    echo "</div>";
}
 

// including footer 
include 'layout_footer.php';
?>