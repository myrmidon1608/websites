		<?php
        
		include ('config.php');
		
		$sql = mysql_query("SELECT feedurl FROM feed WHERE feed_id = '{$_GET['rss']}' LIMIT 1");
        $url = mysql_fetch_array($sql);
 
        $doc = new DOMDocument();
 
        if(@$doc -> load($url['feedurl'])) {
            $channel = $doc -> getElementsByTagName('channel') -> item(0);
            $channel_title = $channel -> getElementsByTagName('title') -> item(0)->nodeValue;
            $channel_link = $channel -> getElementsByTagName('link') -> item(0)-nodeValue;
            $channel_desc = $channel -> getElementsByTagName('description') -> item(0)->nodeValue;
            
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
    </div>
</body>
</html>