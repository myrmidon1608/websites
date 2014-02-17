<html>
    <head>
        <title>BlogPosts</title>
        <style type="text/css">
            table {border: 1px solid #ccc;
                border-collapse: collapse;}
 
            th {text-align: left;
                background-color: #ccc;
                border-bottom: 2px solid #666;
                padding: 10px;}
 
            td {border: 1px solid #ccc;
                padding: 10px;}
        </style>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="tinymce/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function() { 
            tinyMCE.init({
         
                theme : "advanced",
                mode : "textareas",
                remove_linebreaks : false,
         
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
     
    <?php
 
    $db_user = 'dynamicw';
	$db_password = '4ColoredSpheres';
	$db_host = 'localhost';
	$db_name = 'dynamicw_monaghan';
 
    mysql_connect($db_host, $db_user, $db_password) or die('not connecting');
 
    mysql_select_db($db_name) or die ('no database selected');
	
	include('simpleimage.php');

    switch($_GET['state'])
    {
        case "add":
 
            if(isset($_POST['submit']))
            {
                $error = array();
             
                if(empty($_POST['author'])) {
                    $error['author'] = 'An author is required';
                }
			 
                if(empty($_POST['title'])) {
                    $error['title'] = 'A title is required';
                }
             
                if(empty($_POST['message']))  {
                    $error['message'] = 'A post is required';
                }
				
                if(empty($_POST['summary'])) {
                    $error['summary'] = 'A summary is required';
                }
				
			if(!empty($_FILES['file']['name'])) {
				
					if($_FILES['file']['type'] != 'image/jpeg' && 
						$_FILES['file']['type'] != 'image/jpg' && 
						$_FILES['file']['type'] != 'image/png' && 
						$_FILES['file']['type'] != 'image/pjpeg'
					) {
						$error['file'] = 'Invalid file type.';			
					}
					
					if ($_FILES['file']['error'] > 0) {
						$error['file'] = 'A general uploading error has occurred';
					}
				}

                if(sizeof($error) == 0) {
                    $sql = "INSERT INTO postings (
                                posting_id,
								author,
                                title,
                                message,
								summary,
                                postdate,
								filename
                            ) VALUES (
                                null,
								'{$_POST['author']}',
                                '{$_POST['title']}',
                                '{$_POST['message']}',
								'{$_POST['summary']}',
                                NOW(),
								'{$_FILES['file']['name']}'
                            )";
                    mysql_query($sql);
                    
                     if(!empty($_FILES['file']['name'])) {
						$uploadpath = 'icons/';
					
						$image = new SimpleImage();
	   					$image->load($_FILES['file']['tmp_name']);
						$image->resize(180,270);
	   					$image->save($uploadpath . $_FILES['file']['name']);
						
						$image = new SimpleImage();
	   					$image->load($_FILES['file']['tmp_name']);
						$image->resize(25, 25);
	   					$image->save($uploadpath . 'thumbnail_' . $_FILES['file']['name']);
					}
                 
                    echo "<p style=\"color: #669900\">Your post has been added.</p>";
                 
                } else {
                    foreach($error as $value) {
                        echo "<span style=\"color: #990000\">{$value}</span><br />"; 
                    }
                }
            }
     
        break;
 
        case "delete":

            if($_GET['post']) {
                $sql = "DELETE FROM postings WHERE posting_id = '{$_GET['post']}' LIMIT 1";
                mysql_query($sql);
             
                echo "<p style=\"color: #669900\">Your post has been deleted.</p>";
            }
        break;
    }
	
	?>

        <form method="post" enctype="multipart/form-data" action="blogindex.php?state=add">
            <label>Author</label><br />
            <input name="author" type="text" /><br /><br />
            <label>Title</label><br />
            <input name="title" type="text" /><br /><br />
            <label>Post</label><br />
            <textarea class="tinymce" name="message" rows="10" cols="60" /></textarea><br />
            <label>Summary (250 Characters)</label><br />
            <textarea cols="60" rows="10" name="summary" type="text" /></textarea><br />
            <label>Image (.jpg or .png)</label><br />
            <input name="file" type="file" /><br /><br />
            
            
            <input name="submit" type="submit" value="Save" />
        </form>

        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Date Posted</th>
                <th>Comments</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>Icon</th>
        </tr>
     
        <?php
    
        $sql = "SELECT posting_id, author, title, filename, DATE_FORMAT(postdate, '%M %d, %Y %T ') AS postdate, message FROM postings ORDER BY postdate";
        $result = mysql_query($sql);
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $sql2 = "SELECT * FROM comments WHERE posting_id = '{$row['posting_id']}'";
            $result2 = mysql_query($sql2);
            $responses = mysql_num_rows($result2);
            
            echo "<tr>";
            echo "<td><a href=\"blogpage.php?posting_id={$row['posting_id']}\">{$row['title']}</a></td>";
            echo "<td><blogpage.php?posting_id={$row['posting_id']}\">{$row['author']}</td>";
            echo "<td>{$row['postdate']}</td>";
            echo "<td>{$responses}</td>";
            echo "<td><a href=\"blogindex.php?state=delete&post={$row['posting_id']}\">Delete</a></td>";
            echo "<td><a href=\"blogedit.php?posting_id={$row['posting_id']}\">Edit</a></td>";
            echo "<td><img src=\"icons/thumbnail_{$row['filename']}\" /></td>";
            echo "</tr>";
        }
         
        ?>
     
        </table>
    </body>
</html>