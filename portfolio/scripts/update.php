<html>
<head>
<title>Update Backdoor</title>

<style>
table {border-collapse:collapse;}

th, td {padding:5px;
	border:1px solid #666666;}
</style>

</head>

<?php

	include ('nmoore.php');
			
	include('simpleimage.php');
	
	switch($_GET['state']) {
				
	case "add":
		if(isset($_POST['submit'])) {
			$error = array();
			if(empty($_POST['title'])) {
				$error['title'] = 'A title is required';
			}
			if(empty($_POST['summary'])) {
				$error['summary'] = 'A summary is required';
			}
			if(!empty($_FILES['file']['name'])) {
				if($_FILES['file']['type'] != 'image/jpeg' && 
				$_FILES['file']['type'] != 'image/jpg' && 
				$_FILES['file']['type'] != 'image/png' && 
				$_FILES['file']['type'] != 'image/pjpeg') {
					$error['file'] = 'Invalid file type.';			
				}
				if ($_FILES['file']['error'] > 0) {
					$error['file'] = 'A general error has occurred';
				}
			}
	
			if(sizeof($error) == 0) {
				$sql = "INSERT INTO updates (upd_id, title, summary, date, image) VALUES (null, '{$_POST['title']}', '{$_POST['summary']}', NOW(), '{$_FILES['file']['name']}')";
				mysql_query($sql);
					
				if(!empty($_FILES['file']['name'])) {
					$uploadpath = '../images/updates/';
					$image = new SimpleImage();
					$image->load($_FILES['file']['tmp_name']);
					$image->save($uploadpath . $_FILES['file']['name']);
				} 
				echo "<p style=\"color: #669900\">Your update has been added.</p>";
			}
			else {
				foreach($error as $value) {
					echo "<span style=\"color: #990000\">{$value}</span><br />"; 
				}
			}
		}
		break;
	
		case "delete":
	
			if($_GET['post']) {
				$sql = "DELETE FROM updates WHERE upd_id = '{$_GET['post']}' LIMIT 1";
				mysql_query($sql);
				 
				echo "<p style=\"color: #669900\">Your post has been deleted.</p>";
			}
		break;
	}
		
?>
		
<body>
    <form method="post" enctype="multipart/form-data" action="update.php?state=add">
        <label>Title</label><br /><input name="title" type="text" /><br /><br />
        <label>Summary</label><br /><textarea cols="60" rows="10" name="summary" type="text" /></textarea><br /><br />
        <label>Image (.jpg or .png)</label><br /> <input name="file" type="file" /><br /><br />
        <input name="submit" type="submit" value="Save" />
    </form>
    <table>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Summary</th> 
            <th>Delete</th> 
            <th>Edit</th>
        </tr> 		
	<?php 
    
		$sql = mysql_query("SELECT upd_id, title, summary, date, image FROM updates ORDER BY date DESC LIMIT 5");
		while($row = mysql_fetch_array($sql, MYSQL_ASSOC)) {
			echo "<tr><td>{$row['title']}</td>";
			echo "<td>{$row['date']}</td>";
			echo "<td style='width:500px;'>{$row['summary']}</td>";
			//echo "<td><a href=\"update.php?state=delete&post={$row['upd_id']}\">Delete</a></td></tr>";
			//echo "<td><a href=\"blogedit.php?posting_id={$row['upd_id']}\">Edit</a></td>";
		}
		
    ?>
	</table>
    
</body>
</html>