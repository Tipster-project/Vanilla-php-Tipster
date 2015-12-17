<?php
// include 'includes/header.php';

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

$query = "SELECT tournament_id FROM user_tournaments WHERE user_id = '". $_SESSION['user_id'] ."'"; 
$result = $db_connect->query($query);
$rows = resultToArray($result);
$result->free();

$row_id = array();
for ($x = 0; $x < count($rows); $x++) {
    $row_id[] = $rows[$x]['tournament_id'];
} 

$comma_separated = implode(",", $row_id);

$query = "SELECT tournament_name, tournament_id FROM tournament WHERE tournament_id IN ($comma_separated)";

$result = $db_connect->query($query);
?> 

<h2>Välj turnering</h2>
<form action="includes/betting.php" method="post">
	<select name="selected_tournament"> 
		<?php
		while($row = mysqli_fetch_assoc($result)) { 
			?>
			<option value="<?php echo $row['tournament_id']; ?>"><?php echo $row['tournament_name']; ?></option>
		<?php 
		} 
		?>
	</select>
	<input type="submit" value="Välj turnering">
</form>

	<?php      	
	$db_connect->close();
?>

