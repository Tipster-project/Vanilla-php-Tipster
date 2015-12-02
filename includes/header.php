<?php 
	include "db_connect.php"; 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tipster</title>
</head>
<body>	
	<div id="login">
		<form action="" method="post">
			<input type="text" name="login_email" placeholder="Email">
			<input type="text" name="login_password" placeholder="Password">
			<input type="submit" name="login_btn" value="Login">
		</form>	
	</div><!-- #login -->