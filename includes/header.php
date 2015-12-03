<?php 
	include 'db_connect.php'; 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Tipster</title>
</head>
<body>	
	<div id='login'>
		<form action='login_check.php' method='post'>
			<input type='text' name='login_email' placeholder='Email'>
			<input type='text' name='login_password' placeholder='Password'>
			<input type='submit' name='login_btn' value='Login'>
		</form>	

		<?php
			if(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == 'true'){
				echo 'Admin inloggad';
			}else if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin'] == 'true'){
				echo 'User inloggad';
			}else{
				echo 'inte inloggad';
			}
		?>
	</div><!-- #login -->
	<a href="logout.php">Logga ut</a>