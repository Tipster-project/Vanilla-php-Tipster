<?php 
	include 'includes/header.php';
?>
<div id='team_reg'>
	<form action='team_reg.php' method='post' enctype='multipart/form-data'>

		<input type='text' name='country' placeholder='country'></br>
		<input type='text' name='group_reg' placeholder='group'></br>
		<input type='file' name='country_flag' accept='image/*' multiple>

		<input type='submit' name='team_reg_btn' value='Registrate'>
	</form>	
</div>
<?php include 'includes/footer.php'; ?>