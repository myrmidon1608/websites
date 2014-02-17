<?php $title= "| Pictures";
$desc= "The Co-Rec Flag Football club at The College of New Jersey is a student run organization that allows for competition against other schools in an environment without the vigors of varsity sports. This is the pictures page, where a gallery of the club co-rec flag football team in action is posted.";
include ('top.php'); ?>

        	<div class="header"><font>P</font><font>I</font><font>C</font><font>T</font><font>U</font><font>R</font><font>E</font><font>S</font></div>
       		<div class="gallery">
                <div id="corecff" class="slides">
                <a href="pictures/sample01.jpg"><img src="pictures/sample01.jpg" onload="h_refslides('corecff');" alt="" /></a>
                <a href="pictures/sample02.jpg"><img src="pictures/sample02.jpg" alt="" /></a>
                <a href="pictures/sample03.jpg"><img src="pictures/sample03.jpg" alt="" /></a>
                <a href="pictures/sample04.jpg"><img src="pictures/sample04.jpg" alt="" /></a>
                <a href="pictures/sample05.jpg"><img src="pictures/sample05.jpg" alt="" /></a>
                </div>
            </div>
            <div class="nav"><input type="image" src="images/prev.png" align="left" onclick="h_nav('corecff',-1)" />
            <input type="image" src="images/next.png" align="right" onclick="h_nav('corecff',1)" />
            </div>

<?php include ('bottom.php'); ?>