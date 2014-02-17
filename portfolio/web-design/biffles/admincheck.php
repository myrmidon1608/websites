<?php session_start();

	mysql_connect('localhost', 'dynamicw', '4ColoredSpheres') or die('Not Connecting');
    mysql_select_db('dynamicw_monaghan') or die ('No Database Selected');
	
	echo "<p>You have successfully logged out! To log back in, <a href='index.php'>click here</a>.</p>";

	session_destroy();
	
?>