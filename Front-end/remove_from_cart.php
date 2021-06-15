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
 
//prduct ID
$Pd_id = isset($_GET['Pd_id']) ? $_GET['Pd_id'] : "";
$name = isset($_GET['pd_name']) ? $_GET['pd_name'] : "";
 
//remove item from session variable
unset($_SESSION['cart'][$Pd_id]);
 
//alert the user
header('Location: cart.php?action=removed&Pd_id=' . $Pd_id);
?>