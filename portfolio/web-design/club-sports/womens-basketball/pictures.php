<?php $title= "| Pictures";
$desc= "The Women's Club Basketball program at The College of New Jersey is a student-run organization that travels to other colleges and universities to play in tournaments. This is the pictures page, where a gallery of the women's club basketball team in action is posted.";
include ('top.php'); ?>

			<div class="header"><img src="images/headers/pic-header.png" alt="Pictures" /></div>
            <div class="gallery">
                <div id="wbasket" class="slides">
                <a href="pictures/team11.jpg"><img src="pictures/team11.jpg" onload="h_refslides('wbasket');" alt="" /></a>
                <a href="pictures/01.jpg"><img src="pictures/01.jpg" alt="" /></a>
                <a href="pictures/02.jpg"><img src="pictures/02.jpg" alt="" /></a>
                <a href="pictures/03.jpg"><img src="pictures/03.jpg" alt="" /></a>
                <a href="pictures/04.jpg"><img src="pictures/04.jpg" alt="" /></a>
                <a href="pictures/team10.jpg"><img src="pictures/team10.jpg" alt="" /></a>
                </div>
            </div>
            <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('wbasket',-1)" />
            <input type="image" src="images/next.png" align="right" onclick="h_nav('wbasket',1)" />
            </div>

<?php include ('bottom.php'); ?>
