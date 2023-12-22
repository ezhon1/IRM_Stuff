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
		<title>Join on Creator ID</title>
	</head>
	
	<body>
		<h2>Resource_Table Table</h2>
		<table>
			<tr>
				<th>Resource ID</th>
				<th>Creator ID</th>
				<th>Title</th>
				<th>Resource Type</th>
			</tr>
				<?php 
				    $sql = 'SELECT * FROM Resource_Table;';
				    $result = $conn->query($sql);
	
    				if($result->num_rows > 0){
    					while ($row = $result->fetch_assoc()){
    						echo "<tr>";
    						echo "<td>" . $row['Resource_ID'] . "</td>";
    						echo "<td>" . $row['Creator_ID'] . "</td>";
    						echo "<td>" . $row['Title'] . "</td>";
    						echo "<td>" . $row['Resource_Type_ID'] . "</td>";
    						echo "</tr>";
    					}
    				}
				?>
		</table>
				
		<h2>Creator_Table Table</h2>
		<table>
    		<tr>
        		<th>Creator_ID</th>
        		<th>First Name</th>
        		<th>Last Name</th>
        		<th>Email</th>
        		<th>Creator Type ID</th>
    		</tr>
    			<?php 
    				$sql = 'SELECT * FROM Creator_Table;';
    				$result = $conn->query($sql);
    				
    				if($result->num_rows > 0){
    					while ($row = $result->fetch_assoc()){
    						echo "<tr>";
    						echo "<td>" . $row['Creator_ID'] . "</td>";
    						echo "<td>" . $row['FirstName'] . "</td>";
    						echo "<td>" . $row['LastName'] . "</td>";
    						echo "<td>" . $row['Email'] . "</td>";
    						echo "<td>" . $row['Creator_Type_ID'] . "</td>";
    						echo "</tr>";
    					}
    				}
    			?>
		</table>
		<?php $conn->close(); ?>
		
		<br><br>
		
		Join two tables using a Creator ID: <br>
		<form action = "join_tables_output.php" method = "post">
			Creator ID: <input type = "text" name = "CreatorID"> <br> 
			<input type = "submit">
		</form>
		  
		<a href="..\loginIndex.php"> Click here </a> to go to main menu.
	</body>
</html>