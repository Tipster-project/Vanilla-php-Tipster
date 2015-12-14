

<div id='tournament_reg'>
	<form action='reg_tournament.php' method='post'>
		<input type='text' name='tournament_name' placeholder='Group name'></br>
		<textarea name='tournament_text' placeholder='put in a funny text here!'></textarea></br>
		<!-- <input placeholder='Invite people!'></br> -->
		<input type='submit' name='tournament_reg_btn' value='skapa grupp'>
	</form>
</div>

<?php include "bet.php"; ?>

<?php include 'includes/footer.php' ?>