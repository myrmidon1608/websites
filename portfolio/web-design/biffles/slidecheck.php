<?php
	
	mysql_connect('localhost', 'dynamicw', '4ColoredSpheres') or die('Not Connecting');
    mysql_select_db('dynamicw_monaghan') or die ('No Database Selected');
	
	$slide = $_REQUEST['slide'];

	$sql = mysql_query("SELECT comicname FROM comics ORDER BY upldate DESC");
	$num = mysql_num_rows($sql);
	
	$json = array("slide" => $num);
	
	echo json_encode($json);
	
?>