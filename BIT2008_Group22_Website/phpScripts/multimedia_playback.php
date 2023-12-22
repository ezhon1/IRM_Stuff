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
	
<!DOCTYPE html> 
<html>
	<head> 
		<title> Multimedia Playback</title> 
	</head> 
	<body> 
    	<?php
    		echo "Welcome ".$_SESSION['username']."!<br>";
    		$username = $_SESSION['username'];
    		
    		
    		$conn = new mysqli($servername, $server_username, $server_password, $dbname);
    		if ($conn->connect_error){
    		    die("Connection failed: " . $conn->connect_error);
    		}
    		
    		$sql = "SELECT * FROM multimedia ORDER BY IDofFile ASC;"; 
    		$result = $conn->query($sql);
    		
    		if(! $result ) {
    		  die('Could not get data');
    		}
    	?>
		<table>
			<tr>
        		<th> ID </th> 
                <th> File Name </th> 
                <th> File Type </th> 
                <th> URL </th> 
			</tr>
    		<?php 
        		while($row = $result->fetch_assoc()) {
        			echo "<tr> ". 
        			"<td>" . $row['IDofFile'] . "</td>".
        			"<td>" . $row['NameofFile'] . "</td>".
        			"<td>" . $row['TypeofFile'] . "</td>".
        			"<td> <a href='{$row['URL']}'> Click here </a> </td>".
        			"</tr> ";
        		}
    		?>
		</table>
    	<?php $conn->close(); ?>
    	
    	<a href="..\loginIndex.php"> Click here </a> to go to main menu.
	</body>
</html>