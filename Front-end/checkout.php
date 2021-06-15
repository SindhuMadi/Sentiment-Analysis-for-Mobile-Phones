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

//include class definitions
include 'config/database.php';
include_once "objects/product.php";
include_once "objects/product_image.php";
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);
 
// page title
$page_title="Checkout";
 
// include navigation bar
include 'layout_header.php';

if(count($_SESSION['cart'])>0){
 
    $ids = array();
    foreach($_SESSION['cart'] as $Pd_id=>$value){
        array_push($ids, $Pd_id);
    }
 
    $stmt=$product->readByIds($ids);
 
    $total=0;
    $item_count=0;
 
    //Display list of products in the cart
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $quantity=$_SESSION['cart'][$Pd_id]['quantity'];
        $sub_total=$cost*$quantity;
 
            echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";

            echo "<div class='product-name m-b-10px'><h4>{$pd_name}</h4></div>";
                echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";
 
            echo "</div>";
 
            echo "<div class='col-md-4'>";
                echo "<h4>&#36;" . number_format($cost, 2, '.', ',') . "</h4>";
            echo "</div>";
        echo "</div>";
        
        $item_count += $quantity;
        $total+=$sub_total;
    }

    //Summary of cart and Place order button
    echo "<div class='col-md-12 text-align-center'>";
        echo "<div class='cart-row'>";
            if($item_count>1){
                echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
            }else{
                echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
            }
            echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
            echo "<a href='place_order.php' class='btn btn-lg btn-success m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Place Order";
            echo "</a>";
        echo "</div>";
    echo "</div>";
 
}

//If no products were found in cart
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "No products found in your cart!";
        echo "</div>";
    echo "</div>";
}
 
include 'layout_footer.php';
?>