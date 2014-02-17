
<?php 

	include ('db-info.php');
		
	echo "<h3>View Blog Entry</h3>";

    $sql = mysql_query("SELECT * FROM postings WHERE posting_id = '{$_GET['posting_id']}' LIMIT 1");
    $blog = mysql_fetch_assoc($sql);
	
	if (strlen("{$blog['title']}") >= 25) {
		echo "<h2>{$blog['title']}</h2>";
	}
	else {
		echo "<h2>{$blog['title']}</h2>";
	}
	
	echo "<h4>{$blog['author']}</h4>";
	
	$message = str_replace('‘', '\'', $blog['content']);

    echo "<p>{$message}</p>";
     
?> 
