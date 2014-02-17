		<?php
            
            include('config.php');
            
            switch($_GET['state']) {
    
                case "add": if(isset($_POST['submit'])) {
                    if(empty($_POST['title'])) {
                        $error['title'] = 'A title is required.';
                    }
                    if(empty($_POST['content'])) {
                        $error['content'] = 'Content is required.';
                    }
             
                    if(sizeof($error) == 0) {
                        $sql = "INSERT INTO blog (post_id, title, content, postdate)
								VALUES (null, '{$_POST['title']}', '{$_POST['content']}', NOW())";
                        mysql_query($sql);
             
                        echo "<p>Your blog post has been saved.</p>";
                    } 
                }	
            break;
            
            case "delete": if($_GET['post']) {
                $sql = "DELETE FROM blog WHERE post_id = '{$_GET['post']}' LIMIT 1";
                mysql_query($sql);
                echo "<p>Your post has been deleted.</p>";
            }
            break;
        } ?>
        
        <h1>This is a Blog.</h1>
    
        	<form method="post" action="index.php?state=add">
                <label>Post Title</label><br />
                <input type="text" name="title" size="93" /><br />
                <?php echo $error['title']; ?><br /><br />
                <label>Content</label><br />
                <textarea type="text" name="content" rows="15" cols="71"></textarea><br />
                <?php echo $error['content']; ?><br /><br />
                <input type="submit" name="submit" value="Post" />
        	</form>

            <table>
                <tr>
                    <th>Title</th>
                    <th>Date Added</th>
                    <th>Comments</th>
                    <th></th>
                </tr>
         
                <?php
         
                $sql = "SELECT post_id, title, DATE_FORMAT(postdate, '%M %d, %Y') AS formatteddate FROM blog ORDER BY postdate";
                $result = mysql_query($sql);
                while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    $sql2 = "SELECT * FROM comments WHERE post_id = '{$row['post_id']}'";
                    $result2 = mysql_query($sql2);
                    $comments = mysql_num_rows($result2);
                 
                    echo "<tr>";
                    echo "<td width='400px'><a href=\"view.php?title={$row['post_id']}\">{$row['title']}</a></td>";
                    echo "<td width='325px'>{$row['formatteddate']}</td>";
                    echo "<td style='width:50px; text-align:center;'>{$comments}</td>";
                    echo "<td width='175px'><a href=\"index.php?state=delete&post={$row['post_id']}\">Delete</a> - 
					<a href=\"edit.php?post_id={$row['post_id']}\">Edit</a></td>";
                    echo "</tr>";
                     
                } ?>
                 
            </table>
		</div>
    </div>
</body>
</html>