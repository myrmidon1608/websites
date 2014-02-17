		<?php
            
            include('config.php');
 
       		$result3 = mysql_query("SELECT * FROM Blog WHERE post_id = {$_GET['post_id']}");
	   		$result2 = mysql_query("SELECT * FROM Blog WHERE post_id = {$_GET['post_id']}");     
			
			// If the submit button has been pressed
            if(isset($_POST['submit']))
            {
                // Create an empty error array
                $error = array();
             
                // Check for title
                if(empty($_POST['title']))
                {
                    $error['title'] = 'A title is required';
                }
             
                // Check for an entry
                if(empty($_POST['content']))
                {
                    $error['content'] = 'Content is required';
                }
 
                // If there are no errors, add the song to the database
                // Otherwise, display errors
                if(sizeof($error) == 0)
                {
                    $sql3 = "UPDATE Blog 
                             SET title = '{$_POST['title']}',
							 content = '{$_POST['content']}'
							 WHERE post_id = {$_GET['post_id']}";
                    mysql_query($sql3);
                 
                    // Display a confirmation
                    echo "<p style=\"color: #669900\">Your blog has been updated.</p>";
                 
                } 
				else 
				{
                 
                    // Display error messages
                    foreach($error as $value)
                    {
                        echo "<span style=\"color: #990000\">{$value}</span><br />"; 
                    }
 
                }
            
     		$result3 = mysql_query("SELECT * FROM Blog WHERE post_id = {$_GET['post_id']}");
	    	$result2 = mysql_query("SELECT * FROM Blog WHERE post_id = {$_GET['post_id']}");     
			}
    	?>

            <form method="post" action="edit.php?post_id=<?php echo $_GET['post_id']; ?>">
                <label>Title</label><br />
                <input name="title" type="text" value="<?php while($row = mysql_fetch_array($result2, MYSQL_ASSOC)){echo $row['title'];}; ?>" /><br /><br />
                <label>Content</label><br />
                <textarea cols="40" rows="20" name="content" value=""><?php while($row = mysql_fetch_array($result3, MYSQL_ASSOC)){echo $row['content'];}; ?></textarea><br /><br />
                <input name="submit" type="submit" value="Save" />
            </form>
            
        <p><a href="index.php">&lt;&lt; Back to Blog</a></p>
        </div>
    </div>
</body>
</html>