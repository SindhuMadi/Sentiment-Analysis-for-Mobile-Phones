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

// get the product id
$id = isset($_GET['Pd_id']) ? $_GET['Pd_id'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// default quantity is 1
$quantity=$quantity<=0 ? 1 : $quantity;
 
// adding product to array
$cart_item=array(
    'quantity'=>$quantity
);
 
//if cart session is not intialized, initialize cart
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

//if product already exists in cart - alert user 
if(array_key_exists($id, $_SESSION['cart'])){
    header('Location: products.php?action=exists&id=' . $id . '&page=' . $page);
}

// if it is not already in cart - aert user
else{
    $_SESSION['cart'][$id]=$cart_item;
 
    header('Location: products.php?action=added&page=' . $page);
}
?>