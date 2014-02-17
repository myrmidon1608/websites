<?php $title= "| Pictures";
$desc= "The Club Baseball program at The College of New Jersey is a great way for students to play America's Pastime without the rigor of a hectic varsity schedule. This is the pictures page, where you can browse a gallery of the club baseball team in action.";
include ('top.php'); ?>

            <div class="header"><img src="images/headers/pictures.png" alt="Pictures" /></div>
            <div class="gallery">
                <div id="mcb" class="slides">
                <a href="pictures/01.jpg"><img src="pictures/01.jpg" onload="h_refslides('mcb');" alt="" /></a>
                <a href="pictures/02.jpg"><img src="pictures/02.jpg" alt="" /></a>
                <a href="pictures/03.jpg"><img src="pictures/03.jpg" alt="" /></a>
                <a href="pictures/04.jpg"><img src="pictures/04.jpg" alt="" /></a>
                <a href="pictures/05.jpg"><img src="pictures/05.jpg" alt="" /></a>
                </div>
            </div>
            <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('mcb',-1)" />
            <input type="image" src="images/next.png" align="right" onclick="h_nav('mcb',1)" />
            </div>

<?php include ('bottom.php'); ?>
