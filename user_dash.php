<?php include 'includes/header.php' ?>

<div id='tournament_reg'>
	<h2>Skapa grupp</h2>
	<form action='reg_tournament.php' method='post'>
		<input type='text' name='tournament_name' placeholder='Group name'></br>
		<textarea name='tournament_text' placeholder='Put groupinformation here!'></textarea></br>
		<input name="invitation-email"placeholder='Invite people!'></br>
		<input type='submit' name='tournament_reg_btn' value='skapa grupp'>
	</form>
</div>

<?php include 'bet.php' ?>

<div class="container-fluid">
	<div class="row">

		<ul class="tabs">
		    <li class="tab1">
		        <input type="radio" name="tabs" id="tab1" checked />
		        <label for="tab1">Betta</label>
		        <div id="tab-content1" class="tab-content">
		          <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
		        </div>
		    </li>
		  
		    <li class="tab2">
		        <input type="radio" name="tabs" id="tab2" />
		        <label for="tab2">Scoreboard</label>
		        <div id="tab-content2" class="tab-content">
		          <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla?</p>
		        </div>
		    </li>

		     <li class="tab3">
		        <input type="radio" name="tabs" id="tab2" />
		        <label for="tab3">Skapa grupp</label>
		        <div id="tab-content3" class="tab-content">
		          <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla?</p>
		        </div>
		    </li>
		</ul>

		<br style="clear: both;" />


<!-- 		<div class="wrap col-sm-10">
  
  <ul class="tabs group">
    <li><a class="active" href="#/one">Light &</a></li>
    <li><a href="#/two">Sexy</a></li>
    <li><a href="#/three">Tabs</a></li>
  </ul>
  
  <div id="content">
    <p id="one">Some text about Light sit amet, consectetur adipisicing elit. Pariatur modi quod quo iure recusandae eligendi q.t, consectetur adipisicing elit. Pariatur </p>
    <p id="two">Sexy sexy  consectetur adipisicing elit. Pariatur modi quod quo iure recusandae eligendi q.t, consectetur adipisicing elit. Pariatur modi quod quo iureq</p>
    <p id="three">Tabs , consectetur adipisicing elit. Pariatur modi quod quo iure recusandae eligendi q.t, consectetur adipisicing elit. Pariatur modi quod quo iureq</p>
  </div>
  
</div> -->
		
			
	</div><!-- #row -->
</div><!-- #container-fluid -->



<?php include 'includes/footer.php' ?>