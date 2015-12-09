

<?php include 'includes/header.php'; ?>

<?php 

	$query = "SELECT * FROM tournament WHERE tournament_name = '" .$_GET['group']. "'";
	$result = $db_connect->query($query);
	$row = mysqli_fetch_assoc($result);

?>

<div class="group_head">
	 <h1><?php echo $row['tournament_name']; ?></h1>
	 <p><?php echo $row['tournament_text']; ?></p>
</div>
<?php

	$query = "SELECT * FROM user_tournaments WHERE tournament_id = '". $row['tournament_id'] ."' ORDER BY user_points DESC ";
	$result = $db_connect->query($query); ?>
	<div class="group_scoreboard">
	<?php while($row = mysqli_fetch_assoc($result)) { ?>

		<div>
			<p><?php echo $row['user_name']; ?> - <?php echo $row['user_points']; ?></p>
		</div>

	<?php } ?>
	</div>


<?php include 'includes/footer.php'; ?>