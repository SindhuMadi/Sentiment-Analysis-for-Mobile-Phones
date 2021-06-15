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
 
// include class definitions
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
$page_title="Cart";
 
// including header
include 'layout_header.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";

//alerts for users 
echo "<div class='col-md-12'>";
    if($action=='removed'){
        echo "<div class='alert alert-info'>";
            echo "Product was removed from your cart!";
        echo "</div>";
    }
 
    else if($action=='quantity_updated'){
        echo "<div class='alert alert-info'>";
            echo "Product quantity was updated!";
        echo "</div>";
    }
echo "</div>";

if(count($_SESSION['cart'])>0){
 
    $ids = array();
    foreach($_SESSION['cart'] as $Pd_id=>$value){
        array_push($ids, $Pd_id);
    }
 
    $stmt=$product->readByIds($ids);
 
    $total=0;
    $item_count=0;
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $quantity=$_SESSION['cart'][$Pd_id]['quantity'];
        $sub_total=$cost*$quantity;
 
        // =================
        echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";
 
                echo "<div class='product-name m-b-10px'><h4>{$pd_name}</h4></div>";
 
                // update product quantity
                echo "<form class='update-quantity-form'>";
                    echo "<div class='product-id' style='display:none;'>{$Pd_id}</div>";
                    echo "<div class='input-group'>";
                        echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity' min='1' />";
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-default update-quantity' type='submit'>Update</button>";
                            echo "</span>";
                    echo "</div>";
                echo "</form>";
 
                // delete a product from cart
                echo "<a href='remove_from_cart.php?Pd_id={$Pd_id}' class='btn btn-default'>";
                    echo "Delete";
                echo "</a>";
            echo "</div>";
 
            echo "<div class='col-md-4'>";
                echo "<h4>&#36;" . number_format($cost, 2, '.', ',') . "</h4>";
            echo "</div>";
        echo "</div>";
        // =================

        $item_count += $quantity;
        $total+=$sub_total;
    }
 
    echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-4'>";
        echo "<div class='cart-row'>";
            echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
            echo "<h4>&#36;" . number_format($total, 2, '.', ',') . "</h4>";
            echo "<a href='checkout.php' class='btn btn-success m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout";
            echo "</a>";
        echo "</div>";
    echo "</div>";
 
}

//if no products were found in cart
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "No products found in your cart!";
        echo "</div>";
    echo "</div>";
}
 

// layout footer 
include 'layout_footer.php';
?>