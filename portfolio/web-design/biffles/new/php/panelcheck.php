<?php
	
	include('db-info.php');

	$panel = array();
	$comic = array();
	$name = array($panel, $comic);
	
	$sql = mysql_query("SELECT comicname, panel FROM comics ORDER BY upldate DESC");

 	while($row = mysql_fetch_array($sql, MYSQL_ASSOC)) {
		//$name = $row['comicname'];
		$name[1][] = "images/comics/" . $row['comicname'];
		$name[0][] = $row['panel']; 	
 	}

	echo json_encode($name);

?>