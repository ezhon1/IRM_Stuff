<?php
	if(!isset($_SESSION)){
		session_start();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
	<!--<link rel="stylesheet" type="text/css" href="style.css">-->
</head>
<body>
	<h2>Login Page</h2>
	
	<?php 
		//session_start();

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
	?>
		
		<!-- // notification message -->
 		<?php
 			if (!isset($_SESSION['username'])){
				echo "<h3>";
					echo $_SESSION['msg'];
				echo"</h3>";
			}else if (isset($_SESSION['success'])){
				echo "<h3>"; 
					echo $_SESSION['success']; 
					unset($_SESSION['success']);
				echo "</h3>";
			}
						
		?>			
						
		<!-- logged in user information -->
		<?php
			print_menu($_SESSION['permissions']);

			if (isset($_SESSION['username'])) {
				echo "<p>Welcome <strong>";
				echo $_SESSION['username'];
				echo "</strong></p>";

				if ($_SESSION['permissions'] == 1) {
					echo "<h3>";
						echo "This content is only shown to registered users <br>";
					echo "</h3>";
				}
				if ($_SESSION['permissions'] == 2 || $_SESSION['permissions'] == 1 ) {
					echo "<h3>";
						echo "This content is shown to administrators <br>";
					echo "</h3>";
				}
				echo "<p> <a href=\"loginIndex.php?logout='1'\" style=\"color: red;\">logout</a> </p>";
			}
			
		?>
</body>
</html>

<?php

	function print_menu($permissions){
		if ($permissions == 1) {
			echo "<h2>User Content!!</h2>";
			echo "<h3>";
			echo "<a href=\"phpScripts\search_record.php\">Click here</a> to search existing record. <br>";
			echo "<a href=\"phpScripts\search_record2.php\">Click here</a> to search existing records with options. <br>";
			echo "</h3>";
		}
		if($permissions == 2){
			echo "<h2>Admin Content!!</h2>";
			echo "<h3>";
			echo "<a href=\"phpScripts\add_new_record.php\">Click here</a> to add a new record to Resources Table. <br>";
			echo "<a href=\"phpScripts\add_new_record2.php\">Click here</a> to add a new record to Creator Table. <br><br>";
			echo "<a href=\"phpScripts\search_record.php\">Click here</a> to search existing records only with ID. <br>";
			echo "<a href=\"phpScripts\search_record2.php\">Click here</a> to search existing records with options. <br><br>";
			echo "<a href=\"phpScripts\update_record.php\">Click here</a> to update a record in Resource table. <br>";
			echo "<a href=\"phpScripts\update_record2.php\">Click here</a> to update a record in Creator table. <br><br>";
			echo "<a href=\"phpScripts\delete_record.php\">Click here</a> to delete a record from the Resource table. <br>";
			echo "<a href=\"phpScripts\delete_record2.php\">Click here</a> to delete a record from the Creator table. <br><br>";
			echo "<a href=\"phpScripts\join_tables.php\">Click here</a> to join two tables on Creator ID. <br>";
			echo "<a href=\"phpScripts\join_tables2.php\">Click here</a> to join two tables on Job ID. <br><br>";
			echo "<a href=\"phpScripts\multimedia_upload.php\">Click here</a> to upload multimedia to the database. <br>";
			echo "<a href=\"phpScripts\multimedia_playback.php\">Click here</a> to view multimedia from the database. <br>";
			echo "</h3>";
		}
		else{
			echo "<h3>";
			echo "This content is shown to everyone (Guest) <br>";
			echo "</h3>";
		}
	}
?>