<?php
	
	echo "<div class='blog-list'>";
	
	$sql = mysql_query("SELECT posting_id, title, author, summary, DATE_FORMAT(postdate, '%M %D, %Y') AS date FROM postings WHERE genre = " .$genre. " ORDER BY posting_id ASC LIMIT 5");
	
	while($list = mysql_fetch_array($sql, MYSQL_ASSOC)) {
		echo "<a href=\"" .$genre_type. ".php?posting_id={$list['posting_id']}\"><div>";
		echo "<h5>{$list['title']}</h5>";
		echo "<p>{$list['author']}</p>";
		echo "<p>{$list['summary']}</p>";
		echo "<p>{$list['date']}</p></div></a>";
	}

?>