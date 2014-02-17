<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

    $q = mysql_query("SELECT empl_id, name, title, LEFT(description,40) as summary, icon, ifmet FROM team");
    $rows = mysql_num_rows($q);

    while($member = mysql_fetch_array($q, MYSQL_ASSOC)) { 
        for($i = 1; $i <= $rows; $i++) {
            if($member['empl_id'] == $i) {
                if($member['ifmet'] == 1) {
                    echo "<div class='team-list' style='cursor:pointer;' onclick='meetMember({$member['empl_id']});'>";
					echo "<img src=\"game/images/{$member['icon']}\" alt='' />";
                    echo "<span><b>{$member['name']}</b><br />";
                    echo "<em>{$member['title']}</em><br />";
                    echo "{$member['summary']}...</span></div>";
                }
                else {
                    echo "<div class='team-list'><img src=\"game/images/not-found.png\" alt='' />";
                    echo "<span><b>???</b><br />";
                    echo "<em>???</em><br />";
                    echo "404: Not Found</span></div>";
                }
            }
        }
    }

?>
