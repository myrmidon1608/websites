		<?php
		
			$title = "RSS Feed";
			$desc = "";
            
            include('config.php');
            
            switch($_GET['state']) {
    
                case "add": if(isset($_POST['submit'])) {
                    if(empty($_POST['rssurl'])) {
                        $error['rssurl'] = '<p>A RSS url is required.</p>';
                    }
					
					if(empty($_POST['rsstitle'])) {
                        $error['rsstitle'] = '<p>A title is required.</p>';
                    }
                    
                    if(sizeof($error) == 0) {
                        $sql = "INSERT INTO feed (feed_id, feedurl, channeltitle)
								VALUES (null, '{$_POST['rssurl']}', '{$_POST['rsstitle']}')";
                        mysql_query($sql);
             
                        echo "<p>Your rss has been saved.</p>";
                    } 
                }	
            break;
            
            case "delete": if($_GET['rss']) {
                $sql = "DELETE FROM feed WHERE feed_id = '{$_GET['rss']}' LIMIT 1";
                mysql_query($sql);
                echo "<p>Your feed has been deleted.</p>";
            }
            break;
        }    
        ?>
        
        <h1>This is a RSS Feed Viewer.</h1>
    
        	<form method="post" action="index.php?state=add">
                <label>URL: </label>
                <input type="text" name="rssurl" size="99" /><br />
                <?php echo $error['rssurl']; ?><br />
                <label>Title: </label>
                <input type="text" name="rsstitle" size="99" /><br />
                <?php echo $error['rsstitle']; ?><br />
                <input type="submit" name="submit" value="Submit" />
        	</form>
            
            <table>
                <tr>
                    <th>Feed Title</th>
                    <th></th>
                </tr>
                
                <?php
					$sql = "SELECT * FROM feed";
                $result = mysql_query($sql);
                while($row = mysql_fetch_array($result, MYSQL_ASSOC))
                {
						echo "<tr>";
						echo "<td width='275px'><a href='view.php?rss={$row['feed_id']}'>{$row['channeltitle']}</a></td>";
						echo "<td><a href='index.php?state=delete&rss={$row['feed_id']}'>Delete</a></td>";
						echo "</tr>";  
					}
                ?>
                
        </table><br />
        <h4>Check out our <a href="mobile/index.php" target="_blank">MOBILE</a> version!</h4>
		</div>
    </div>
</body>
</html>