<?php
	include "includes/db_connect.php"; 
	session_start();

	//Om man har klickat på logga in knappen, kontrollera mot db
	if(isset($_POST["login_btn"])) {
		//Initiering av variabler
		$stmt = $db_connect->stmt_init();
		$email = $_POST["login_email"];
		$password = $_POST["login_password"];

		$query = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";

		//Om queryn stämmer, utför frågan
		if($stmt->prepare($query)) {
		 	$stmt->execute();
		 	$stmt->store_result();

		 	//Om uppgifterna finns i en rad i db, skapa sessions
		 	if($stmt->num_rows == 1) {
		 		$_SESSION["status"] = "logged_in";
		 		$stmt->bind_result($email, $password, $admin);
		 		mysqli_stmt_fetch($stmt);
		 		
		 		$_SESSION["user_id"] = $user_id;
		 		$_SESSION["user_name"] = $user_name;
		 		$_SESSION['result'] = $admin;

		 		header("Location: user_dash.php");

		 		// if($stmt['admin'] == 1) {
		 		// 	header("Location: admin_dash.php");
		 		// }

		 		// else {
		 		// 	header("Location: user_dash.php");
		 		// }
		 	}
		 // 	else {
			// header("Location: index.php?unknown=unknown#login");
			// }
		}
	}
	$db_connect->close();
?>