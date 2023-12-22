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
		<title>Joined on Job ID</title>
	</head>
	
	<body>
		<h2>Below is the resulting table of joining the two tables!</h2>
		<table>
			<tr>
    			<th>Employee ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Work email</th>
				<th>Restricted Access</th>
				<th>Job ID</th>
				<th>Job Title</th>
        		<th>Job Type</th>
			</tr>
    		<?php 
                $JobID = $_POST['JobID'];
                
    			$sql = 'SELECT ET.Employee_ID, ET.FirstName, ET.LastName, ET.Work_Email, ET.Restricted_Access, ET.Job_ID, JT.Job_Title, JT.Job_Type
    					FROM Employee_Table AS ET INNER JOIN Job_Type AS JT
    						ON ET.Job_ID = JT.Job_ID
    					WHERE JT.Job_ID ='.$JobID.'
    					ORDER BY JT.Job_ID ASC;';
    					
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
    					echo "<td>" . $row['Job_Title'] . "</td>";
    					echo "<td>" . $row['Job_Type'] . "</td>";
    					echo "</tr>";
    				}
    			}		
    		?>
		</table>
		
		<?php $conn->close(); ?>
		  
		<br><a href="..\loginIndex.php"> Click here </a> to go to main menu.
	</body>
</html>