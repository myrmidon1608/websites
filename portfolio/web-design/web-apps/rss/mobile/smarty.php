<?php
			
	$smarty['lib'] = 'smarty/libs/';
	$smarty['templates'] = 'templates/';
	$smarty['templates_c'] = 'templates_c/';
			
	include($smarty['lib'] . 'Smarty.class.php');
			
	$tpl = new Smarty();
	$tpl -> template_dir = $smarty['templates'];
	$tpl -> compile_dir = $smarty['templates_c'];
	
	include ('../../../../scripts/nmoore.php');
	mysql_connect($host, $user, $password) or die('Not Connecting');
	mysql_select_db($database) or die ('No Database Selected');

?>