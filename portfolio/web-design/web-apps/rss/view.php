<!DOCTYPE html>
<head>
<?php include ('../../../scripts/nmoore.php');
	mysql_connect($host, $user, $password) or die('Not Connecting');
	mysql_select_db($database) or die ('No Database Selected');
	
	$sql = mysql_query("SELECT feedurl FROM feed WHERE feed_id = '{$_GET['rss']}' LIMIT 1");
    $url = mysql_fetch_array($sql);
	
	$doc = new DOMDocument();
	
	if(@$doc -> load($url['feedurl'])) {
        $channel = $doc -> getElementsByTagName('channel') -> item(0);
        $channel_title = $channel -> getElementsByTagName('title') -> item(0) -> nodeValue;
	}
	 ?>
<title><?php echo $channel_title. " | RSS Feed"; ?></title>
<meta name="description" content="" />
<link rel="stylesheet" href="../dynamic.css" />
<link rel="shortcut icon" href="../../../images/moore-icon.ico">
</head>
<body style="background:#FFFFFF;">
	<div class="rsscont">
    	<h4 align="right"><a href="index.php" style="color:#F00;">Back to RSS List</a></h4>
		<?php
 
        if(@$doc -> load($url['feedurl'])) {
            $channel = $doc -> getElementsByTagName('channel') -> item(0);
            $channel_title = $channel -> getElementsByTagName('title') -> item(0) -> nodeValue;
            $channel_link = $channel -> getElementsByTagName('link') -> item(0) -> nodeValue;
            $channel_desc = $channel -> getElementsByTagName('description') -> item(0) -> nodeValue;
            
			echo "<div class='rss'>";
            echo "<h2>" .$channel_title. "</h2>";
             
            foreach($doc -> getElementsByTagName('item') as $node) {
                $title = $node -> getElementsByTagName('title') -> item(0) -> nodeValue;
                $link = $node -> getElementsByTagName('link') -> item(0) -> nodeValue;
                $description = $node -> getElementsByTagName('description') -> item(0) -> nodeValue;
                $pubdate = $node -> getElementsByTagName('pubDate') -> item(0) -> nodeValue;
                 
                $formatteddate = date("F d, Y", strtotime($pubdate));
                 
                echo "<h4><a href=\"{$link}\" target=\"_blank\">{$title}</a> ({$formatteddate})</h4>";
                echo "<p>{$description}</p>";
                echo "<hr />";
            }
			
			echo "</div>";
			
        }
    	?>
    </div>
</body>
</html>