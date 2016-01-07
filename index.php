<?php 
	include 'includes/header.php'; 
?>	<div class="logo">
		<!-- <img src="img/logo.png" alt=""> -->
	</div>
	
	<div class="container-fluid">
		<div class="row">

			<!-- <p class="col-sm-12">Tipster</p> -->
			<div class="field col-md-12">
				<div class="get_in col-sm-6 col-xs-11">

					<!-- LOGGA IN -->
					<div id='login' class="col-sm-12 col-md-6">
							<form action='login_check.php' method='post'>
								<input type='text' name='login_email' placeholder='Email'></br>
								<input type='password' name='login_password' placeholder='Password'></br>
								<button type='submit' name='login_btn' value='Login' class="login_button">Logga in</button>
							</form>	
					</div><!-- #login -->

					<!-- REGISTRERA -->
					<!-- Trigger the modal with a link -->
					<div class="registrate col-sm-12 col-md-6">
						<a href='reg_index.php' class="link link-info link-lg" data-target="#myModal">
							<button class="registrate_button">Registrera här!</button>
						</a>
					</div>

				</div><!-- #get_in -->
			</div><!-- #field -->

			<!-- INFORMATION -->
			<div class="info col-md-12">
				<h1>How it all works!</h1>
				<p>Tippa med dina vänner, bjud in och gå loss på betten. Bla bla bla...</p>
			</div>

		</div><!-- #row -->
	</div><!-- #container-fluid -->

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
	

<div class="gamesIndex col-sm-12">
	<div class="today col-sm-6">
		<?php gamesToday(); ?>
	</div>
	<div class="tomorrow col-sm-6">
		<?php gamesTomorrow(); ?>
	</div>
	
</div>

<?php
	
//funktion som hämtar ut dagens matcher
function gamesToday(){
	?><h1>Dagens matcher</h1><?php
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
			<h3>Group <?php echo $group_nr; ?></h3>
			<h4>
			<?php
			echo date("d F H:i", strtotime($game_start));
			?></h4><h4></br><?php echo $home_name; ?>

			<img src="img/<?php echo $home_flag; ?> ">  VS  
			<img src="img/<?php echo $away_flag; ?>"><?php echo $away_name; ?></h4
			></br><?php
		}							
	}
}

//funktion som hämtar ut morgondagens matcher
function gamesTomorrow(){
	?><h1>Morgondagens matcher</h1><?php
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

		
		$datetime = date('Ymd')+1;
		
		//kollar om det är någon match idag och skriver ut det
		if($datetime == date('Ymd', strtotime($game_start))){
			?>
			<h3>Group <?php echo $group_nr; ?></h3>
			<h4>
			<?php
			echo date("d F H:i", strtotime($game_start));
			?></h4><h4></br><?php echo $home_name; ?>
			<img src="img/<?php echo $home_flag; ?> ">  VS  
			<img src="img/<?php echo $away_flag; ?>"><?php echo $away_name; ?></h4
			></br><?php
		}								
	}
}

?>

</div><!-- #background -->
<?php 
	include 'includes/footer.php'; 
?>