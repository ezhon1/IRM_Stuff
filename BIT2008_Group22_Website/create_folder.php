<?php
	echo 'whoami';
	
	session_start();
	$username = $_SESSION['username'];
	
	$url = "uploaded/$username";

	echo $url;
	
	
	if(is_dir($username) === false){
		//echo "Folder ".$url. " was created!<br>";
		//mkdir($dir);
		//mkdir($url, 0777, true);
		
		if (!is_dir($url)) {
	    	mkdir($url, 755, true);
	    	echo 'Folder was created';
	
	    }else{
	    	echo 'not working';
	    }
	
		/*if (!mkdir($url)){
			die('Failed to create folders...');
		}
			//chmod($url, 0777);
		}else{
			echo "not working";
		}*/
	}
	$file_to_write = 'test.txt';
	$content_to_write = "The content";

	
	$file = fopen($url . '/' . $file_to_write,"w");
	
	echo '<br>';
	
	fwrite($file, $content_to_write);
		echo '<br>';

	// closes the file
	fclose($file);
		echo '<br>';

	// this will show the created file from the created folder on screen
	
	include $url . '/' . $file_to_write;
	
?>