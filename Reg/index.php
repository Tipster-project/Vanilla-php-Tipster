<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="ajax.js"></script>
<body>
	<div id="main-wrapper">
		<form id="registrationform" action="reg.php" method="post">

			<label>Username</label><br>
			<input type="text" id="uName" name="username">
			<!--The div contains the driffrent images that will toggle if the valuse of input is correct or not.-->
			<div class="picture"><img src="img/checked.png" class="hideImg" id="uchecked"><img src="img/unchecked.png" class="hideImg" id="uunchecked"></div>
			<!--The p tag will contain the error messages for what is wrong with the value in input-->
			<p id="message">&nbsp;</p>

			<label>Password</label><br>
			<input type="password" id="psw" name="password">
			<!--The div contains the driffrent images that will toggle if the valuse of input is correct or not.-->
			<div class="picture"><img src="img/checked.png" class="hideImg" id="pswchecked"><img src="img/unchecked.png" class="hideImg" id="pswunchecked"></div>
			<!--The p tag will contain the error messages for what is wrong with the value in input-->
			<p id="pswMsg">&nbsp;</p>
			
			<label>Email</label><br>
			<input type="email" id="email" name="email">
			<!--The div contains the driffrent images that will toggle if the valuse of input is correct or not.-->
			<div class="picture"><img src="img/checked.png" class="hideImg" id="echecked"><img src="img/unchecked.png" class="hideImg" id="eunchecked"></div>
			<!--The p tag will contain the error messages for what is wrong with the value in input-->
			<p id="emailMsg">&nbsp;</p>
			
			<input type="submit" id="send" value="Submit">

		</form>
	</div>
</body>
</html>