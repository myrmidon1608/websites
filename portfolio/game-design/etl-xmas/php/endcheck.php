<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');
    
	$sql = mysql_query("SELECT SUM(ifmet) FROM team");
	$team_met = mysql_fetch_assoc($sql);

	$json = array("end" => $team_met['SUM(ifmet)']);

    $output = json_encode($json);
    echo $output;
	
?>