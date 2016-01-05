<?php include 'includes/header.php' ?>
<?php include 'includes/menu.php'; ?>
<div class="container">
	<div class="row">
		<div id='tournament_reg col-sm-12'>
			<h2>Skapa grupp</h2>
			<form id="creat_group_form" action='reg_tournament.php' method='post'>
				<div class="picture">
					<input id="groupname" type='text' name='tournament_name' placeholder='Group name'>
					<img id="checked" style="display: none" class="hideImg" width="25px" height="25px" src="img/checked.png"><img id="uunchecked" style="display: none" class="hideImg" width="25px" height="25px" src="img/unchecked.png">
					<!--The p tag will contain the error messages for what is wrong with the value in input-->
					<p id="message">&nbsp;</p>

				</div>
				<textarea name='tournament_text' correct="correct" placeholder='Put groupinformation here!'></textarea></br>
				<input name="invitation-email" correct="correct" placeholder='Invite people!'></br>
				<button type='submit' name='tournament_reg_btn' value='skapa grupp'>Skapa Grupp</button>
				<p id="big-message">&nbsp;</p>
			</form>
		</div>
	</div><!-- #row -->
</div><!-- #container -->


<?php include 'includes/footer.php' ?>
<script src="js/create_group_check.js"></script>
