<?php
/**
This file gets a $_GET variabel named group wish contains the id of the tournament name you clicked to visit in the tournament list.
It check if that $_GET variabel is set and that there is a user logged in.
It does some checks to se so that no one is trying to reach a tournament that they shouldent
It takes this id to get all the information about the tournament like title and tounament text.
The other thing is that we get the scores from the users and sort them out with higest as number 1 and so on.
*/
 include 'includes/header.php'; ?>

<?php 
	// Checks if the $_GET variabel and the user_id $_SESSION is set
	if(isset($_GET['tour_id']) && isset($_SESSION['user_id'])){
		//Then se if there is a tournament with the same name as in the $_GET variabel.


		$query = "SELECT * FROM tournament WHERE tournament_id = '". $_GET['tour_id'] ."'";

		//$query = "SELECT * FROM tournament WHERE tournament_id = '". $_GET['tour_id'] ."'";


		$result = $db_connect->query($query);
		$row = mysqli_fetch_assoc($result);
		//If there isent any tournaments with the same name the query result will be NULL. Wich can meen that someone was trying
		//to change the $_GET variabel to get in to a group that they shouldent be in.
		if (is_null($row)) {

			echo 'Gruppen du letade efter finns inte eller så har du inte åtkomst. ^$_GET Check^';

		} else {
			//If there is a result from the previus query, make a variabel of the tournament_id. Because the table user_tournaments
			//dosent have the coulmn tournmanet_name, it just have a coulmn called tournament_id. And one variabel of $_SESSION['user_id']
			$tournament_id = $row['tournament_id'];
			$user_id = $_SESSION['user_id'];
			
			//Now we can check if there is a row that has both the values of the tournament_id and a value of the users id.  
			$query = "SELECT user_tournaments_id FROM user_tournaments WHERE user_id = $user_id AND tournament_id = $tournament_id ";
			$result = $db_connect->query($query);
			$check = mysqli_fetch_row($result);
			//If there isent a row that matches the two values we will get the result of NULL. 
			//then the user dosent have premission to the tournament so then the user will get a error message. 
			if(is_null($row)){
	
				echo 'Gruppen du letade efter finns inte eller så har du inte åtkomst. ^User_tournaments check^';
	
			} else { ?>
				<!-- if allt the checks goes well then the torunament name and text will get printed. -->
				<div class="group_head">
					<h1><?php echo $row['tournament_name']; ?></h1>
					<?php if(!$row['tournament_text'] == 0){ ?>
						<p><?php echo $row['tournament_text']; ?></p>
					<?php } ?>
				</div>
				
				<!-- Here we will get out how many points all the user has, the user name and then it is ordered by the
				score highest up.  -->
				<?php $query = "SELECT * FROM user_tournaments WHERE tournament_id = '". $row['tournament_id'] ."' ORDER BY user_points DESC ";
				$result = $db_connect->query($query); ?>
				<div class="group_scoreboard">
					<ul>
					<?php while($row = mysqli_fetch_assoc($result)) { ?>
							<!-- prints out the scoreboard. -->
							<li><?php echo $row['user_name']; ?> - <?php echo $row['user_points']; ?> poäng</li></br>
				
					<?php } ?>
					</ul>
				</div>
	
			<?php }
	
		}

	}else{ ?>	

			<div>
				<h1>Oh Oh! Something went a little bit wrong :/! Go back to your groups and try again.</h1>
				<a href="tournaments.php"><h1>Klicka här för komma till dina Turneringar!</h1></a>
			</div>	

	<?php } ?>

<?php include 'includes/footer.php'; ?>