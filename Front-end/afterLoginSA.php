<?php
	session_start();

	if (!isset($_SESSION['loggedin']))
	{
   	
	    echo '<script type="text/javascript">'; 
            echo 'alert("Please login to continue");'; 
            echo 'window.location.href = "loginSA.php";';
            echo '</script>';

   	exit();
	}
	
?>



<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                background-color: #4CAF50;
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
            .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            }
        </style>
    </head>
    <body>
        <ul>
            <li> <a class = "active" href = "loginSA.php"> Home </a> </li>
            <li> <a href = "products.php"> Products </a> </li>
            <li> <a href = "logoutSA.php"> Logout </a> </li>
            <li> <a href = "contact.php"> Contact </a> </li>
        </ul> <br>
        <img src="branded_phones.jpg" alt="Mobile phone rating" class="center">
	</body>
</html>
<?php
    echo "Login Successful - Mobile Phone Rating using Sentiment Analysis";
?>

<html>
    <body>
        <ul>
        <li> <a href = "#Sentiment Analysis"> Sentiment Analysis </a> </li>  
        </ul>
    </body>
</html>