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
        
        <title>TinyMCE</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="tinymce/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function()
        { 
            // Initialize TinyMCE
            tinyMCE.init({
         
                // General options
                theme : "advanced",
                mode : "textareas",
                remove_linebreaks : false,
         
                // Theme options
                theme_advanced_buttons1 : "bold,italic,underline,justifyleft,justifycenter,justifyright,bullist,numlist,outdent,indent,separator,fontsizeselect,forecolor,separator,hyperlink,unlink,separator,code",
                theme_advanced_buttons2 : "",
                theme_advanced_buttons3 : "",
                theme_advanced_toolbar_location : "top",
                theme_advanced_toolbar_align : "left" 
            });
        });
     
        </script>
    </head>
    <body>
     
  <p><a href="comicsbackdoor.php">Back to index</a></p>
     
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
	
	include('simpleimage.php');
 
       $result3 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");
	   $result2 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");     
	   $result4 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}"); 
	   $result5 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}"); 
	   $result6 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}"); 
			
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
				
				 // Check for title
                if(empty($_POST['author']))
                {
                    $error['author'] = 'A title is required';
                }
             
                // Check for an entry
                if(empty($_POST['message']))
                {
                    $error['message'] = 'An entry is required';
                }
				
				  if(empty($_POST['summary']))
                {
                    $error['summary'] = 'An entry is required';
                }
				
				if(!empty($_FILES['file']['name']))
				{
				
					// Check for the file type
					if($_FILES['file']['type'] != 'image/jpeg' && 
						$_FILES['file']['type'] != 'image/jpg' && 
						$_FILES['file']['type'] != 'image/png' && 
						$_FILES['file']['type'] != 'image/pjpeg'
					)
					{
						$error['file'] = 'Invalid file type.';			
					}
					
					// Check for general upload errors
					if ($_FILES['file']['error'] > 0)
					{
						$error['file'] = 'A general uploading error has occurred';
					}
					
				}
			
			
			 
                // If there are no errors, add the song to the database
                // Otherwise, display errors
                if(sizeof($error) == 0)
                {
                    $sql3 = "UPDATE postings 
                             SET title = '{$_POST['title']}',
							 author = '{$_POST['author']}',
							 message = '{$_POST['message']}',
							 summary = '{$_POST['summary']}'
							 WHERE posting_id = '{$_GET['posting_id']}'";
                    mysql_query($sql3);
                    
                    if(!empty($_FILES['file']['name']))
					{
						$sql4 = "UPDATE postings SET filename = '{$_FILES['file']['name']}' WHERE posting_id = '{$_GET['posting_id']}'";
						mysql_query($sql4);
						
						$uploadpath = 'icons/';
					
						// Resize and upload image (http://www.white-hat-web-design.co.uk/blog/resizing-images-with-php/)
						$image = new SimpleImage();
	   					$image->load($_FILES['file']['tmp_name']);
						$image->resize(180,270);
	   					$image->save($uploadpath . $_FILES['file']['name']);
						
						// Resize and upload image (http://www.white-hat-web-design.co.uk/blog/resizing-images-with-php/)
						$image = new SimpleImage();
	   					$image->load($_FILES['file']['tmp_name']);
						$image->resize(25, 25);
	   					$image->save($uploadpath . 'thumbnail_' . $_FILES['file']['name']);
					}
					
					
                 
                    // Display a confirmation
                    echo "<p style=\"color: #669900\">Your post has been editied.</p>";	
                 
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
	   $result4 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");    
	   $result5 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");
	    $result6 = mysql_query("SELECT * FROM postings WHERE posting_id = {$_GET['posting_id']}");    
		
		$uploadpath = 'icons/';
				
	
			}
    ?>
    
    
     <!-- Add song form -->
    <form method="post" enctype="multipart/form-data" action="blogedit.php?posting_id=<?php echo $_GET['posting_id']; ?>">
        <label>Title</label><br />
        <input name="title" type="text" value="<?php while($row = mysql_fetch_array($result2, MYSQL_ASSOC)){echo $row['title'];}; ?>" /><br /><br />
        <label>Author</label><br />
        <input name="author" type="text" value="<?php while($row = mysql_fetch_array($result5, MYSQL_ASSOC)){echo $row['author'];}; ?>" /><br /><br />
        <label>Comment</label><br />
        <textarea cols="40" rows="20" name="message" value=""><?php while($row = mysql_fetch_array($result3, MYSQL_ASSOC)){echo $row['message'];}; ?></textarea><br /><br />
        <label>Summary (250 characters)</label><br />
        <textarea cols="40" rows="20" name="summary" value=""><?php while($row = mysql_fetch_array($result4, MYSQL_ASSOC)){echo $row['summary'];}; ?></textarea><br /><br />
        <label>Image (.jpg or .png)</label><br />
		<input name="file" type="file" /><br /><br />
        
        <input name="submit" type="submit" value="Save" />
    </form>
    
        <?php
		
		// Get icon
		$sql = "SELECT filename FROM postings WHERE posting_id = '{$_GET['posting_id']}'";
    	$result = mysql_query($sql);
    	$row = mysql_fetch_assoc($result);
		
		echo "<img src=\"icons/{$row['filename']}\" />";
		
		/*
		// Open photos directory 
		if ($handle = opendir($uploadpath)) 
		{
			
			$time = time();
			
			// Loop through directory
			while (false !== ($file = readdir($handle))) 
			{
				if ($file != "." && $file != "..") 
				{
            		// Print file name
            		echo "<img src=\"icons/" . $file . "?t={$time} \" /><br />";
        		}
			}
			
			// Close the directory
			closedir($handle);
		}
		*/

	?>
    
	</body>
    </html>