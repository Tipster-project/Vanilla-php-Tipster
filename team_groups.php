<?php
include 'includes/header.php'; 


$groups= array('A', 'B', 'C', 'D', 'E', 'F');

$grouplength = count($groups);

for($x = 0; $x < $grouplength; $x++) {
	?><div class="group">
		<div class="tabell">
    		<?php echo groupTeams($groups[$x]); ?>
    	</div>

	    <div class="games" style:"width:500px;">
	    	<div class="home_team" style="float:left;">
	    		<?php echo homeTeam($groups[$x]); ?>
	    	
	    	</div>
	    	<div class="away_team" style="float:left;";>
	    		<?php echo awayTeam($groups[$x]); ?>
	    	</div>
	    </div>
	</div>

    <? 
}

//funktion som hämtar ut hemmalagen
function homeTeam($groupGames){
	
	global $db_connect;
	$query = "SELECT teams.*, games.* 
				FROM games 
				LEFT JOIN teams on games.team_name = teams.team_name 
				ORDER BY game_number";

	$result = mysqli_query($db_connect, $query);
	
	while($row = $result->fetch_assoc()){
		if ( "{$row['group_nr']}" == $groupGames && "{$row['home_team']}" == 'true'){
			?>
			<?php echo "{$row['game_date']}" . " " . "{$row['game_time']}" . " " ."{$row['team_name']}"; ?>
			<img style='width:30px', 'height:30px' src="img/<?php echo "{$row['team_flag']}"; ?>" />VS
		</br>
			<?
				
		}
	}
}

//funktion som hämtar ut bortalagen
function awayTeam($groupGames){
	
	global $db_connect;
	$query = "SELECT teams.*, games.* 
				FROM games 
				LEFT JOIN teams on games.team_name = teams.team_name 
				ORDER BY game_number";

	$result = mysqli_query($db_connect, $query);
	
	while($row = $result->fetch_assoc()){
		if ( "{$row['group_nr']}" == $groupGames  && "{$row['home_team']}" == 'false'){

			?>
			<img style='width:30px', 'height:30px' src="img/<?php echo "{$row['team_flag']}"; ?>" />
			<?php echo "{$row['team_name']}"; ?>
			</br>
			<?
				
		}
	}
}


//function that prints out every group ordered by letter
function groupTeams($teamGroup){
	global $db_connect;

	$query = 'SELECT * FROM teams ORDER BY team_points DESC';
	$result = mysqli_query($db_connect, $query);
	?>

	<h1 style="padding-top:80px">Group <?php echo $teamGroup; ?></h1>
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
						<td><img src="img/<?php echo "{$row['team_flag']}"; ?>" /></td>
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