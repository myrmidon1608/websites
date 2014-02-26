<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

    $q = mysql_query("SELECT empl_id, name, title, LEFT(description,60) as summary, image, ifmet FROM team");
    $rows = mysql_num_rows($q);

    while($member = mysql_fetch_array($q, MYSQL_ASSOC)) { 
        for($i = 1; $i <= $rows; $i++) {
            if($member['empl_id'] == $i) {
                if(isset($_SESSION['team' . $i])) {
                    echo "<div class='team-list' style='cursor:pointer;' onclick='meetMember({$member['empl_id']});'>";
					echo "<div class='team-icon' style=\"background:url('images/headshots/icon/{$member['image']}') no-repeat;\"></div>";
                    echo "<span><b>{$member['name']}</b><br />";
                    echo "<span class='team-title'>{$member['title']}</span><br />";
                    echo "{$member['summary']}...</span></div>";
                }
                else {
                    echo "<div class='team-list'><img src=\"images/not-found.png\" alt='' />";
                    echo "<span><b>404: Not Found</b></span></div>";
                }
            }
        }
    }

?>
