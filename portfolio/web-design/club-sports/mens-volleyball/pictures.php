<?php $title= "| Pictures";
$desc= "The Men's Club Volleyball program at The College of New Jersey allows players to compete against other colleges without the vigors of a varsity schedule. This is the pictures page, where a gallery of the men's club volleyball team in action is posted.";
include ('top.php'); ?>

			<div class="header"><img src="images/headers/pic-header.png" alt="Pictures" /></div>
            <div class="gallery">
                <div id="mvball" class="slides">
                <a href="pictures/sample01.jpg"><img src="pictures/sample01.jpg" onload="h_refslides('mvball');" alt="" /></a>
                <a href="pictures/sample02.jpg"><img src="pictures/sample02.jpg" alt="" /></a>
                <a href="pictures/sample03.jpg"><img src="pictures/sample03.jpg" alt="" /></a>
                <a href="pictures/sample04.jpg"><img src="pictures/sample04.jpg" alt="" /></a>
                <a href="pictures/sample05.jpg"><img src="pictures/sample05.jpg" alt="" /></a>
                </div>
            </div>
            <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('mvball',-1);" />
            <input type="image" src="images/next.png" align="right" onclick="h_nav('mvball',1);" />
            </div>
            

<?php include ('bottom.php'); ?>