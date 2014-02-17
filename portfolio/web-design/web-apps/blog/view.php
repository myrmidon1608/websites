		<?php
            
            include('config.php');
	
			$sql = "SELECT title, content FROM blog WHERE post_id = '{$_GET['title']}' LIMIT 1";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			 
			echo "<h1>{$row['title']}</h1>";
			echo "<p>{$row['content']}</p>";
			
			if(isset($_POST['submit'])) {
				if(empty($_POST['comment'])) {
					$error['comment'] = 'A comment is required.';
				} 
				if(sizeof($error) == 0) {
					$sql = "INSERT INTO comments (comment_id, post_id, comment, commentdate)
							VALUES (null, '{$_GET['title']}', '{$_POST['comment']}', NOW())";
					mysql_query($sql);
					echo "<p>Your comment has been submitted.</p>";
					 
				} 
			}
		
		?>

        	<form method="post" action="view.php?title=<?php echo $_GET['title']; ?>">
                <label>Comment:</label><br />
                <input type="text" name="comment" value="" /><br />
                <?php echo $error['comment']; ?><br /><br />
                <input type="submit" name="submit" value="Save" />
            </form>
            
    	<hr />
     
    	<?php
     
		// Select answers from the database
		$sql = "SELECT comment_id, comment, DATE_FORMAT(commentdate, '%M %d, %Y') AS formatteddate FROM comments 
				WHERE post_id = '{$_GET['title']}' ORDER BY formatteddate";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			echo "{$row['formatteddate']}: {$row['comment']}<hr />";
		}
		 
		?>
    
    	<p><a href="index.php">&lt;&lt; Back to Blog</a></p>
        
        </div>
    </div>
</body>
</html>