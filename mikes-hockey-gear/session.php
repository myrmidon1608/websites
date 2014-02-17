<?php

$host = '68.178.137.88';//'localhost';//
$database = 'mikeshockeygear';//'test';//
$user = 'mikeshockeygear';//'root';//
$password = 'Grumpy#1';//'';//

mysql_connect($host, $user, $password) or die('Not Connecting');
mysql_select_db($database) or die ('No Database Selected');

$q = mysql_query("SELECT value FROM mhg_counter");
$visitors = mysql_fetch_assoc($q);
$new = $visitors['value'] + 1;

mysql_query("UPDATE mhg_counter SET time = NOW(), value = " . $new . " WHERE value = " . $visitors['value']);

$q = mysql_query("SELECT value FROM mhg_counter");
$visitors = mysql_fetch_assoc($q);

$json = array("counter" => sprintf("%05d",$visitors['value']));
$output = json_encode($json);
echo $output;

?>