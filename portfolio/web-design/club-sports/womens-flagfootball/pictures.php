<?php $title= "| Pictures";
$desc= "The Women's Flag Football club at The College of New Jersey is a student run organization that allows for competition against other schools in an environment without the vigors of varsity sports. This is the pictures page, where a gallery of the women's club flag football team in action is posted.";
include ('top.php'); ?>

        	<div class="header">
            <h2>Pictures</h2>
            </div>
            <div class="gallery">
                <div id="wcffb" class="slides">
                <a href="pictures/sample01.jpg"><img src="pictures/sample01.jpg" onload="h_refslides('wcffb');" alt="" /></a>
                <a href="pictures/sample02.jpg"><img src="pictures/sample02.jpg" alt="" /></a>
                <a href="pictures/sample03.jpg"><img src="pictures/sample03.jpg" alt="" /></a>
                <a href="pictures/sample04.jpg"><img src="pictures/sample04.jpg" alt="" /></a>
                <a href="pictures/sample05.jpg"><img src="pictures/sample05.jpg" alt="" /></a>
                </div>
            </div>
            <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('wcffb',-1)" />
            <input type="image" src="images/next.png" align="right" onclick="h_nav('wcffb',1)" />
            </div>

<?php include ('bottom.php') ?>