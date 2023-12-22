<?php
	session_start();
	
	include "connection.php";

	$_SESSION["session_flag"] = 'valid';
	if (isset($_SESSION["session_flag"])) {
		if($_SESSION["session_flag"] == "valid") {

			$conn = new mysqli ($servername, $username, $password, $dbname);
			// Check connection
			if($conn->connect_error){
				die("ERROR: Could not connect. " . $conn->connect_error);
			}
			echo "Connected successfully";
			
			if (isset($_POST)) { 
				// Escape user inputs for security
				$ID = $_POST['ID'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$email = $_POST['email'];
				$creatID = $_POST['creatID'];
			} 
			
			// attempt insert query execution
			$sql = "UPDATE Creator_Table SET FirstName='$fname', LastName='$lname', Email='$email', Creator_Type_ID='$creatID' WHERE Creator_ID='$ID'";
			
			$query = $conn->query($sql); 
			
			if(!$query) {
				die('ERROR: ' .$conn->error);
			} else {
				echo "Record updated successfully. <br>";
				
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
				$conn->close();
				echo "<a href=\"login_check.php\"> Click here </a> to go to main menu."; 
			} else {
				echo "Invalid session!";
			}
	} else {
		echo "Session not set!"; 
		echo "<a href=\"loginIndex.html\">Click here </a> to go back to the main page.";		
	}
?>
