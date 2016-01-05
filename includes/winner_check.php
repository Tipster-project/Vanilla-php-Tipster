<?php	include "db_connect.php";
session_start();

//global $db_connect;
	$points = 0;
  $user_id = 5;
  $tournament_id = 7;

	//hämtar all info från game_match och results.
	//Vill ha alla matchers resultat för att kunna räkna ut hur många poäng varje lag har.
	$query = "SELECT extra_bets.*, results_extra.* 
            FROM extra_bets 
            RIGHT JOIN results_extra 
            ON results_extra.winner_team = extra_bets.winning_team AND results_extra.winner_player = extra_bets.winning_player 
            WHERE user_id = $user_id AND tournament_id = $tournament_id";

  	$result = $db_connect->query($query);
  	print_r($result);
  	while ($row = mysqli_fetch_assoc($result)) {
   
  		if($row["winning_player"] == $row["winner_player"]) {
  				$points = $points +3;
  			
  		}

      if($row["winning_team"] == $row["winner_team"]) {
          $points = $points +3;        
      }
  	}  	
  	echo $points;
?>