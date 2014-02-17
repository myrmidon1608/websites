<?php   $host = 'mysql1.000webhost.com';
		$database = 'a2031327_main';
		$user = 'a2031327_myr';
		$pw = 'future04';
			
		mysql_connect($host, $user, $pw) or die('Not Connecting');
		mysql_select_db($database) or die ('No Database Selected');
		
		echo "<form method='post' enctype='multipart/form-data' action='test.php'>";
		echo "<label>Image (.jpg or .png)</label><br />";
		echo "<input name='file' type='file' /><br />";
		echo "<input type='submit' name='submit' value='Upload' /></form>";
		
		if (isset($_POST["submit"])) {
			echo $_FILES['file']['name'];
		}
		
?>