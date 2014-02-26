<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');
    
	//$sql = mysql_query("SELECT SUM(ifmet) FROM team");
	//$team_met = mysql_fetch_assoc($sql);
    
    if(($_SESSION['team1'] + $_SESSION['team2'] + $_SESSION['team3'] + $_SESSION['team4'] + $_SESSION['team5']
      + $_SESSION['team6'] + $_SESSION['team7'] + $_SESSION['team8'] + $_SESSION['team9'] + $_SESSION['team10']) == 10) {
        $json = array("end" => 10);
        $output = json_encode($json);
        echo $output;
        session_destroy(); 
    }
    
	
    
    
    
?>