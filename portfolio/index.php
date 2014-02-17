<?php 

	include ('scripts/nmoore.php');
	include ('top.html');
	
	$sql = mysql_query("SELECT title, summary, date, image FROM updates ORDER BY date DESC LIMIT 5");
	$result = mysql_fetch_assoc($sql);
	$new_date = date('F jS, Y', strtotime($result['date']));
	
	echo "<div class='first-update'><img src=\"images/updates/{$result['image']}\" alt='' />";
	echo "<h3>{$result['title']}</h3>";
	echo "<p class='first-date'>{$new_date}</p>";
	echo "<p class='first-summary'>{$result['summary']}</p></div>";

	while($row = mysql_fetch_array($sql, MYSQL_ASSOC)) {
		$new_date = date('F jS, Y', strtotime($row['date']));
		
		echo "<div class='updates'><img src=\"images/updates/{$row['image']}\" alt='' />";
		echo "<h3>{$row['title']}</h3>";
		echo "<p>{$row['summary']}</p>";
		echo "<span>{$new_date}</span></div>";
	}
	
	echo "</div></div>";
	echo "<div class='contend'></div>";
	echo "</div><div style='display:none;'>";
	
	include('game-design/game-design.php'); 
	echo "</div><div style='display:none;'>";
	
	include('web-design/web-design.php');
	echo "</div><div style='display:none;'>";
	
	include('about-me/about-me.php');
	echo "</div><div style='display:none;'>";
	
	include('social-media/social.php');
	echo "</div>";
	
	include ('bottom.html'); ?>