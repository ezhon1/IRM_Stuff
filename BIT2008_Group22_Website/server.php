<?php 
	if(!isset($_SESSION)){
		session_start();
	}

	include "connection.php";
	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$_SESSION['permissions'] = "";

	// connect to database
	$conn = new mysqli($servername, $server_username, $server_password, $dbname);
	
	// Check connection
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
		
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username	= mysqli_real_escape_string($conn, $_POST['username']);
		$fname	= mysqli_real_escape_string($conn, $_POST['fname']);
		$lname	= mysqli_real_escape_string($conn, $_POST['lname']);
		$email		= mysqli_real_escape_string($conn, $_POST['email']);
		$pasword_1	= mysqli_real_escape_string($conn, $_POST['pasword_1']);
		$pasword_2	= mysqli_real_escape_string($conn, $_POST['pasword_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($pasword_1)) { array_push($errors, "Pasword is required"); }

		if ($pasword_1 != $pasword_2) {
			array_push($errors, "The two passwords do not match");
		}
		//$pasword_1 = md5($pasword_1);//encrypt the pasword before saving in the database

		// check if username exists
		$query = "SELECT * FROM users WHERE username='$username'";
		$results = $conn->query($query);
		
		if($results->num_rows !=  0){
			array_push($errors, "This username already exists");
		}
			
			
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			//$pasword = md5($pasword_1);//encrypt the pasword before saving in the database

			$query = "INSERT INTO users (username, FirstName, LastName, email, pasword) VALUES('$username', '$fname', '$lname', '$email', '$pasword_1')";
			$conn->query($query);
			/*if($conn->query($query) === TRUE){
				echo "You are registered successfully<br>";
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}*/
			
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
		
			header('location: loginIndex.php');

		}
	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$pasword = mysqli_real_escape_string($conn, $_POST['pasword']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($pasword)) {
			array_push($errors, "Pasword is required");
		}

		if (count($errors) == 0) {
			//$pasword = md5($pasword);
			
			$query = "SELECT * FROM users WHERE username='$username' AND pasword='$pasword'";
			$results = $conn->query($query);

			if($results->num_rows ==  1){	
				// load the user permissions from the server
				while($row = $results->fetch_assoc()) {
					$_SESSION['permissions'] = $row["Permissions"];
				}
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: loginIndex.php');
			}else {
				array_push($errors, "Wrong username/pasword combination");
			}
		}
	}
	$conn->close();
?>