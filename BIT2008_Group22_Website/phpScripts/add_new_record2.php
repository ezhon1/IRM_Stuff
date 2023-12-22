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
//---------------------------------------------------------------------------------------------------------------	
	echo "To add new record... <br>";
	echo "<form action = \"add_new_record_output2.php\" method = \"POST\">
			Creator ID: <input type = \"text\" name = \"ID\"> <br>
			First Name: <input type = \"text\" name = \"fname\"> <br>
			Last Name: <input type = \"text\" name = \"lname\"> <br>
			Email: <input type = \"text\" name = \"email\"> <br>
			Creator Type ID: <input type = \"text\" name = \"creatID\"> <br>
			<input type = \"submit\">
		  </form> ";		  

	echo "<a href=\"..\loginIndex.php\">Click here </a> to go back to the Login main page.";	
?>