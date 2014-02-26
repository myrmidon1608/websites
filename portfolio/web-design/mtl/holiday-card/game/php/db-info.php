<?php

session_start();

$dbhost = '192.168.100.75';
$dbuser = 'aiAdmin';
$dbpass = 'dbAccess09';
$dbname = 'testing_db';

mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error Connecting');

mysql_select_db($dbname) or die ('No Database');

?>
