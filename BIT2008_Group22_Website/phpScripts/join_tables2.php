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
?>
<!DOCTYPE HTML>
<html>
	<head>
		
	</head>
	
	<body>
		<h2>Employee_Table Table</h2>
		<table>
			<tr>
				<th>Employee ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Work email</th>
				<th>Restricted Access</th>
				<th>Job ID</th>
			</tr>
				<?php 
				    $sql = 'SELECT * FROM Employee_Table;';
				    $result = $conn->query($sql);
	
    				if($result->num_rows > 0){
    					while ($row = $result->fetch_assoc()){
    						echo "<tr>";
    						echo "<td>" . $row['Employee_ID'] . "</td>";
    						echo "<td>" . $row['FirstName'] . "</td>";
    						echo "<td>" . $row['LastName'] . "</td>";
    						echo "<td>" . $row['Work_Email'] . "</td>";
    						echo "<td>" . $row['Restriced_Access'] . "</td>";
    						echo "<td>" . $row['Job_ID'] . "</td>";
    						echo "</tr>";
    					}
    				}
				?>
		</table>
				
		<h2>Job_Type Table</h2>
		<table>
    		<tr>
        		<th>Job_ID</th>
        		<th>Job Title</th>
        		<th>Job Type</th>
    		</tr>
    			<?php 
    				$sql = 'SELECT * FROM Job_Type;';
    				$result = $conn->query($sql);
    				
    				if($result->num_rows > 0){
    					while ($row = $result->fetch_assoc()){
    						echo "<tr>";
    						echo "<td>" . $row['Job_ID'] . "</td>";
    						echo "<td>" . $row['Job_Title'] . "</td>";
    						echo "<td>" . $row['Job_Type'] . "</td>";
    						echo "</tr>";
    					}
    				}
    			?>
		</table>
		<?php $conn->close(); ?>
		
		<br><br>
		
		Join two tables using a Job ID: <br>
		<form action = "join_tables_output2.php" method = "post">
			Job ID: <input type = "text" name = "JobID"> <br> 
			<input type = "submit">
		</form>
		  
		<a href="..\loginIndex.php"> Click here </a> to go to main menu.
	</body>
</html>