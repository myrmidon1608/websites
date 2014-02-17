<html>
    <head>
        <title>BlogPosts</title>
        <style type="text/css">
            table {
                border: 1px solid #ccc;
                border-collapse: collapse;
            }
 
            th {
                text-align: left;
                background-color: #ccc;
                border-bottom: 2px solid #666;
                padding: 10px;
            }
 
            td {
                border: 1px solid #ccc;
                padding: 10px;
            }
 
        </style>
    </head>
    <body>
     
  <p><a href="blogindex.php">Back to index</a></p>
     
    <?php
 
    // Set the database access information
    $db_user = 'dynamicw';
	$db_password = '4ColoredSpheres';
	$db_host = 'localhost';
	$db_name = 'dynamicw_monaghan';
 
    // Connect to the database
    mysql_connect($db_host, $db_user, $db_password) or die('not connecting');
 
    // Select the database
    mysql_select_db($db_name) or die ('no database selected');
 
       $result3 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");
	   $result2 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");     
			
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
                if(empty($_POST['message']))
                {
                    $error['message'] = 'An entry is required';
                }
 
                // If there are no errors, add the song to the database
                // Otherwise, display errors
                if(sizeof($error) == 0)
                {
                    $sql3 = "UPDATE postings 
                             SET title = '{$_POST['title']}',
							 message = '{$_POST['message']}'
							 WHERE posting_id = {$_GET['posting_id']}";
                    mysql_query($sql3);
                 
                    // Display a confirmation
                    echo "<p style=\"color: #669900\">Your post has been added.</p>";
                 
                } 
				else 
				{
                 
                    // Display error messages
                    foreach($error as $value)
                    {
                        echo "<span style=\"color: #990000\">{$value}</span><br />"; 
                    }
 
                }
            
     $result3 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");
	   $result2 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");     
				
	
			}
    ?>
    
     <!-- Add song form -->
    <form method="post" action="blogedit.php?posting_id=<?php echo $_GET['posting_id']; ?>">
        <label>Title</label><br />
        <input name="title" type="text" value="<?php while($row = mysql_fetch_array($result2, MYSQL_ASSOC)){echo $row['title'];}; ?>" /><br /><br />
        <label>Comment</label><br />
        <textarea cols="40" rows="20" name="message" value=""><?php while($row = mysql_fetch_array($result3, MYSQL_ASSOC)){echo $row['message'];}; ?></textarea><br /><br />
        
        <input name="submit" type="submit" value="Save" />
    </form>
    
	</body>
    </html>