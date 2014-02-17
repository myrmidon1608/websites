<?php   $host = 'myrmidon16.db';
		$database = 'main';
		$user = 'banjokazooie';
		$password = 'mumbo2jumbo';
			
		mysql_connect($host, $user, $password) or die('Not Connecting');
		mysql_select_db($database) or die ('No Database Selected');
		
?>