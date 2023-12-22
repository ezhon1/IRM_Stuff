<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		include_once ('login_updated.php'); // This will insure that login.php is included only once
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		include_once ('login_updated.php'); // This will insure that login.php is included only once
		$_SESSION['msg'] = "You must log in first";

	}
	include '../connection.php';
	
	$conn = new mysqli ($servername, $server_username, $server_password, $dbname);
	// Check connection
	if($conn->connect_error){
		die("ERROR: Could not connect. " . $conn->connect_error);
	}
	echo "Connected successfully<br>";
			
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
	echo "Fetched data successfully <br>";
//---------------------------------------------------------------------------------------------------------------	
	
	echo "<form action = \"update_record_output.php\" method = \"POST\">
			Enter the ID of the record you want to update.<br/>
			Resource ID: <input type = \"text\" name = \"ID\"> <br>
			Creator ID: <input type = \"text\" name = \"creatorID\"> <br>
			Title: <input type = \"text\" name = \"title\"> <br>
			Resource Type ID: <input type = \"text\" name = \"restID\"> <br>
			<input type = \"submit\">
		  </form> ";
		  	  
	echo "<a href=\"..\loginIndex.php\">Click here </a> to go back to the main page.";	
?>