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

<?php
	//if (!isset($_SESSION['username'])) {
	//}
	
	echo "Welcome ".$_SESSION['username']."!<br>";
	$username = $_SESSION['username'];
	if(isSet($_POST['submit'])) {
		$filename = $_FILES['fileToUpload']['name']; 
		$temp = $_FILES['fileToUpload']['tmp_name']; 
		$target_dir = "uploads/";
		$url = "http://group22.atwebpages.com/$target_dir";
		
	
		if(is_uploaded_file($temp)) {   	
		    
		    $temp = base64_encode(file_get_contents(addslashes($temp)));
			
			$target_file = "../" . $target_dir . basename($_FILES['fileToUpload']['name']);

			$uploadOk = 1;
			$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "<br>Sorry, file already exists.";
				$uploadOk = 0;
			}
	
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 10000000) {
				echo "<br>Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats
			if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
			&& $fileType != "gif" && $fileType != "mp3" && $fileType != "mp4" ){
				echo "<br>Sorry, only JPG, JPEG, PNG, GIF, MP3, MP4 files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "<br>Sorry, your file was not uploaded.";
			}else{
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The file ". $filename . " has been uploaded.";
					
					$conn = new mysqli ($servername, $server_username, $server_password, $dbname);
					if($conn->connect_error){
					    die("ERROR: Could not connect. " . $conn->connect_error);
					}
					echo "Connected successfully<br>";
					
					$url = "http://group22.atwebpages.com/$target_dir/$filename";
					// The SQL query
					$sql = "INSERT INTO multimedia (Username, DataofFile, TypeofFile, NameofFile, URL) 
                            VALUES ('$username', '$temp', '$fileType', '$filename', '$url');";
					echo '<p>File successfully saved in database. </p>';  
					
					$successful_upload = $conn->query($sql);
				} else {
	        		echo "<br>Sorry, there was an error uploading your file.";
	    		}
			}
		}
	}
?>



<!DOCTYPE html> 
<html>
  <head> 
    <title> Multimedia Upload </title> 
  </head> 
  <body> 
     <h1> Multimedia Upload </h1> 
    <form action="multimedia_upload.php" method="POST" enctype="multipart/form-data"> 
      <input type="file" name="fileToUpload" /> <br /> <br /> 
      <input type="submit" name="submit" value ="Upload" /> 
    </form>
    <a href="..\loginIndex.php"> Click here </a> to go to main menu.
  </body> 
</html>
