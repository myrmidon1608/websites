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
    
    $left = array(345, 347, 349, 350, 351, 352, 353, 404);
    $right = array(335, 345, 347, 349, 351, 353, 403);
    $top = array(352, 400);
    $bottom = array(234, 353);

    $office = array($left, $right, $top, $bottom);
    
	if(!empty($_POST)) {
        function officeCheck($arrayIndex, $tilePosition) {
            global $lefttile, $righttile, $toptile, $bottomtile, $json, $office;
            $tile = $tilePosition . "tile";
            
            for($i = 0; $i < count($office[$arrayIndex]); $i++) {
                if(${$tile}['office'] == $office[$arrayIndex][$i]) {
                    $json[$tilePosition] = '1';
                    return;
                }
                else {
                    $json[$tilePosition] = ${$tile}['bound'];
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