<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

	$x = $_POST['x'];
	$y = $_POST['y'];
    
	if(!empty($_POST)) {
        $q = "SELECT * FROM tiles WHERE xpos = ".($x - 1)." AND ypos = $y LIMIT 1";
        $lefttile = mysql_fetch_assoc(mysql_query($q));

        $q = "SELECT * FROM tiles WHERE xpos = ".($x + 1)." AND ypos = $y LIMIT 1";
        $righttile = mysql_fetch_assoc(mysql_query($q));

        $q = "SELECT * FROM tiles WHERE xpos = $x AND ypos = ".($y - 1)." LIMIT 1";
        $toptile = mysql_fetch_assoc(mysql_query($q));

        $q = "SELECT * FROM tiles WHERE xpos = $x AND ypos = ".($y + 1)." LIMIT 1";
        $bottomtile = mysql_fetch_assoc(mysql_query($q));
		
        $json = array();
		if($lefttile['occupied'] == 0) {
			$json["left"] = $lefttile['office'];
		}
		else {
			$json["left"] = '0';
		}
		if($righttile['occupied'] == 0) {
			$json["right"] = $righttile['office'];
		}
		else {
			$json["right"] = '0';
		}
		if($toptile['occupied'] == 0) {
			$json["top"] = $toptile['office'];
		}
		else {
			$json["top"] = '0';
		}
		if($bottomtile['occupied'] == 0) {
			$json["bottom"] = $bottomtile['office'];
		}
		else {
			$json["bottom"] = '0';
		}
        $output = json_encode($json);
        echo $output;
    }
    else
        echo "Nothing to see here.";
	
?>