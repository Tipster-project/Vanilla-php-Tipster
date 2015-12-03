<?php
	include "includes/db_connect.php"; 
	session_start();

	//Om man har klickat på logga in knappen, kontrollera mot db
	//if(isset($_POST["login_btn"])) {
		//Initiering av variabler
		$email = $_POST["login_email"];
		$password = $_POST["login_password"];

		$sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
		$result = mysqli_query($db_connect, $sql);
		$row = mysqli_fetch_assoc($result);
		print_r($row['admin']);

		if($row == 0){

			echo 'fel uppgifter';

		}else{
			if($row['admin'] == 'false'){
				$_SESSION['user_loggedin'] = 'true';
				$_SESSION['user_name'] = $row['user_name'];
				header("Location: user_dash.php");
			}else{
				$_SESSION['admin_loggedin'] = 'true';
				$_SESSION['user_name'] = $row['user_name'];
				header("Location: admin_dash.php");
			}
		}




		//Om queryn stämmer, utför frågan
		//if($stmt->prepare($query)) {
		// 	$stmt->execute();
		// 	$stmt->store_result();
//
		// 	print_r($stmt);
//
		// 	//Om uppgifterna finns i en rad i db, skapa sessions
		// 	if($stmt->num_rows == 1) {
		// 		$_SESSION["status"] = "logged_in";
		// 		$stmt->bind_result($email, $password);
		// 		mysqli_stmt_fetch($stmt);
		// 		print_r($stmt['field_count']);
//
		// 		$_SESSION['admin'] = $stmt['admin'];
		// 		$_SESSION["user_id"] = $user_id;
		// 		$_SESSION["user_name"] = $user_name;
//
		 		//header("Location: user_dash.php");

		 		// if($stmt['admin'] == 1) {
		 		// 	header("Location: admin_dash.php");
		 		// }

		 		// else {
		 		// 	header("Location: user_dash.php");
		 		// }
		 	//}
		 // 	else {
			// header("Location: index.php?unknown=unknown#login");
			// }
		//}
	
	$db_connect->close();
?>