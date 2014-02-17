<?php $title= "| Basketball";
$desc= "This page contains rules and information about participating in Intramural Basketball at The College of New Jersey."; 
include ('top.php'); ?>
			   
		<p><img src="sports-logos/basketball.png" alt="Basketball" /></p>
        	<div id="t1">
            <ul class="tabs">
                <li tabindex="0">Information</li>
                <li tabindex="0">Pictures</li>
            </ul>
			<div style="margin-top:16px;">
            	<div>
                <h4>Basketball Rules</h4>
                <p class="subtitle">GENERAL INFORMATION</p>
                <p>Bacon ipsum dolor sit amet tail sunt flank, ullamco in culpa tongue ut. Proident aliquip jowl, magna ham hock biltong ullamco voluptate pig aute jerky occaecat strip steak ex. Tempor sunt veniam quis meatloaf culpa leberkas non ex ut tongue. Cow kielbasa turkey dolor exercitation drumstick. Shank aute fugiat proident in consequat pork loin duis ham hock pig dolor tail reprehenderit. In veniam venison velit incididunt. Eiusmod shankle exercitation laboris hamburger beef ribs pastrami, laborum sausage.</p>						
                <p class="subtitle">THE GAME</p>
                <p>Incididunt pork ball tip sausage est tempor shoulder reprehenderit turducken. Boudin nostrud ut corned beef bacon ex turducken dolore ullamco. Laboris est qui tri-tip boudin nulla shoulder tail tempor voluptate jowl non minim chuck culpa. Pork chop shank aliqua, in ground round short ribs spare ribs beef ribs enim. Officia sirloin beef ribs, non cupidatat t-bone qui fatback in prosciutto culpa dolore. Kielbasa drumstick esse ut hamburger tempor anim excepteur turkey shankle sirloin short loin pork belly ad. Meatloaf pastrami velit, cow bacon proident fatback.</p>
                </div>
            	<div>
                <!--Pictures-->
                <h3>A-League Finals 2012</h3>
                    <div class="gallery">
                        <div id="aleague" class="slides">
                        <a href="pictures/basketball-12/a-league/01.JPG"><img src="pictures/basketball-12/a-league/01.JPG" onload="h_refslides('aleague');" alt="" /></a>
                        <a href="pictures/basketball-12/a-league/02.JPG"><img src="pictures/basketball-12/a-league/02.JPG" alt="" /></a>
                        <a href="pictures/basketball-12/a-league/03.JPG"><img src="pictures/basketball-12/a-league/03.JPG" alt="" /></a>
                        <a href="pictures/basketball-12/a-league/04.JPG"><img src="pictures/basketball-12/a-league/04.JPG" alt="" /></a>
                        <a href="pictures/basketball-12/a-league/05.JPG"><img src="pictures/basketball-12/a-league/05.JPG" alt="" /></a>
                    	</div>
                    </div>
                    <div class="nav"><input type="image" src="../images/prev.png" align="left" onclick="h_nav('aleague',-1)" />
                    <input type="image" src="../images/next.png" align="right" onclick="h_nav('aleague',1)" />
                    </div><br />
                <h3>B-League Finals 2012</h3>
                    <div class="gallery">
                        <div id="bleague" class="slides">
                        <a href="pictures/basketball-12/b-league/01.JPG"><img src="pictures/basketball-12/b-league/01.JPG" onload="h_refslides('bleague');" alt="" /></a>
                        <a href="pictures/basketball-12/b-league/02.JPG"><img src="pictures/basketball-12/b-league/02.JPG" alt="" /></a>
                        <a href="pictures/basketball-12/b-league/03.JPG"><img src="pictures/basketball-12/b-league/03.JPG" alt="" /></a>
                        <a href="pictures/basketball-12/b-league/04.JPG"><img src="pictures/basketball-12/b-league/04.JPG" alt="" /></a>
                        <a href="pictures/basketball-12/b-league/05.JPG"><img src="pictures/basketball-12/b-league/05.JPG" alt="" /></a>
                    	</div>
                    </div>
                    <div class="nav"><input type="image" src="../images/prev.png" align="left" onclick="h_nav('bleague',-1)" />
                    <input type="image" src="../images/next.png" align="right" onclick="h_nav('bleague',1)" />
                    </div>
                </div>
			</div>
        </div>
        
        <script>var t1 = new Spry.Widget.TabbedPanels("t1");</script> 

<?php include ('bottom.php'); ?>
