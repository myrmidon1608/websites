<?php $title= "| Pictures";
$desc= "The Men's Club Soccer program at The College of New Jersey is a great way for students to play soccer without the rigor of a hectic varsity schedule. This is the pictures page, where you can find photos of the men's club soccer team in action.";
include ('top.php'); ?>

			<div class="header"><h1>Pictures</h1></div>
        	<div class="gallery">
                <div id="msoccer" class="slides">
                <a href="pictures/sample01.jpg"><img src="pictures/sample01.jpg" onload="h_refslides('msoccer');" alt="" /></a>
                <a href="pictures/sample02.jpg"><img src="pictures/sample02.jpg" alt="" /></a>
                <a href="pictures/sample03.jpg"><img src="pictures/sample03.jpg" alt="" /></a>
                <a href="pictures/sample04.jpg"><img src="pictures/sample04.jpg" alt="" /></a>
                <a href="pictures/sample05.jpg"><img src="pictures/sample05.jpg" alt="" /></a>
                </div>
            </div>
            <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('msoccer',-1)" />
            <input type="image" src="images/next.png" align="right" onclick="h_nav('msoccer',1)" />
            </div>

<?php include ('bottom.php') ?>