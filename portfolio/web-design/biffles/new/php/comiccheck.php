<?php
	
	include('db-info.php');

	$panel = array();
	$comic = array();
	$title = array();
	$date = array();
	$name = array($panel, $comic, $title, $date);
	
	$sql = mysql_query("SELECT comicname, title, panel, DATE_FORMAT(upldate, '%M %D, %Y') AS date FROM comics ORDER BY comic_id DESC");

 	while($row = mysql_fetch_array($sql, MYSQL_ASSOC)) {
		$name[0][] = $row['panel']; 
		$name[1][] = "images/comics/" . $row['comicname'];		
		$name[2][] = $row['title'];
		$name[3][] = $row['date'];
 	}

	echo json_encode($name);

?>