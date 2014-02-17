<html>
    <head>
        <title>Question / Answer</title>
    </head>
    <body>
 
    <!-- Back link -->
    <p><a href="blogindex.php">Back to index</a></p>
     
    <?php
     
    // Include MySQL configuration
    include('config.php');
     
    // Connect to the database
    mysql_connect($db_host, $db_user, $db_password) or die('not connecting');
     
    // Select the database
    mysql_select_db($db_name) or die ('no database selected');
     
    // Get question information
    $sql = "SELECT message FROM postings WHERE posting_id = '{$_GET['posting_id']}' LIMIT 1";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
     
    // Display question
    echo "<p>{$row['message']}</p>";
     
    // If the submit button has been pressed
    if(isset($_POST['submit']))
    {
        // Check for an answer
        if(empty($_POST['comment']))
        {
            $error['comment'] = 'A comment is required.';
        } 
     
        // If there are no errors
        if(sizeof($error) == 0)
        {
            // Insert a record into the database
            $sql = "INSERT INTO comments (
                    comment_id, 
                    posting_id, 
                    comment, 
                    commentdate
                ) VALUES (
                    null, 
                    '{$_GET['posting_id']}', 
                    '{$_POST['comment']}', 
                    NOW()
                )";
            mysql_query($sql);
             
            // Display a confirmation
            echo "<p class=\"confirmation\">Your post has been submitted.</p>";
             
        } 
    }
     
    ?>
     
    <!-- Answer form -->
    <form method="post" action="blogview.php?posting_id=<?php echo $_GET['posting_id']; ?>">
        <label>Submit your comment:</label><br />
        <input type="text" name="comment" value="" /><br /><br />
        <input type="submit" name="submit" value="Save" />
    </form>
     
    <hr />
     
    <?php
     
    // Select answers from the database
    $sql = "SELECT 
                comment_id, 
                comment, 
                DATE_FORMAT(commentdate, '%M %d, %Y') AS formatteddate 
            FROM 
                comments 
                WHERE 
                posting_id = '{$_GET['posting_id']}'
            ORDER BY 
                commentdate";
    $result = mysql_query($sql);
    while($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
        echo "{$row['formatteddate']}: {$row['comment']}<hr />";
    }
     
    ?>
     
    </body>
</html>