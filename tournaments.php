<?php include 'includes/header.php'; ?>


<?php

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

$sql = "SELECT tournament_id FROM user_tournaments WHERE user_id = '". $_SESSION['user_id'] ."'"; 
$result = $db_connect->query($sql);
$rows = resultToArray($result);
//var_dump($rows); // Array of rows
$result->free();

$row_id = array();
for ($x = 0; $x < count($rows); $x++) {
    $row_id[] = $rows[$x]['tournament_id'];
} 
$comma_separated = implode(",", $row_id);


$sql = "SELECT tournament_name FROM tournament WHERE tournament_id IN ($comma_separated) ";

$result = $db_connect->query($sql);
$rows = resultToArray($result);
$result->free();

for ($x = 0; $x < count($rows); $x++) { ?>
	<div>
		<h1><?php echo $rows[$x]['tournament_name']; ?></h1>
	</div>
<?php } ?>


<!-- '". $comma_separated ."' -->

<?php include 'includes/footer.php'; ?>