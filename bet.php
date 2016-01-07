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
$num_rows = mysqli_num_rows($result);

if($num_rows > 1){ ?>
	<div id="tour_select">
		<h2>Välj turnering</h2>
		<select id="tournament_select" name="selected_tournament"> 
			<?php
			while($row = mysqli_fetch_assoc($result)) { 
				?>
				<option value="<?php echo $row['tournament_id']; ?>"><?php echo $row['tournament_name']; ?></option>
			<?php 
			} 
			?>
		</select>
		<button id="btn_select_tournament">Välj turnering</button>
	</div>

<?php }else{ 
	$row = mysqli_fetch_assoc($result); ?>
	<div>
		<h2 id="tour_heade"><?php echo $row['tournament_name']; ?></h2>
		<input id="tournament_id" type="hidden" value="<?php echo $row['tournament_id']; ?>"/>
	</div>
<?php }
	
	$db_connect->close();?>

