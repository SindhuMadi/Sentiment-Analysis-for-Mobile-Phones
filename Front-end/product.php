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

// including class definitions
include_once "config/database.php";
include_once "objects/product.php";
include_once "objects/product_image.php";
include_once "objects/review.php";
 
// code to get database connection object
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);
$review = new Review($db);

$uid = 20;

// get ID of the product from products page
$id = isset($_GET['Pd_id']) ? $_GET['Pd_id'] : die('ERROR: missing ID.');
 
$product->Pd_id = $id;
 
// reading a single product record from database
$product->readOne();
 
// set page title
$page_title = $product->pd_name;
 
$product_image->product_id=$id;	

$review->product_id=$id;
 
// fecthing all images related to current product
$stmt_product_image = $product_image->readByProductId();
$num_product_image = $stmt_product_image->rowCount();

//fetching all reviews related to product
$stmt_product_review = $review->readByProductId();

// navigation bar
include_once 'layout_header.php';
 
//thumbnails
echo "<div class='col-md-1'>";
    // if atleast one image is fetched
    if($num_product_image>0){
        //looping through all images
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}"; 
            echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}' />";
        }
    }else{ echo "No images."; }
echo "</div>";
 
// product image 
echo "<div class='col-md-4' id='product-img'>";
 
    // fecthing all images related to current product
    $stmt_product_image = $product_image->readByProductId();
    $num_product_image = $stmt_product_image->rowCount();
 
    // if atleast one image is fetched
    if($num_product_image>0){
        // looping through all images
        $x=0;
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
            $product_image_name = $row['name'];
            $source="uploads/images/{$product_image_name}";
            $show_product_img=$x==0 ? "display-block" : "display-none";
            echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='product-img {$show_product_img}'>";
                echo "<img src='{$source}' style='width:100%;' />";
            echo "</a>";
            $x++;
        }
    }else{ echo "No images."; }
echo "</div>";
 
// code to display product details
echo "<div class='col-md-5'>";
 
    //price 
    echo "<div class='product-detail'>Price:</div>";
    echo "<h4 class='m-b-10px price-description'>&#36;" . number_format($product->cost, 2, '.', ',') . "</h4>";
 
    //product description
    echo "<div class='product-detail'>Product description:</div>";
    echo "<div class='m-b-10px'>";

        //removing speacial characters
        $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->Description));
 
        echo $page_description;
    echo "</div>";
 
 // Prodict rating
	echo "<div class='product-detail'>Product Rating:</div>";
	echo "<h4 class='m-b-10px price-description'>" . number_format($product->Overall_rating, 1, '.', ',') . "</h4>";
    
//Entering product reviews - Modal
	echo "<!DOCTYPE html>
                <html>
        <head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  align-items:center;
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 500px;
  height:300px;
  text-align:center;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>

<!-- Trigger/Open The Modal -->
<button id='myBtn' class='btn btn-primary add-to-cart m-b-10px'>Click Here to Enter Review</button>

<!-- The Modal -->
<div id='myModal' class='modal'>

  <!-- Modal content -->
  <div class='modal-content'>
    <span class='close'>&times;</span>
    <form action = 'javascript:void(0);' name='myForm' id = 'myForm' method = 'post'>
            <input type='hidden' name='pid' value ='".$id."'><br>

            Enter Review Here: <br>
            <textarea name='message' rows='8' cols='40'>
            </textarea><br>
            <input type='submit' value = 'Submit' class='btn btn-primary add-to-cart m-b-10px' onClick = 'javascript:showMessage();'><br>
            </form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById('myBtn');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName('close')[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = 'block';
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = 'none';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
}

function showMessage(){
    alert('Inserted Successfully!!');
    document.getElementById('myForm').action = 'insert_review.php';
    document.getElementById('myForm').submit();
}
</script>

</body>
</html>";

    // Reviews related to current product
	
    	echo "<div class='product-detail'>Product Reviews:</div>";
 	
    	// fetching all reviews based on product ID
    	$stmt_product_review = $review->readByProductId();
    	$num_product_review = $stmt_product_review->rowCount();
 
    	// if atleast one review id fetched
    	if($num_product_review>0){
        // loop through all reviews
	
        $x=0;
        echo "<table class='table table-striped'>";
        echo "<tr><td>UserID</td><td>ProductID</td><td>Review</td><td>Rating from ML Algorithm</td></tr>";

        while ($row = $stmt_product_review->fetch(PDO::FETCH_ASSOC)){
            //inserting into table format
           echo "<tr><td>{$row['userid']}</td><td>{$row['product_id']}</td><td>{$row['review']}</td><td>{$row['rating']}</td></tr>";
            
            $x++;
        }
    }else{ echo "No Reviews for this product"; }
	echo "</table>";

    
echo "</div>";

echo "<div class='col-md-2'>";
 
    // checking if product is already added to cart -- to display update cart button
    if(array_key_exists($id, $_SESSION['cart'])){
        echo "<div class='m-b-10px'>This product is already in your cart.</div>";
        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
            echo "Update Cart";
        echo "</a>";
 
    }
 
    // if product is not added to cart -- displays Add to Cart button
    else{
 
        echo "<form class='add-to-cart-form'>";
            // product id
            echo "<div class='product-id display-none'>{$id}</div>";
            
            //select quantity
            echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
            echo "<input type='number' value='1' class='form-control m-b-10px cart-quantity' min='1' />";
 
            // enable add to cart button
            echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add to cart";
            echo "</button>";
 
        echo "</form>";
    }
echo "</div>";

  
// include footer
include_once 'layout_footer.php';
?>