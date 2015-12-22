<?php 
	include 'db_connect.php'; 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>Tipster</title>
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300,100' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,200,600,700,900' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css" type="text/css">

</head>
<body>	
	<div id='login'>
		<?php

		if(isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == 'true'){ ?>
			<a href="logout.php">Logga ut</a>
			Admin: <?php echo $_SESSION['user_name']; ?>
		<?php }else if(isset($_SESSION['user_loggedin']) && $_SESSION['user_loggedin'] == 'true'){?>
			<!-- <a href="logout.php">Logga ut</a> -->
			User: <?php echo $_SESSION['user_name']; ?>

		<?php }

		else{?>
			<!-- <form action='login_check.php' method='post'>
				<input type='text' name='login_email' placeholder='Email'>
				<input type='text' name='login_password' placeholder='Password'>
				<input type='submit' name='login_btn' value='Login'>
			</form>	 -->
		<?php } ?>

	</div><!-- #login -->
<!-- 
 	<nav role="navigation" class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
		    <!-- <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->
            <!-- <a href="#" class="navbar-brand">Tipster</a> -->
        <!--</div>
        <!-- Collection of nav links and other content for toggling -->
        <!--<div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="user_dash.php">Dina grupper</a></li>
                <li><a href="team_groups.php">Grupper & Matcher</a></li>
                <li><a href="results.php">Resultat</a></li>
                <li><a href="#">Regler</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logga ut</a></li>
            </ul>
        </div>
    </nav>
 -->
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="user_dash.php">Dina grupper <!-- <span class="sr-only">(current)</span> --></a></li>
        <li><a href="team_groups.php">Grupper & Matcher</a></li>
        <li><a href="results.php">Resultat</a></li>
        <li><a href="#">Skapa grupper</a></li>
        <li><a href="#">Spelregler</a></li>
      </ul>
      <!-- <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logga Ut</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	