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
		<title>Joined on Creator ID</title>
	</head>
	
	<body>
		<h2>Below is the resulting table of joining the two tables!</h2>
		<table>
			<tr>
    			<th>Resource ID</th>
				<th>Creator ID</th>
				<th>Title</th>
        		<th>First Name</th>
        		<th>Last Name</th>
        		<th>Email</th>
			</tr>
    		<?php 
                $CreatorID = $_POST['CreatorID'];
                
    			$sql = 'SELECT RT.Resource_ID, RT.Creator_ID, RT.Title, CT.FirstName, CT.LastName, CT.Email
    					FROM Resource_Table AS RT INNER JOIN Creator_Table AS CT
    						ON RT.Creator_ID = CT.Creator_ID
    					WHERE CT.Creator_ID ='.$CreatorID.'
    					ORDER BY CT.Creator_ID ASC;';
    					
    			$result = $conn->query($sql);
    		
    			if($result->num_rows > 0){
    				while ($row = $result->fetch_assoc()){
    					echo "<tr>";
    					echo "<td>" . $row['Resource_ID'] . "</td>";
    					echo "<td>" . $row['Creator_ID'] . "</td>";
    					echo "<td>" . $row['Title'] . "</td>";
    					echo "<td>" . $row['FirstName'] . "</td>";
    					echo "<td>" . $row['LastName'] . "</td>";
    					echo "<td>" . $row['Email'] . "</td>";
    					echo "</tr>";
    				}
    			}		
    		?>
		</table>
		
		<?php $conn->close(); ?>
		  
		<br><a href="..\loginIndex.php"> Click here </a> to go to main menu.
	</body>
</html>