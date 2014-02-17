<?php $title= "| Pictures";
$desc="The Intramural Sports &amp; Recreation Department provides members of The College of New Jersey community with an opportunity to participate in a wide variety of competitive activities on campus.";
include ('top.php'); ?>

		<p><img src="images/logos/intrasports.png" alt="Pictures" /></p>
        <div class="gallery">
            <div id="intramur" class="slides">
            <a href="pictures/old/ffb02.jpg"><img src="pictures/ffb02.jpg" onload="h_refslides('intramur');" alt="" /></a>
            <a href="pictures/old/girlshuddle.jpg"><img src="pictures/girlshuddle.jpg" alt="" /></a>
            <a href="pictures/old/bball01.jpg"><img src="pictures/bball01.jpg" alt="" /></a>
            <a href="pictures/old/group01.jpg"><img src="pictures/group01.jpg" alt="" /></a>
            <a href="pictures/old/group01.jpg"><img src="pictures/group02.jpg" alt="" /></a>
            </div>
        </div>
        <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('intramur',-1)" />
        <input type="image" src="images/next.png" align="right" onclick="h_nav('intramur',1)" />
        </div>
        

<?php include ('bottom.php'); ?>
