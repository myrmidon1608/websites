<?php

	$host = 'myrmidon16.db'; //'mysql1.000webhost.com'; 'localhost';
	$database = 'main'; //'a2031327_main'; 'myrmidon_main';
	$user = 'banjokazooie'; //'a2031327_myr'; 'myrmidon';
	$password = 'mumbo2jumbo';
	
	mysql_connect($host, $user, $password) or die('Not Connecting');
	mysql_select_db($database) or die ('No Database Selected');
	
?>