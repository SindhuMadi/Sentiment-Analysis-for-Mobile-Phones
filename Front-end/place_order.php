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

//unsetting cart session variable
unset($_SESSION['cart']);
 
// page title
$page_title="Thank You!";
 
// include navigation bar
include_once 'layout_header.php';
 
echo "<div class='col-md-12'>";
 
    // alert the user that order is placed
    echo "<div class='alert alert-success'>";
        echo "<strong>Your order has been placed!</strong> Thank you very much!";
    echo "</div>";
 
echo "</div>";
 
include_once 'layout_footer.php';
?>