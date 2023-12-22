<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
</head>
<body>
	<h2>Register</h2>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div>
			<label>Username</label>
			<input type="text" name="username">
		</div>
				<div>
			<label>First Name</label>
			<input type="text" name="fname">
		</div>
				<div>
			<label>Last Name</label>
			<input type="text" name="lname">
		</div>
		<div>
			<label>Email</label>
			<input type="email" name="email">
		</div>
		<div>
			<label>Password</label>
			<input type="pasword" name="pasword_1">
		</div>
		<div>
			<label>Confirm password</label>
			<input type="pasword" name="pasword_2">
		</div>
		<div>
			<button type="submit" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="Login.php">Sign in</a>
		</p>
	</form>
</body>
</html>