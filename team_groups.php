<?php 
	include 'includes/header.php';

	$query = 'SELECT * FROM teams ORDER BY group_nr';

	$result = mysqli_query($db_connect, $query);
	$row = mysqli_fetch_assoc($result);
	?>
	
	<?php

	while($row = $result->fetch_assoc()) {
		?><h1><? echo "{$row['group_nr']} " . "{$row['team_name']}"; ?></h1><?
			
					}
					?>

<?php
	include 'includes/footer.php'; 
?>