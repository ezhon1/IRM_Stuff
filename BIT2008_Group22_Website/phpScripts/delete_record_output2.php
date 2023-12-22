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
		$sql = "DELETE FROM Creator_Table WHERE Creator_ID = '$ID'";
	}
	elseif ($_POST["attribute"] == "fname"){
		if (isset($_POST["attribute"])) { 
			echo 'You chose: ' .$_POST["attribute"]. ' <br>';
			// Escape user inputs for security
			$fname = $_POST['attributeValue'];

		} 
		$sql = "DELETE FROM Creator_Table WHERE FirstName = '$fname'";
	}
	elseif ($_POST["attribute"] == "lname"){
		if (isset($_POST["attribute"])) { 
			echo 'You chose: ' .$_POST["attribute"]. ' <br>';
			// Escape user inputs for security
			$lname = $_POST['attributeValue'];

		} 
		$sql = "DELETE FROM Creator_Table WHERE LastName = '$lname'";
		}
	elseif ($_POST["attribute"] == "email"){
		if (isset($_POST["attribute"])) { 
			echo 'You chose: ' .$_POST["attribute"]. ' <br>';
			// Escape user inputs for security
			$email = $_POST['attributeValue'];

		} 
		$sql = "DELETE FROM Creator_Table WHERE Email = '$email'";
		}
	elseif ($_POST["attribute"] == "creatID"){
		if (isset($_POST["attribute"])) { 
			echo 'You chose: ' .$_POST["attribute"]. ' <br>';
			// Escape user inputs for security
			$creatID = $_POST['attributeValue'];

		} 
		$sql = "DELETE FROM Creator_Table WHERE Creator_Type_ID = '$creatID'";
		}
//--------------------------------------------------------------------------------------------------------------	

	if ($conn->query($sql) === TRUE) {
		echo "Student deleted successfully";
		
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
		echo "Error deleting record: " . $conn->error;
	}	
	$conn->close();
	
	echo "<a href=\"..\loginIndex.php\">Click here </a> to go back to the main page.";	
?>

