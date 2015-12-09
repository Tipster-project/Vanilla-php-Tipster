
<?php
include 'includes/header.php'; 

teamGroups('A');
teamGroups('B');
teamGroups('C');

function teamGroups($teamGroup){
global $db_connect;

$query = 'SELECT * FROM teams ORDER BY team_points';

$result = mysqli_query($db_connect, $query);
$row = mysqli_fetch_assoc($result);
?>

<h1>Group <?php echo $teamGroup; ?></h1>
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
			
			if ( "{$row['group_nr']}"  == $teamGroup){
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
<?php
}
?>
	
<?php include 'includes/footer.php'; ?>