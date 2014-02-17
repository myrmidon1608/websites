		<?php
            
            include('smarty.php');
            
            switch($_GET['state']) {
    
                case "add": if(isset($_POST['submit'])) {
                    if(empty($_POST['rssurl'])) {
						$error = assign('echo', 'A RSS url is required.');
                        $tpl -> $error;
						include('display.php');
                    }
					
					if(empty($_POST['rsstitle'])) {
						$error = assign('echo', 'A title is required.');
                        $tpl -> $error;
						include('display.php');
                    }
                    
                    if(sizeof($error) == 0) {
                        $sql = "INSERT INTO feed (feed_id, feedurl, channeltitle)
								VALUES (null, '{$_POST['rssurl']}', '{$_POST['rsstitle']}')";
                        mysql_query($sql);
             
                        $tpl -> assign('echo', 'Your rss has been saved.');
                    } 
                }	
				
				include('display.php');

            	break;
            
				case "delete": if($_GET['feed_id']) {
					$sql = "DELETE FROM feed WHERE feed_id = '{$_GET['feed_id']}' LIMIT 1";
					mysql_query($sql);
					$tpl -> assign('echo', 'Your feed has been deleted.');
				}
			
				include('display.php');
			
            	break;
			
				case "view": if($_GET['feed_id']) {

					$sql = "SELECT feedurl FROM feed WHERE feed_id = {$_GET['feed_id']} LIMIT 1";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
		
					$doc = new DOMDocument();
		
					if(@$doc -> load($row['feedurl'])) {
						$channel = $doc -> getElementsByTagName('channel') -> item(0);
						$channel_title = $channel -> getElementsByTagName('title') -> item(0) -> nodeValue;
						$channel_link = $channel -> getElementsByTagName('link') -> item(0) -> nodeValue;
						$channel_desc = $channel -> getElementsByTagName('description') -> item(0) -> nodeValue;
		
						foreach($doc -> getElementsByTagName('item') as $node) {
							$title = $node -> getElementsByTagName('title') -> item(0) -> nodeValue;
							$link = $node -> getElementsByTagName('link') -> item(0) -> nodeValue;
							$description = $node -> getElementsByTagName('description') -> item(0) -> nodeValue;
							$pubdate = $node -> getElementsByTagName('pubDate') -> item(0) -> nodeValue;
		
							$formatteddate = date("F d, Y", strtotime($pubdate));
							
							$items[] = array(
								'channel_title' => $channel_title,
								'link' => $link,
								'title' => $title,
								'description' => $description,
								'pubDate' => $formatteddate);       
						}
					}
				}
			$tpl -> assign('items', $items);
			$tpl -> display('view.tpl');
			
			break;
			
			default:
				include('display.php');
			}
		?>