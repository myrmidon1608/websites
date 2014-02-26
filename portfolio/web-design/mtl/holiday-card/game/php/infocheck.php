<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

	$id = $_POST['id'];
    $key = 'team' . $id;
    
    $_SESSION[$key] = 1;
    
        $q = "SELECT * FROM team WHERE empl_id = $id LIMIT 1";
        $member = mysql_fetch_assoc(mysql_query($q));
        //$met = $member['ifmet'];
        
        //$team_met = "SELECT SUM(ifmet) FROM team";
        
        /*if($met != 1) {
            mysql_query("UPDATE team SET ifmet = 1 WHERE empl_id = $id");
        }*/
        
        
        
        echo "<div class='member-pic' style=\"background:url('images/headshots/ie/{$member['image']}') no-repeat;\">";
        echo "<div class='member-title'><h3>{$member['name']}</h3>";
        if($member['nickname'] != "") {
            echo "<h5>\"{$member['nickname']}\"</h5>";
        }
        echo "<h4>{$member['title']}</h4></div></div>";
        echo "<div class='member-bio'><p>{$member['description']}</p>";
        if($member['fun_fact'] != "") {
            echo "<p><b>Did You Know?</b> {$member['fun_fact']}</p>";
        }
        echo "</div>";
	
?>