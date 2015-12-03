
<?php
include 'includes/db_connect.php';
//Saves the values from the registration form into the database.

$sql = "INSERT INTO teams (team_name, group_nr, flag_url)
VALUES ('" . $_POST['country'] . "', '" . $_POST['group_reg'] . "', '". basename($_FILES['country_flag']['name'])."')";

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES['country_flag']['name']);
if (move_uploaded_file($_FILES['country_flag']['tmp_name'], $target_file)) {
    echo "The file ". basename( $_FILES['country_flag']['name']). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}
if(mysqli_query($db_connect, $sql)){
	//success
	echo 'Bean Bag';
}else{
	// echo a error message if the query dident work.
	echo "Error: ". $sql . "<br>" . mysqli_error($db_connect);
}
?>