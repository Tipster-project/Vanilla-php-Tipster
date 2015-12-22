<?php include 'includes/header.php'; ?>

<div class="1 col-sm-3"></div>
<div class="2 col-sm-3"></div>
<div class="3 col-sm-3"></div>
<div class="4 col-sm-3"></div>

<?php
$groups= array('A', 'B', 'C', 'D', 'E', 'F');

$grouplength = count($groups);

for($x = 0; $x < $grouplength; $x++) {
	?><div class="group">
		<div class="tabell">
    		<?php echo groupTeams($groups[$x]); ?>
    	</div>

	    <div class="games">
			<?php echo games($groups[$x]); ?>	
	    </div>
	</div>

    <? 
}

//funktion som hämtar ut matcherna
function games($groupGames){
	
	global $db_connect;
	$query = "SELECT T1.team_name as team_home, T2.team_name as team_away, 
	  				T1.team_flag as home_flag, T2.team_flag as away_flag, 
	  				T1.group_nr as home_team_number, T2.group_nr as away_team_number, 
	  				game_match.*
					FROM game_match, teams T1, teams T2
					WHERE T1.team_id=game_match.home_team AND T2.team_id=game_match.away_team ";

	$result = mysqli_query($db_connect, $query);
	
	while($row = mysqli_fetch_assoc($result)){

		// print_r($row);
		$game_id = $row["game_id"];
		$group_nr = $row["home_team_number"];
		$home_name = $row["team_home"];
		$away_name = $row["team_away"];
		$home_flag = $row["home_flag"];
		$away_flag = $row["away_flag"];
		$game_start = $row['game_start'];
		

		if ( $group_nr == $groupGames){
		echo $game_start . $home_name; ?>
		<img class="flag" src="img/<? echo $home_flag; ?> "> VS 
		<img class="flag" src="img/<? echo $away_flag; ?>"><? echo $away_name; ?></br><?
		}				
	}
}



//function that prints out every group ordered by letter
function groupTeams($teamGroup){
	global $db_connect;

	$query = 'SELECT * FROM teams ORDER BY team_points DESC';
	$result = mysqli_query($db_connect, $query);
	?>

	<h1>Group <?php echo $teamGroup; ?></h1>
	<table style="border:solid black 1px">
		<tbody>
			<tr>
				<th></th>
				<th>Team</th>
				<th>Points</th>
			</tr>

			<?php
			//for each row that exist with a specific letter, print table
			while($row = $result->fetch_assoc()) {
				
				if ( "{$row['group_nr']}"  == $teamGroup){
					?>
					<tr>
						<td><img class="flag" src="img/<?php echo "{$row['team_flag']}"; ?>" /></td>
						<td><?php echo "{$row['team_name']}"; ?></td>
						<td><?php echo "{$row['team_points']}"; ?></td>
					</tr>
					<?php
				}
			}	
			?>
		</tbody>
	</table>
<?php
}
?>
	
<?php include 'includes/footer.php'; ?>