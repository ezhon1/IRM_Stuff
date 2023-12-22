<?php
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		include_once ('Login.php'); // This will insure that login.php is included only once
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		include_once ('Login.php'); // This will insure that login.php is included only once
		$_SESSION['msg'] = "You must log in first";
	}
	include '../connection.php';
	
	$conn = new mysqli ($servername, $server_username, $server_password, $dbname);
	// Check connection
	if($conn->connect_error){
		die("ERROR: Could not connect. " . $conn->connect_error);
	}
	echo "Connected successfully<br>";

	echo"<h2>Creator Table</h2>";
	if (isset($_POST)) {

		// Escape user inputs for security
		$ID = $_POST['ID'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$creatID = $_POST['creatID'];
	}
	// attempt insert query execution
	$sql = "INSERT INTO Creator_Table (Creator_ID, FirstName, LastName, Email, Creator_Type_ID) VALUES ('$ID', '$fname', '$lname', '$email', '$creatID')";
	if($conn->query($sql)){
		echo "Record added successfully.<br>";
		
	$sql = 'SELECT Creator_ID, FirstName, LastName, Email, Creator_Type_ID FROM Creator_Table';
	
	$result = $conn->query($sql);
	if(!$result){
		echo "Could not get data: ".$conn->error;
	}
	
	while($row = $result->fetch_assoc()) {
		echo "Creator ID: {$row['Creator_ID']}  <br> ".
		"First Name: {$row['FirstName']} <br> ".
		"Last Name: {$row['LastName']} <br> ".
		"Email: {$row['Email']} <br> ".
		"Creator Type ID: {$row['Creator_Type_ID']} <br> ".
		"--------------------------------<br>";
	}
	echo "Fetched data successfully <br>";
		
	}else{
		echo "ERROR".$sql."<br>".$conn->error;
	}
			
	$conn->close();
	
	echo "<a href=\"..\loginIndex.php\">Click here </a> to go back to the main page.";	
?>
