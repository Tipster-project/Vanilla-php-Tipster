<?php
/**
This file gets information from ajax.js with ajax post, about what value username has. Then it will check aginst the database if the value allready exists or not and will return some of the values below.
Returns:
	1+ - Username unavailable
	0 - Username available
	-1 - Wrong request
**/
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
//Checks first if $_POST['username'] exists and if it exists if it has a value and in that case gives it do $username.
if(isset($_POST['username']) && $username = $_POST['username']){
	//Checks if the the value of $username is allready saved in the database with a mysqli query.
	$query=mysqli_query($conn, "SELECT * FROM users WHERE username='$username' ");
	//return how many rows it finds with the given value, if it finds 1 or more i means the value/username allready //exists and if it is a 0 it dident find a match and the value/username is avalible.
	$find=mysqli_num_rows($query);
	//echos the number of rows it found so ajax.js can make use of it.
	echo $find;
}else{
	//echos -1 if something with the request is wrong.
	echo -1;
}
?>