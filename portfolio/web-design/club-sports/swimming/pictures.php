<?php $title= "| Pictures";
$desc= "The Club Swimming program at The College of New Jersey is a great way to participate in swim meets and events throughout the semester without the rigor of a hectic varsity schedule. This is the pictures page, where a gallery of the club swim team in action is posted.";
include ('top.php'); ?>

                    <div class="header"><p>Pictures</p></div>
                    <div class="gallery">
                        <div id="swim" class="slides">
                        <a href="pictures/sample01.jpg"><img src="pictures/sample01.jpg" onload="h_refslides('swim');" alt="" /></a>
                        <a href="pictures/sample02.jpg"><img src="pictures/sample02.jpg" alt="" /></a>
                        <a href="pictures/sample03.jpg"><img src="pictures/sample03.jpg" alt="" /></a>
                        <a href="pictures/sample04.jpg"><img src="pictures/sample04.jpg" alt="" /></a>
                        <a href="pictures/sample05.jpg"><img src="pictures/sample05.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('swim',-1)" />
                    <input type="image" src="images/next.png" align="right" onclick="h_nav('swim',1)" />
                    </div>

<?php include ('bottom.php'); ?>
