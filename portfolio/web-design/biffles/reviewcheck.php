<?php
	
	mysql_connect('localhost', 'dynamicw', '4ColoredSpheres') or die('Not Connecting');
	mysql_select_db('dynamicw_monaghan') or die ('No Database Selected');
	
	$ret = array();
	$sql = mysql_query("SELECT posting_id, author, title, summary, DATE_FORMAT(postdate, '%c/%e/%y ') AS formatteddate, filename FROM postings ORDER BY postdate DESC LIMIT 5");

 	while($row = mysql_fetch_array($sql, MYSQL_ASSOC)) {
		 $ret[] = "<img src='icons/".$row['filename']."' style='width:175px; height:175px; float:left; margin:0px 10px 10px 0px' alt='Icon' />
		 	<p style='text-align:right;'>".$row['formatteddate']."</p>
		 	<div style='height:40px;'><a href=\"blogpage.php?posting_id={$row['posting_id']}\" style='text-align:center; font-size:18px; padding:0px; margin:0px;'><p>".$row['title']."</p></a></div>
		 	<div style='height:75px;'><p>".$row['summary']."</p></div>
			<p style='text-align:right;'><i>".$row['author']."</i></p>"; 
 	}
	echo json_encode($ret);

?>