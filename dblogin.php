<?php
 session_start(); 
 ?>
<html>
<head>
	<title>Inloggad</title>
	<meta charset="utf-8" />
</head>
<body>

<!-- Databas Connection -->

<?php
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "blogg");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Om man inte kan ansluta till databasen //
if($mysqli->connect_errno) {
	echo "Det gick inte att ansluta till databasen";

// Ansluten till databasen och validerar om username och password är korrekt //
// } else {
// 	$mysqli->set_charset("utf8");
// 	if(isset($_POST["login"])) {
// 		$stmt = $mysqli->stmt_init();
// 		$query = "SELECT * FROM users WHERE username = ? AND password = ?";
// 		if($stmt->prepare($query)) {
// 			$stmt->bind_param("ss", $_POST["username"], $_POST["password"]);
// 			$stmt->execute();
// 			$stmt->bind_result($uid, $username, $password, $firstname, $lastname, $lastlogin);
// 			$stmt->store_result();
// 			// Skriver ut Sessions för olika värden som ska skrivas ut från databasen //
// 			if($stmt->num_rows == 1) {

// 				while($stmt->fetch()) {
// 					$_SESSION["logged_in"] = true;
// 					$_SESSION["user_id"] = $uid;
// 					$_SESSION["firstname"] = $firstname;
// 					$_SESSION["lastname"] = $lastname;
// 				}
// 				header("Location: http://localhost/Bloggprojekt/index.php"); 
// 			} else {
// 				header("Location: index.php");
// 			}
// 		} else {
// 			echo "Nåt är fel i din fråga till databasen";
// 		}
// 	}
// }

?>
<!-- 
</body>
</html> -->