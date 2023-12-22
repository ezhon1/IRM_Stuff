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
	

	if ($_POST["attribute"] == "ID") {
		if (isset($_POST["attribute"])) { 
			echo 'You chose: ' .$_POST["attribute"]. ' <br>';
			// Escape user inputs for security
			$ID = $_POST['attributeValue'];
		} 
		$sql = 'SELECT Resource_ID, Creator_ID, Title, Resource_Type_ID FROM Resource_Table WHERE Resource_ID = ' .$ID;
	}
	elseif ($_POST["attribute"] == "creatorID"){
		if (isset($_POST["attribute"])) { 
			echo 'You chose: ' .$_POST["attribute"]. ' <br>';
			// Escape user inputs for security
			$creatorID = $_POST['attributeValue'];

		} 
		$sql = "SELECT Resource_ID, Creator_ID, Title, Resource_Type_ID FROM Resource_Table WHERE Creator_ID = '$creatorID'";
	}
	elseif ($_POST["attribute"] == "title"){
		if (isset($_POST["attribute"])) { 
			echo 'You chose: ' .$_POST["attribute"]. ' <br>';
			// Escape user inputs for security
			$title = $_POST['attributeValue'];

		} 
		$sql = "SELECT Resource_ID, Creator_ID, Title, Resource_Type_ID FROM Resource_Table WHERE Title = '$title'";
	}
	elseif ($_POST["attribute"] == "restID"){
		if (isset($_POST["attribute"])) { 
			echo 'You chose: ' .$_POST["attribute"]. ' <br>';
			// Escape user inputs for security
			$restID = $_POST['attributeValue'];

		} 
		$sql = "SELECT Resource_ID, Creator_ID, Title, Resource_Type_ID FROM Resource_Table WHERE Resource_Type_ID = '$restID'";
	}
//--------------------------------------------------------------------------------------------------------------	

	$result = $conn->query($sql);
	if(!$result){
		echo "Could not get data: ".$conn->error;
	}
	
	while($row = $result->fetch_assoc()) {
		echo "Resource ID: {$row['Resource_ID']}  <br> ".
		"Creator ID: {$row['Creator_ID']} <br> ".
		"Title: {$row['Title']} <br> ".
		"Resource Type ID: {$row['Resource_Type_ID']} <br> ".
		"--------------------------------<br>";
	}
	echo "Search completed! <br>";
		
	$conn->close();
	
	echo "<a href=\"..\loginIndex.php\">Click here </a> to go back to the main page.";	
?>

