<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <i> <h1 style = "text-align:center;"> Sentiment Analysis for Mobile Phones </h1> </i>
        <style>
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
            }
            li {
                float: left;
            }
            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            li a:hover {
                background-color: #111;
            }
            .button {
                background-color: #008CBA;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <ul>
            <li> <a class = "active" href = "loginSA.php"> Home </a> </li>
            <li> <a href = "AboutUs.php"> About Us </a> </li>
            <li> <a href = "contact.php"> Contact </a> </li>
        </ul> <br>
        <div class = 'container' style = "text-align:center;">
            <i> <h2> Register </h2> </i>
            <form method = 'post' action = '#'>
                <p> First Name: <input type = "text" name = "fname" value = "" required> </p>
                <p> Last Name: <input type = "text" name = "lname" value = "" required> </p>
                <p> Email: <input type = "text" name = "email" value = "" required> </p>
                <p> Phone: <input type = "text" name = "phone" value = ""> </p>
                <p> Password: <input type = "password" name = "pwd" value = "" required> </p>
                <p> Confirm Password: <input type = "password" name = "cpwd" value = "" required> </p>
                <input type = "submit" class = "button" name = "commit" value = "Sign up"> <br>
            </form>
        </div> <br>
    </body>
</html>

<?php
    
	include 'config/database.php';
	
	
    	session_start();
	$database = new Database();
	$db = $database->getConnection();

    if(isset($_POST['lname'])) {
        		
        // Store Session Data
        $ufname = $_POST['fname'];
        $ulname = $_POST['lname'];
        $uemail = $_POST['email'];
        $uphone = $_POST['phone'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];

        $sql = "SELECT * FROM User WHERE Email = '".$uemail."'";
	
	$stmt = $db->prepare( $sql );
	$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $num_users = $stmt->rowCount();
  
        if ($num_users > 0) {
            echo '<script type="text/javascript"> ';
            echo 'alert("User already exists with given Email ID")';
            echo "</script>";
        }
        else if ($num_users == 0) {
            $sql1 = "INSERT INTO User VALUES (NULL, '$ufname', '$ulname', '$uemail', '$uphone', '$pwd', '$cpwd')";
	
	     if($pwd != $cpwd) {
                echo '<script type="text/javascript"> ';
                echo 'alert("Passwords do not match, please re-enter")';
                echo "</script>";
            }
	    else {
            
		$stmt2 = $db->prepare( $sql1 );
		$stmt2->execute();
        
            echo '<script type="text/javascript">'; 
            echo 'alert("Please login to continue");'; 
            echo 'window.location.href = "loginSA.php";';
            echo '</script>';
            }
        }
        else {
            echo '<script type="text/javascript"> ';
            echo 'alert("Problem occured in signing up, please try again")';
            echo "</script>";
        }
    }
?>

<html>
    <body>
        <ul>
            <li> <a href = "#Sentiment Analysis"> Sentiment Analysis </a> </li>
            <li> <a href = "logoutSA.php"> Logout </a> </li>
        </ul>
    </body>
</html>