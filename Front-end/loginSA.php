<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <i> <p style = "text-align:center;"> <font size="9" color="Indigo"> Sentiment Analysis for Mobile Phones </font></p></i>
        <ul>
            <li> <a class = "active" href = "loginSA.php"> Home </a> </li>
            <li> <a href = "AboutUs.php"> About Us </a> </li>
            <li> <a href = "registerSA.php"> Register </a> </li>
            <li> <a href = "contact.php"> Contact </a> </li>
        </ul>
    <style>
            img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            }
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
        </style><br>
        <img src="rating-app-mobile-1280x720.jpg" alt="Mobile phone rating" width="620" height="370">
    </head>
    <body>
        <div class = 'container' style = "text-align:center;">
            <i> <h2> Login </h2> </i>
            <form method = 'post' action = '#'>
                <p> Email: <input type = "text" name = "unm" value = "" required> </p>
                <p> Password: <input type = "password" name = "pwd" value = "" required> </p>
                <input type = "submit" class = "button" name = "commit" value = "Login">
            </form>
        
    </body>
</html>

<?php
    
    include 'config/database.php';
    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    session_start();
    if(isset($_POST['unm'])) {
        session_start();
        // Store Session Data
        $unm = $_POST['unm'];
        $pwd = $_POST['pwd'];
        $_SESSION['login_user'] = $unm;
        
        $sql = "SELECT * FROM User WHERE Email = '$unm' AND Password = '$pwd' LIMIT 1";

        $stmt = $db->prepare( $sql );
  
        // execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $num_users = $stmt->rowCount();

        if($num_users == 1) {
            // Display Products Page - View Page
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['uid'] = $row['UserId'];
            header("location:afterLoginSA.php");

        }
        else {
            echo '<script type="text/javascript">';
            echo 'alert("User not registered or Password is incorrect")';
            echo "</script>";
        }
    }
?>

<html>
    <body>
        <ul>
            <li> <a href = "#Sentiment Analysis"> Sentiment Analysis </a> </li>
        </ul>
    </body>
</html>