<?php $title= "| Pictures";
$desc= "The Club Field Hockey program at The College of New Jersey is a student-run organization that strives to play at a competitive level, while still having fun. This is the pictures page, where a gallery of the field hockey club in action is posted.";
include ('top.php'); ?>

			<div class="header"><img src="images/headers/pictures.png" alt="Pictures" /></div>
        	<div class="gallery">
            	<div id="fieldhoc" class="slides">
                <a href="pictures/01.jpg"><img src="pictures/01.jpg" onload="h_refslides('fieldhoc');" alt="" /></a>
                <a href="pictures/02.jpg"><img src="pictures/02b.jpg" alt="" /></a>
                <a href="pictures/03.jpg"><img src="pictures/03.jpg" alt="" /></a>
                <a href="pictures/04.jpg"><img src="pictures/04.jpg" alt="" /></a>
                <a href="pictures/05.jpg"><img src="pictures/05.jpg" alt="" /></a>
                </div>
            </div>
            <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('fieldhoc',-1)" />
            <input type="image" src="images/next.png" align="right" onclick="h_nav('fieldhoc',1)" />
            </div>

<?php include ('bottom.php'); ?>