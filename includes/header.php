<?php 
	include 'db_connect.php'; 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Tipster</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css" type="text/css">

</head>
<body>	
	<div id='login'>
		<?php

		if(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == 'true'){ ?>
			<a href="logout.php">Logga ut</a>
			Admin: <?php echo $_SESSION['user_name']; ?>
		<?php }else if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin'] == 'true'){?>
			<a href="logout.php">Logga ut</a>
			User: <?php echo $_SESSION['user_name']; ?>

		<?php }

		else{?>
			<form action='login_check.php' method='post'>
				<input type='text' name='login_email' placeholder='Email'>
				<input type='text' name='login_password' placeholder='Password'>
				<input type='submit' name='login_btn' value='Login'>
			</form>	
		<?php } ?>

	</div><!-- #login -->
	