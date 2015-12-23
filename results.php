<?php include 'includes/header.php'; ?>
<?php include 'includes/menu.php'; ?>

<div class="container">
	<div class="row">
		<table class="table1 col-sm-12">
			<tbody>
		

			<?php
			$query = "SELECT T1.team_name as team_home, T2.team_name as team_away, 
			  				T1.team_flag as home_flag, T2.team_flag as away_flag, 
			  				T1.group_nr as home_team_number, T2.group_nr as away_team_number, 
			  				game_match.*
							FROM game_match, teams T1, teams T2
							WHERE T1.team_id=game_match.home_team AND T2.team_id=game_match.away_team ";

			$result = mysqli_query($db_connect, $query);
				
			while($row = mysqli_fetch_assoc($result)){

				$game_id = $row["game_id"];
				$group_nr = $row["home_team_number"];
				$home_name = $row["team_home"];
				$away_name = $row["team_away"];
				$home_flag = $row["home_flag"];
				$away_flag = $row["away_flag"];
				$game_start = $row['game_start'];
				?>
			
				<tr>
					<td style="width:20%"><?php echo date("d M H:i", strtotime($game_start)); ?></td>
					<td style="width:25%; text-align:right;"><?php echo $home_name;?></td>
					<td style="width:10%; text-align:center;"><img class="flag" src="img/<? echo $home_flag; ?>" /></td>
					<td style="width:10%; text-align:center;"> VS </td>
					<td style="width:10%; text-align:center;"><img class="flag" src="img/<? echo $away_flag; ?>" /></td>
					<td style="width:25%"><?php echo $away_name;?></td>
					<td>2</td>
					<td>-</td>
					<td>2</td>
				</tr>
				<?php							
			}
			?>
			</tbody>
		</table>
	</div><!--#row -->
</div><!-- #container -->
<?php include 'includes/footer.php'; ?>