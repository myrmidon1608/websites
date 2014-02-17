<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

	$id = $_POST['id'];
    
        $q = "SELECT * FROM team WHERE empl_id = $id LIMIT 1";
        $member = mysql_fetch_assoc(mysql_query($q));
        $met = $member['ifmet'];
        
        //$team_met = "SELECT SUM(ifmet) FROM team";
        
        if($met != 1) {
            mysql_query("UPDATE team SET ifmet = 1 WHERE empl_id = $id");
        }
        
        echo "<div class='member-info'><img src=\"game/images/{$member['image']}\" alt='' />";
        echo "<h3>{$member['name']}</h3>";
        echo "<h4>{$member['title']}<h4>";
        echo "<p>{$member['description']}</p></div>";
	
?>