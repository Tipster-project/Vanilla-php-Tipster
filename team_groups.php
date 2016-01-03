<?php include 'includes/header.php'; ?>
<?php include 'includes/menu.php'; ?>

<div class="container-fluid">
	<div class="row">
		<?php
$groups= array('A', 'B', 'C', 'D', 'E', 'F');

$grouplength = count($groups);

for($x = 0; $x < $grouplength; $x++) {
	?>
	<div class="group col-sm-12">
		<h3>Group <?php echo $groups[$x]; ?></h3>
		<div class="tabell col-sm-4">
    		<?php echo groupTeams($groups[$x]); ?>
    	</div>


	    <div class="games col-sm-8">
			<?php echo games($groups[$x]); ?>	
	    </div>
	</div>
	<div class="line col-xs-12"></div>

    <?php
}
?>
	</div><!-- #Container -->
</div><!-- #row -->

<?php

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
			?>
			<table>
				<tbody>
					<tr>
						<td style="width:20%"><?php echo date("d M H:i", strtotime($game_start)); ?></td>
						<td style="width:25%; text-align:right;"><?php echo $home_name;?></td>
						<td style="width:10%"><img class="flag" src="img/<? echo $home_flag; ?>" /></td>
						<td style="width:10%; text-align:center;"> VS </td>
						<td style="width:10%"><img class="flag" src="img/<? echo $away_flag; ?>" /></td>
						<td style="width:25%"><?php echo $away_name;?></td>
					</tr>
				</tbody>
			</table>
		<?php
		}				
	}
}



//function that prints out every group ordered by letter
function groupTeams($teamGroup){
	global $db_connect;

	$query = 'SELECT * FROM teams';
	$result = mysqli_query($db_connect, $query);
	?>

	
	<table>
		<tbody>
			<?php
			//for each row that exist with a specific letter, print table
			while($row = $result->fetch_assoc()) {
				
				if ( "{$row['group_nr']}"  == $teamGroup){
					?>
					<tr>
						<td><img class="flag" src="img/<?php echo "{$row['team_flag']}"; ?>" /></td>
						<td><?php echo "{$row['team_name']}"; ?></td>
						
						<!-- hämtar funktionen som räknar ut lagpoängen -->
						<td><?php echo teamPoints("{$row['team_id']}"); ?></td>
					</tr>
					<?php
				}
			}	
			?>
		</tbody>
	</table>
<?php
}


function teamPoints($team_id) {
	global $db_connect;
	$points = 0;

	//hämtar all info från game_match och results.
	//Vill ha alla matchers resultat för att kunna räkna ut hur många poäng varje lag har.
	$query = "SELECT game_match.*, results.* FROM game_match 
			RIGHT JOIN results
			ON results.game_id = game_match.game_id
			WHERE home_team = $team_id OR away_team = $team_id";

  	$result = $db_connect->query($query);
  	//var_dump($result);
  	while ($row = mysqli_fetch_assoc($result)) {

  		if($row["home_team"] == $team_id) {
  			if($row["goal_home"] > $row["goal_away"]){
  				$points = $points +3;
  			}
  		}
  		else if ($row["away_team"] == $team_id){
  			if($row["goal_away"] > $row["goal_home"]){
  				$points = $points +3;
  			}
  		}
  		
  		if($row["goal_away"] == $row["goal_home"]){
  			$points = $points +1;
  		}
  	}
  	
  	return $points;
}
?>
	
<?php include 'includes/footer.php'; ?>