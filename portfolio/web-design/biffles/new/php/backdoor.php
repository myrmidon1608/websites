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
		table {margin-left:50px;
			border:1px solid #ccc;
			border-collapse:collapse;}
 
		th {background:#ccc;
			text-align:left;
			padding 10px;
			border-bottom:2px solid #666;}
 
		td {padding:10px;
			border:1px solid #ccc;}
			
		form {float:left;}
		</style>
</head>
<body onclose="logout();">
	<?php
	
	if ($_SESSION['username']) {
		include ('db-info.php');
		
		// Comic Upload
		echo"<h3>Comic Upload</h3>";
		
		include('simpleimage.php');
		$uploadpath = '../images/comics/';
	
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
					$image = new SimpleImage();
   					$image->load($_FILES['file']['tmp_name']);
   					$image->save($uploadpath . $_FILES['file']['name']);
							
				if($_POST['panel'] == 'sixpanel') {
					$panel = 6;
					$image->resize(600,300);
   				}
				else if($_POST['panel'] == 'fourpanel') {
					$panel = 4;	
					$image->resize(400,300);
				}

				$sql = mysql_query("INSERT INTO comics (comic_id, comicname, title, panel, upldate) VALUES (null, '{$_FILES['file']['name']}', {$_POST['title']}, " .$panel. ", NOW())");
			}
			
			else {
				foreach($error as $value) {
					echo $value . "<br />";	
				}
			}
		}
		echo "<div style='height:350px;'><form method='post' enctype='multipart/form-data' action='backdoor.php'>";
		echo "<label>Comic File (.jpg or .png)</label><br />";
		echo "<input name='file' type='file' /><br /><br />";
		echo "<label>Comic Title</label><br />";
		echo "<input name='title' type='text' /><br /><br />";
		echo "<label>Number of Panels</label><br />";
		echo "<input type='radio' name='panel' value='sixpanel' checked='checked' />6";
		echo "<input type='radio' name='panel' value='fourpanel' />4";
		echo "<input type='submit' name='submit' value='Upload' /></form>";
		
		$sql = mysql_query("SELECT comicname, upldate FROM comics ORDER BY upldate DESC LIMIT 1");
		$comic = mysql_fetch_assoc($sql);
		echo "<img src='".$uploadpath.$comic['comicname']."' /></div>";
		
		// Blog Post Upload
		echo "<h3>Blog Upload</h3>";
		
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
				if(empty($_POST['content']))  {
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
				if($_POST['genre'] == 'media') {
					$genre = 0;
   				}
				else if($_POST['genre'] == 'games') {
					$genre = 1;
   				}
				
				$sql = "INSERT INTO postings (posting_id, author, title, content, summary, genre, postdate, filename)
						VALUES (null, '{$_POST['author']}', '{$_POST['title']}', '{$_POST['content']}', '{$_POST['summary']}', " .$genre. ", NOW(), '{$_FILES['file']['name']}')";
				mysql_query($sql);
				
				if(!empty($_FILES['file']['name'])) {
					$uploadpath = '../images/blog/';
					$image = new SimpleImage();
	   				$image->load($_FILES['file']['tmp_name']);
					$image->resize(270,200);
	   				$image->save($uploadpath . $_FILES['file']['name']);
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
		
		echo "<form method='post' enctype='multipart/form-data' action='backdoor.php?state=add'>";
		echo "<label>Author</label><br /><input name='author' type='text' /><br /><br />";
		echo "<label>Title</label><br /><input name='title' type='text' /><br /><br />";
		echo "<label>Post</label><br /><textarea class='tinymce' name='content' rows='10' cols='60' /></textarea><br /><br />";
		echo "<label>Summary (250 Characters)</label>";
		echo "<br /><textarea cols='60' rows='10' name='summary' type='text' /></textarea><br /><br />";
		echo "<label>Image (.jpg or .png)</label><br />";
		echo "<input name='file' type='file' /><br />Note: images resized to 270px by 200px<br /><br />";
		echo "<label>Genre</label><br />";
		echo "<input type='radio' name='genre' value='media' checked='checked' />Media";
		echo "<input type='radio' name='genre' value='games' />Games<br /><br />";
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
			
		$sql = "SELECT posting_id, author, title, DATE_FORMAT(postdate, '%M %d, %Y %T ') AS postdate, filename FROM postings ORDER BY postdate ASC LIMIT 10";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			echo "<tr>";
			echo "<td><a href=\"blogpage.php?posting_id={$row['posting_id']}\">{$row['title']}</a></td>";
			echo "<td><blogpage.php?posting_id={$row['posting_id']}\">{$row['author']}</td>";
			echo "<td>{$row['postdate']}</td>";
			echo "<td>{$responses}</td>";
			echo "<td><a href=\"backdoor.php?state=delete&post={$row['posting_id']}\">Delete</a></td>";
			echo "<td><a href=\"blogedit.php?posting_id={$row['posting_id']}\">Edit</a></td>";
			echo "<td><img src=\"../images/blog/{$row['filename']}\" style='width:35px; height:25px;' /></td>";
			echo "</tr>";
		}
	}
	
	else {include ('login.php');}
	?>

</body>
</html>