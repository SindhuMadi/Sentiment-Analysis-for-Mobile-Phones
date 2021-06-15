<?php
session_start();
 
// product id
$id = isset($_GET['Pd_id']) ? $_GET['Pd_id'] : 1;
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
 
// default quantity 1 -  if not specified
$quantity=$quantity<=0 ? 1 : $quantity;
 
//remove the product from cart and add again with new quantity
unset($_SESSION['cart'][$id]);
 $_SESSION['cart'][$id]=array(
    'quantity'=>$quantity
);
 
//alert the user
header('Location: cart.php?action=quantity_updated&Pd_id=' . $id);
?>