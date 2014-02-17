<?php 
	
	echo "<div class='current-post'>";

	$id = $_GET['posting_id'];
				
	if($id > 0) {
		$sql = mysql_query("SELECT title, author, content, DATE_FORMAT(postdate, '%M %D, %Y') AS date, filename FROM postings WHERE genre = " .$genre. " AND posting_id = " .$id);
	}
	else {
		$sql = mysql_query("SELECT title, author, content, DATE_FORMAT(postdate, '%M %D, %Y') AS date, filename FROM postings WHERE genre = " .$genre. " ORDER BY posting_id DESC LIMIT 1");
	}
	$post = mysql_fetch_assoc($sql);
	
	echo "<p><span>{$post['title']}</span>";
	echo "<span style='float:right;'>{$post['date']}</span></p>";
	echo "<p><b>{$post['author']}</b></p><br />";
	echo "<img src='../images/blog/{$post['filename']}' alt='' />";
	echo "<p>{$post['content']}</p></div>";
	
?>