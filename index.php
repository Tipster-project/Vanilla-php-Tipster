<?php 
	include 'includes/header.php'; 
?>
	<div class="container-fluid">
		<div class="row">
			<div class="field col-md-12">
				<p>Tipster</p>
				<div id='login'>
					
						<form action='login_check.php' method='post'>
							<input type='text' name='login_email' placeholder='Email'>
							<input type='text' name='login_password' placeholder='Password'>
							<input type='submit' name='login_btn' value='Login'>
						</form>	
					

				</div><!-- #login -->
				<div class="registrate">
					<!-- Trigger the modal with a link -->
					<a href='reg_index.php' class="link link-info link-lg" data-target="#myModal">Registrera här!</a>


					
					
				</div>
			</div><!-- #field -->

		</div>
	</div>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content" >
		    		<div class="title modal-header"></div>
					<div class="modal-body"></div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
		 
		    </div><!-- modal-content -->

	  	</div><!-- modal-dialog -->
	</div><!-- myModal -->
	

<div class="games">
	<?php games(); ?>
</div>

<?php
	
//funktion som hämtar ut dagens matcher
function games(){

	global $db_connect;
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
		
		//kollar om det är någon match idag och skriver ut det
		if(date('Ymd') == date('Ymd', strtotime($game_start))){
			?>
			<h4>Group <?php echo $group_nr; ?></h4>
			<?php
			echo $game_start . $home_name; ?>
			<img src="img/<? echo $home_flag; ?> "> VS 
			<img src="img/<? echo $away_flag; ?>"><? echo $away_name; ?></br><?
		}								
	}
}
?>

</div><!-- #background -->
<?php 
	include 'includes/footer.php'; 
?>