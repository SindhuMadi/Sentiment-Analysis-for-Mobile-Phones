<?php
	session_start();

	if (!isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == false))
	{
   	
	    echo '<script type="text/javascript">'; 
            echo 'alert("Please login to continue");'; 
            echo 'window.location.href = "loginSA.php";';
            echo '</script>';

   	exit();
	}	

	include 'dbconnectionSA.php';

	$Pd_id = $_GET['pid'];
	$_SESSION['pid'] = $PD_id;
	
	echo "	<!DOCTYPE html>
			<html>
			<style>
			.form-popup {
  				display: block;
  				position: fixed;
  				bottom: 0;
  				right: 15px;
  				border: 3px solid #f1f1f1;
  				z-index: 9;
				}

			.form-container {
  				max-width: 300px;
  				padding: 10px;
  				background-color: white;

  			.bg-modal{
				width:100%;
				height:100%;
				background-color:rgba(0,0,0,0.7);
				position:absolute;
				top:0;
				display:flex;
				justify-content: center;
				align-items:center;
			}
			.modal-content{
				width:500px;
				height:300px:
				background-color: white;
				border-radius:4px;
				text-align:center;
				padding:20px;
				position:relative;
				
			}
			input{
				width:50%
				disply:block;
				margin:15px auto;
			}
			.close{
				position:absolute;
				top:0;
				right:14px;
				font-size:42px;
				transform: rotate(45deg);
				cursor:pointer;
			}

			</style>
			<script>
			document.getElementById('button').addEventListener('click',
			function(){
				document.querySelector('.bg-modal').style.display='flex';
			});

			document.querySelector('.close').addEventListener('click',
			function(){
				document.querySelector('.bg-modal').style.display='none';
				});
			</script>
			<body>
				
			<div class='bg-modal' id='myForm'>
				<div class = 'modal-content'>
				<div class='close'>+</div>
			<form action = 'insert_review.php' method = 'post' class='form-container'>
			<input type='hidden' name='pid' value ='".$Pd_id."'><br>

			Enter Review Here: <br>
			<textarea name='message' rows='15' cols='30'>
			</textarea><br>
			<input type='submit' value = 'Submit' class='button'><br>
			</form>

			</body>
			</html>";

?>

