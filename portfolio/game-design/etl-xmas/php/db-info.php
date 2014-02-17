<?php

/*$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'testing_db';*/

$dbhost = 'mysql1.000webhost.com';
$dbname = 'a2031327_main';
$dbuser = 'a2031327_myr';
$dbpass = 'future04';

mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error Connecting');

mysql_select_db($dbname) or die ('No Database');

?>
