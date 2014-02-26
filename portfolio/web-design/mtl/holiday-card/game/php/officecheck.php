<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

	$x = $_POST['x'];
	$y = $_POST['y'];
    
    $q = "SELECT * FROM tiles WHERE xpos = ".($x - 1)." AND ypos = $y LIMIT 1";
    $lefttile = mysql_fetch_assoc(mysql_query($q));

    $q = "SELECT * FROM tiles WHERE xpos = ".($x + 1)." AND ypos = $y LIMIT 1";
    $righttile = mysql_fetch_assoc(mysql_query($q));

    $q = "SELECT * FROM tiles WHERE xpos = $x AND ypos = ".($y - 1)." LIMIT 1";
    $toptile = mysql_fetch_assoc(mysql_query($q));

    $q = "SELECT * FROM tiles WHERE xpos = $x AND ypos = ".($y + 1)." LIMIT 1";
    $bottomtile = mysql_fetch_assoc(mysql_query($q));

    $json = array();

    $left = array(242, 244, 350, 400, 403, 404);
    $right = array(242, 344, 337, 400, 403, 404);
    $top = array(344, 346, 348, 350, 400, 403, 404);
    $bottom = array(50, 400, 403, 404, 501);

    $office = array($left, $right, $top, $bottom);

    if(!empty($_POST)) {
        function officeCheck($arrayIndex, $tilePosition) {
            global $lefttile, $righttile, $toptile, $bottomtile, $json, $office;
            $tile = $tilePosition . "tile";

            for($i = 0; $i < count($office[$arrayIndex]); $i++) {
                if(${$tile}['occupied'] != 0 || ${$tile}['office'] == $office[$arrayIndex][$i]) {
                    $json[$tilePosition] = '0';
                    return;
                }
                else {
                    $json[$tilePosition] = ${$tile}['office'];
                }
            }
        }

        echo officeCheck(0, 'left');

        echo officeCheck(1, 'right');

        echo officeCheck(2, 'top');

        echo officeCheck(3, 'bottom');

        $output = json_encode($json);
        echo $output;
    }
    else
        echo "Nothing to see here.";
	
?>