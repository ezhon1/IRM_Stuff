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
				$creatorID = $_POST['creatorID'];
				$title = $_POST['title'];
				$restID = $_POST['restID'];
			} 
			
			// attempt insert query execution
			$sql = "UPDATE Resource_Table SET Creator_ID='$creatorID', Title='$title', Resource_Type_ID='$restID' WHERE Resource_ID='$ID'";
			
			$query = $conn->query($sql); 
			
			if(!$query) {
				die('ERROR: ' .$conn->error);
			} else {
				echo "Record updated successfully. <br>";
				
				$sql = 'SELECT Resource_ID, Creator_ID, Title, Resource_Type_ID FROM Resource_Table';
	
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
