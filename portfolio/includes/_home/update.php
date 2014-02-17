    
<?php
    echo "<div class=\"update\">";
    
    $first_update = homepage_update();
    
    echo "<img src=\"images/updates/" . $first_update['image'] . "\" alt=\"\" />";
    echo "<h5>" . $first_update['title'] . "</h5>";
    echo "<p>" . $first_update['date'] . "</p>";
    echo "<p>" . $first_update['summary'] . "</p>";
    echo "<a href=\"#\" onclick=\"openModal('updatesModal'); return false;\">More Updates</a>";
            
    if(!logged_in()) include('callout.html');
   
    echo "</div>";