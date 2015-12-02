<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Registration";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection if it did not connect it will die.
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//Saves the values from the registration form into the database.
$sql = "INSERT INTO users (username, password, firstname, lastname, phonenumber, email)
VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['phonenumber']."', '".$_POST['email']."')";

if(mysqli_query($conn, $sql)){
	//success
}else{
	// echo a error message if the query dident work.
	echo "Error: ". $sql . "<br>" . mysqli_error($conn);

?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
	<script src="animation.js"></script>
</head>
<body>
	<!--buttoms for the TimelineMax in animation.js-->
	<button id="play">Play</button>
	<button id="pause">Pause</button>
	<button id="reverse">Reverse</button>
	<!--The objects that gets animated when the registration is done.-->
	<div id="success">
		<div id="an1"><p>You have</p></div>
		<div id="an2"><p>Successfully been</p></div>
		<div id="an3"><p>Registerd!</p></div>
	</div>

</body>
</html>
