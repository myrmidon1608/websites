<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

	$x = $_POST['x'];
	$y = $_POST['y'];
    
	if(!empty($_POST)) {
        $q = "SELECT office FROM tiles WHERE xpos = $x AND ypos = $y LIMIT 1";
        $lefttile = mysql_fetch_assoc(mysql_query($q));

        $q = "SELECT office FROM tiles WHERE xpos = $x AND ypos = $y LIMIT 1";
        $righttile = mysql_fetch_assoc(mysql_query($q));

        $q = "SELECT office FROM tiles WHERE xpos = $x AND ypos = $y LIMIT 1";
        $toptile = mysql_fetch_assoc(mysql_query($q));

        $q = "SELECT office FROM tiles WHERE xpos = $x AND ypos = $y LIMIT 1";
        $bottomtile = mysql_fetch_assoc(mysql_query($q));
        $json = array(
            "left" => $lefttile['office'], "right" => $righttile['office'],
            "top" => $toptile['office'], "bottom" => $bottomtile['office']
        );

        $output = json_encode($json);
        echo $output;
    }
    else
        echo "Nothing to see here.";
	
?>