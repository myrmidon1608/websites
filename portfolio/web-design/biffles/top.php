<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Biffles : <?php echo $btitle ?></title>
<meta name="description" content="<?php echo $bdesc ?>" />
<link rel="stylesheet" type="text/css" href="csspage.css" />
<script type="text/javascript" src="jquery-1.6.4.js"></script>
</head>
<body>
<?php

	$db_user = 'dynamicw';
	$db_password = '4ColoredSpheres';
	$db_host = 'localhost';
	$db_name = 'dynamicw_monaghan';
	
	mysql_connect($db_host, $db_user, $db_password) or die('not connecting');
    mysql_select_db($db_name) or die ('no database selected');

?>
	<div class="container">
        <div class="logo">
            <div style="width:269px; height:150px; float:left;"><img src="images/test-logo.jpg" style="padding:0px 17px;" /></div>
            <div style="width:469px; height:150px; float:right;"><img src="images/test-title.jpg" style="padding:0px 17px;" /></div>
        </div>
        
        <div class="nav">  
            <ul>
                <li><a href="index.php" onMouseOver="image1.src=loadImage1.src;" onMouseOut="image1.src=staticImage1.src;">
                <img src="images/home.png" alt="Home" /></a></li>
                <li><a href="comics.php">Comics</a></li>
                <li><a href="reviews.php">Reviews</a></li>
                <li><a href="questions.php">Questions</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </div>