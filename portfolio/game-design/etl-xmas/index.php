<?php

include ('php/db-info.php');

mysql_query("UPDATE team SET ifmet = 0");

include ('top.html');

include('start-screen.html');

include('end-screen.html');

include ('game/arrows.html');

include ('world.html');

include ('bottom.html');

?>