<?php include 'includes/header.php'; ?>

<<<<<<< Updated upstream
<!-- ************************************ -->	
<!-- ************* GROUP A ************** -->
<!-- ************************************ -->
<?php
$queryA = 'SELECT * FROM teams ORDER BY team_points';
=======
<?php
include 'includes/header.php'; 

teamGroups('A');
teamGroups('B');
teamGroups('C');

function teamGroups($teamGroup){
global $db_connect;
>>>>>>> Stashed changes

$result = mysqli_query($db_connect, $queryA);
$row = mysqli_fetch_assoc($result);
?>

<<<<<<< Updated upstream
<h1>Group A</h1>
=======
<h1>Group <?php echo $teamGroup; ?></h1>
>>>>>>> Stashed changes
<table style="border:solid black 1px">
	<tbody>
		<tr>
			<th></th>
			<th>Team</th>
			<th>Points</th>
			<th>group</th>
		</tr>

		<?php
		while($row = $result->fetch_assoc()) {
			
			if ( "{$row['group_nr']}"  == "A"){
				?>
				<tr>
					<td><img src="img/<?php echo "{$row['team_flag']}"; ?>" /></td>
					<td><?php echo "{$row['team_name']}"; ?></td>
					<td><?php echo "{$row['team_points']}"; ?></td>
					<td><?php echo "{$row['group_nr']}"; ?></td>
				</tr>
				<?php
			}
		}	
		?>
	</tbody>
</table>
<<<<<<< Updated upstream

<!-- ************************************ -->	
<!-- ************* GROUP B ************** -->
<!-- ************************************ -->
<?php
$queryB = 'SELECT * FROM teams ORDER BY team_points';

$resultB = mysqli_query($db_connect, $queryB);
$rowB = mysqli_fetch_assoc($resultB);
?>

<h1>Group B</h1>
<table style="border:solid black 1px">
	<tbody>
		<tr>
			<th></th>
			<th>Team</th>
			<th>Points</th>
			<th>group</th>
		</tr>

		<?php
		while($rowB = $resultB->fetch_assoc()) {
			if ( "{$rowB['group_nr']}"  == "B"){
				?>
				<tr>
					<td><img src="img/<? echo "{$rowB['team_flag']}"; ?>" /></td>
					<td><? echo "{$rowB['team_name']}"; ?></td>
					<td><? echo "{$rowB['team_points']}"; ?></td>
					<td><? echo "{$rowB['group_nr']}"; ?></td>
				</tr>
				<?
			}
		}	
		?>
	</tbody>
</table>

<!-- ************************************ -->	
<!-- ************* GROUP C ************** -->
<!-- ************************************ -->
<?
$queryC = 'SELECT * FROM teams ORDER BY team_points ASC';

$resultC = mysqli_query($db_connect, $queryC);
$rowC = mysqli_fetch_assoc($resultC);
=======
<?php
}
>>>>>>> Stashed changes
?>

<h1>Group C</h1>
<table style="border:solid black 1px">
	<tbody>
		<tr>
			<th></th>
			<th>Team</th>
			<th>Points</th>
			<th>group</th>
		</tr>

		<?php
		while($rowC = $resultC->fetch_assoc()) {
			
			if ( "{$rowC['group_nr']}"  == "C"){
				?>
				<tr>
					<td><img src="img/<? echo "{$rowC['team_flag']}"; ?>" /></td>
					<td><? echo "{$rowC['team_name']}"; ?></td>
					<td><? echo "{$rowC['team_points']}"; ?></td>
					<td><? echo "{$rowC['group_nr']}"; ?></td>
				</tr>
				<?
			}
		}	
		?>
	</tbody>
</table>
	
<?php include 'includes/footer.php'; ?>