<!DOCTYPE html>
<head>
<title>Intramural Sports <?php echo $title ?></title>
<meta name="description" content="<?php echo $desc ?>" />
<link rel="stylesheet" href="../intramurals.css" />
<script src="../scripts/intramurals.js"></script>
<script src="../scripts/intramur-tabs.js"></script>
</head>
<!--[if lte IE 7]><body class="ie"><![endif]-->
<body>
	<div class="container">
		<div class="top">
        <a href="#ACIS"><img src="../images/acis-fitness.png" style="width:170px; height:100px; margin:0px 45px 10px 45px;" alt="ACIS Fitness" /></a>
        <a href="../index.php"><img src="../images/logo.png" style="margin:0px 15px;" alt="Intramural Sports &amp; REC Center" /></a>
		<img src="../images/icon-map.png" alt="" usemap="#Map" />
			<map name="Map" id="Map">
				<area shape="rect" coords="19,2,61,47" href="#Facebook" alt="Facebook" />
				<area shape="rect" coords="83,2,126,47" href="#Twitter" alt="Twitter" />
                <area shape="rect" coords="147,2,175,46" href="#TCNJ_Home" alt="TCNJ Home" />
				<area shape="rect" coords="195,2,269,46" href="#TCNJ_Athletics" alt="TCNJ Athletics" />
			</map>
        <a href="#IMLeagues"><img src="../images/imleagues.jpg" style="margin:10px 0px 0px 18px;" alt="IMLeagues" /></a>
		</div>
		<div class="navbar">
			<ul class="drop">
				<li class="home"><a href="../index.php" class="main-list">HOME</a></li>
				<li class="sports"><a href="../intramurals.php" class="main-list" onmouseover="mopen('m1')" onmouseout="mclosetime()">INTRAMURAL SPORTS</a>
					<div id="m1" class="drop-int" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                        <a href="basketball.php">Example 1</a>
                        <a href="volleyball.php">Example 2</a>
                        <a href="intramural-handbook.php">Handbook</a>
					</div>
				</li>
				<li class="sports"><a href="../club-sports.php" class="main-list">CLUB SPORTS</a></li>
				<li class="min"><a href="../pec.php" class="main-list">PEC</a></li>
                <li><a href="../rec.php" class="main-list">REC CENTER</a></li>
				<li><a href="#TW_Fitness" class="main-list">TW FITNESS</a></li>
				<li><a href="#Aquatics" class="main-list">AQUATIC CENTER</a></li>
				<li class="min"><a href="../staff.php" class="main-list">STAFF</a></li>
				<li class="min" style="margin:0px;"><a href="../pictures.php" class="main-list">PICTURES</a></li>
			</ul>
		</div>
		<div class="content">
