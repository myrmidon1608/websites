<!DOCTYPE html>
<head>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $desc ?>" />
<link rel="stylesheet" href="../dynamic.css" />
<link rel="shortcut icon" href="../../../images/moore-icon.ico">
<?php include ('../../../scripts/nmoore.php');
	mysql_connect($host, $user, $password) or die('Not Connecting');
	mysql_select_db($database) or die ('No Database Selected'); ?>
</head>
<body>
	<div class="container">
    	<div class="nav">
        	<ul>
            	<li><a href="../index.php">Home</a></li>
                <li><a href="index.php">RSS</a></li>
                <li><a href="../blog/index.php">Blog</a></li>
                <li><a href="../songs.php">Songs</a></li>
                <li><a href="../form.php">Email</a></li>
                <li><a href="../madlibs.php">MadLibs</a></li>
                <li><a href="../trivia.php" target="_blank">Trivia</a></li>
        	</ul>
        </div>
        <div class="content">