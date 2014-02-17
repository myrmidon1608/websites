<?php
// Include MySQL configuration
    include('config.php');
     
    // Connect to the database
    mysql_connect($db_host, $db_user, $db_password) or die('not connecting');
     
    // Select the database
    mysql_select_db($db_name) or die ('no database selected');
	
	
 $sql = "SELECT posting_id, author, title, message FROM postings ORDER BY postdate DESC";
    $result = mysql_query($sql);

	
    while($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
	$date = "SELECT FORMAT_DATE(postdate, '%n/%d/%y') FROM postings WHERE posting_id = {$row['posting_id']} LIMIT 1";
	$d = mysql_fetch_assoc(mysql_query($date));
     echo "<tr>";
	 ?> 
     <h23> 
	 <?php echo "<td><a href=\"blogpage.php?posting_id={$row['posting_id']}\">{$row['title']}</a></td>";?>
     </h23> 
     <p class="author"> 
	 <?php 
	 echo "<td><blogpage.php?posting_id={$row['posting_id']}\">{$d['postdate']}</td>";
	 echo "<td><blogpage.php?posting_id={$row['posting_id']}\">{$row['author']}</td>";
	 ?>
     </p>
     <?php
     echo "</tr>";
	}
?>