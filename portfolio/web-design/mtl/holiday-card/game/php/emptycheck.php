<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

	$x = $_POST['x'];
	$y = $_POST['y'];
    
	if(!empty($_POST)) {
        $q = "SELECT office FROM tiles WHERE xpos = $x AND ypos = $y LIMIT 1";
        $office = mysql_fetch_assoc(mysql_query($q));
        
        if($office['office'] == 234) {
            echo 2;
        }
        else if(($office['office'] < 400 && $office['office'] != 0) || $office['office'] == 501) {
            echo 1;
        }
        else {
            echo 0;
        }    
    }
    else
        echo "Nothing to see here.";
	
?>