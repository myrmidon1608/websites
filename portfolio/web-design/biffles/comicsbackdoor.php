<?php session_start(); ?>
<html>
<head>
	<title>Backdoor</title>
	<script type="text/javascript" src="jquery-1.6.4.js"></script>
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

		function logout() {
			alert("Hello");
			$.ajax({
				url: "admincheck.php",
				dataType: "json",
				success: function() {
					alert("Hello");
				}
			});
		}
	</script>
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
</head>
<body onclose="logout();">
	<h3>Backdoor</h3>
	
	<?php
	
	if ($_SESSION['username']) {
		
		mysql_connect('localhost', 'dynamicw', '4ColoredSpheres') or die('Not Connecting');
		mysql_select_db('dynamicw_monaghan') or die ('No Database Selected');

		include('simpleimage.php');
		$uploadpath = 'comics/';
	
		if(isset($_POST['submit'])) {
			if(empty($_FILES['file']['name'])) {
				$error['file'] = 'A file is required.';
			}
			else {
				if($_FILES['file']['type'] != 'image/jpeg' && 
				$_FILES['file']['type'] != 'image/jpg' && 
				$_FILES['file']['type'] != 'image/png' && 
				$_FILES['file']['type'] != 'image/pjpeg') {
					$error['file'] = 'Invalid file type.';			
				}

				if ($_FILES['file']['error'] > 0) {
					$error['file'] = 'A general uploading error has occurred';
				}
			}
			
			if(sizeof($error) == 0) {
				if($_POST['panel'] == 'sixpanel') {
					$image = new SimpleImage();
					$panel = 6;
   					$image->load($_FILES['file']['tmp_name']);
					$image->resize(600,300);
   					$image->save($uploadpath . $_FILES['file']['name']);		
				}
				
				else if($_POST['panel'] == 'fourpanel') {
					$image = new SimpleImage();
					$panel = 4;
   					$image->load($_FILES['file']['tmp_name']);
					$image->resize(400,300);
   					$image->save($uploadpath . $_FILES['file']['name']);		
				}

				$sql = "INSERT INTO comics (comic_id, comicname, panel, upldate) VALUES (null, '{$_FILES['file']['name']}', " .$panel. ", NOW())";
				mysql_query($sql);
			}
			else {
				foreach($error as $value) {
					echo $value . "<br />";	
				}
			}
		}
		echo "<form method='post' enctype='multipart/form-data' action='comicsbackdoor.php'>";
		echo "<label>Image (.jpg or .png)</label><br />";
		echo "<input name='file' type='file' /><br /><br />";
		echo "<input type='radio' name='panel' value='sixpanel' checked='checked' />6";
		echo "<input type='radio' name='panel' value='fourpanel' />4";
		echo "<input type='submit' name='submit' value='Upload' /></form>";
		
		$sql = mysql_query("SELECT * FROM comics ORDER BY upldate DESC LIMIT 1");
		$comic = mysql_fetch_assoc($sql);
		echo "<img src='".$uploadpath.$comic['comicname']."' />";
		
		
		switch($_GET['state']) {
		case "add":
			if(isset($_POST['submit'])) {
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
					$_FILES['file']['type'] != 'image/pjpeg') {
						$error['file'] = 'Invalid file type.';			
					}
				if ($_FILES['file']['error'] > 0) {
					$error['file'] = 'A general uploading error has occurred';
				}
			}

			if(sizeof($error) == 0) {
				$sql = "INSERT INTO postings (posting_id, author, title, message, summary, postdate, filename)
						VALUES (null, '{$_POST['author']}', '{$_POST['title']}', '{$_POST['message']}', '{$_POST['summary']}', NOW(), '{$_FILES['file']['name']}')";
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
				$sql = "DELETE FROM postings WHERE posting_id = '{$_GET['post']}' LIMIT 1";
				mysql_query($sql);
			 
				echo "<p style=\"color: #669900\">Your post has been deleted.</p>";
			}
		break;
		}
		
		echo "<form method='post' enctype='multipart/form-data' action='comicsbackdoor.php?state=add'>";
		echo "<label>Author</label><br /><input name='author' type='text' /><br /><br />";
		echo "<label>Title</label><br /><input name='title' type='text' /><br /><br />";
		echo "<label>Post</label><br /><textarea class='tinymce' name='message' rows='10' cols='60' /></textarea><br />";
		echo "<label>Summary (250 Characters)</label><br /><textarea cols='60' rows='10' name='summary' type='text' /></textarea><br />";
		echo "<label>Image (.jpg or .png)</label><br /> <input name='file' type='file' /><br /><br />";
		echo "<input name='submit' type='submit' value='Save' /></form>";

		echo "<table>";
		echo "<tr>";
		echo "<th>Title</th>"; 
		echo "<th>Author</th>"; 
		echo "<th>Date Posted</th>"; 
		echo "<th>Comments</th>"; 
		echo "<th>Delete</th>"; 
		echo "<th>Edit</th>"; 
		echo "<th>Icon</th>"; 
		echo "</tr>"; 
			
		$sql = "SELECT posting_id, author, title, filename, DATE_FORMAT(postdate, '%M %d, %Y %T ') AS postdate, message FROM postings ORDER BY postdate ASC";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			echo "<tr>";
			echo "<td><a href=\"blogpage.php?posting_id={$row['posting_id']}\">{$row['title']}</a></td>";
			echo "<td><blogpage.php?posting_id={$row['posting_id']}\">{$row['author']}</td>";
			echo "<td>{$row['postdate']}</td>";
			echo "<td>{$responses}</td>";
			echo "<td><a href=\"comicsbackdoor.php?state=delete&post={$row['posting_id']}\">Delete</a></td>";
			echo "<td><a href=\"blogedit.php?posting_id={$row['posting_id']}\">Edit</a></td>";
			echo "<td><img src=\"icons/thumbnail_{$row['filename']}\" /></td>";
			echo "</tr>";
		}
	}
	
	else {include ('login.php');}
	?>

</body>
</html>