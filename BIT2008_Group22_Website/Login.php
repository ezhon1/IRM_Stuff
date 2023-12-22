<?php
	if(!isset($_SESSION)){
		session_start();
	}
	include('server.php');
?>
<!--
	User loging form that will send the user's username and password to server.php
	script to retrive (check if username and password are valid) data from the database.
	If username and password are valid, direct user to loginIndex.php
-->

<!DOCTYPE html>
<html>
<head>
	<title>Login system PHP and MySQL</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
</head>
<body>
	<h2>Login</h2>
	
	<form method="post" action="Login.php">

		<?php include('errors.php'); ?>
			
		<div>
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div>
			<label>Password</label>
			<input type="pasword" name="pasword">
		</div>
		<div>
			<button type="submit" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>