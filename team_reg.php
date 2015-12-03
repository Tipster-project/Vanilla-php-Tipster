
<?php
include 'includes/db_connect.php';
//Saves the values from the registration form into the database.
$sql = "INSERT INTO teams (team_name, group_nr)
VALUES ('" . $_POST['country'] . "', '" . $_POST['group_reg'] . "')";

if(mysqli_query($db_connect, $sql)){
	//success
	echo 'Bean Bag';
}else{
	// echo a error message if the query dident work.
	echo "Error: ". $sql . "<br>" . mysqli_error($db_connect);
}
?>