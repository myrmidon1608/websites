<?php

	$sql = "SELECT feed_id, feedurl, channeltitle FROM feed ORDER BY feed_id";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$rss[] = array(
			'id' => $row['feed_id'],
			'url' => $row['feedurl'],
			'title' => $row['channeltitle']);
	}

	$tpl->assign('rss', $rss);
	
	$tpl->display('index.tpl'); 
				
?>