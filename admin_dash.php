<?php 
	include 'db_connect.php'; 
	session_start();
?>
<div id='team_reg'>
	<form action='team_reg.php' method='post'>

		<input type='text' name='country' placeholder='country'></br>
		<input type='text' name='group' placeholder='group'></br>
		<!-- <input type='text' name='group' placeholder='group'> -->
		<input type='submit' name='team_reg_btn' value='Registrate'>
	</form>	
</div>