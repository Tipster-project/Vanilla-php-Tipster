<?php include 'includes/header.php' ?>
<?php include 'includes/menu.php'; ?>

<div class="container">
	<div class="row">
		<div id='tournament_reg col-sm-12'>
			<h2>Skapa grupp</h2>
			<form action='reg_tournament.php' method='post'>
				<input type='text' name='tournament_name' placeholder='Group name'></br>
				<textarea name='tournament_text' placeholder='Put groupinformation here!'></textarea></br>
				<input name="invitation-email"placeholder='Invite people!'></br>
				<button type='submit' name='tournament_reg_btn' value='skapa grupp'>Skapa Grupp</button
			</form>
		</div>
	</div><!-- #row -->
</div><!-- #container -->


<?php include 'includes/footer.php' ?>