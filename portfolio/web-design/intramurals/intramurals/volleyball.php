<?php $title= "| Volleyball";
$desc= "This page contains rules and information about participating in Intramural Volleyball at The College of New Jersey.";
include ('top.php'); ?>

		<p><img src="sports-logos/volleyball.png" alt="Volleyball" /></p>
        <div id="t1">
            <ul class="tabs">
                <li tabindex="0">Information</li>
                <li tabindex="0">Pictures</li>
            </ul>
			<div style="margin-top:16px;">
            	<div>
                <!--Information-->
                    <div class="season">
                    <h4>Spring 2012 Season</h4>
                        <div>
                        <a href="#"><img src="pictures/corec-volleyball-spring12.png" alt="Co-Rec Volleyball" /></a>
                        <br />Flyer
                        </div>
                    </div>
                    <div class="intrabar"></div>
                    <h4>Volleyball Rules</h4>
                    <p class="subtitle">GENERAL INFORMATION</p>
                    <p>Bacon ipsum dolor sit amet tail sunt flank, ullamco in culpa tongue ut. Proident aliquip jowl, magna ham hock biltong ullamco voluptate pig aute jerky occaecat strip steak ex. Tempor sunt veniam quis meatloaf culpa leberkas non ex ut tongue. Cow kielbasa turkey dolor exercitation drumstick. Shank aute fugiat proident in consequat pork loin duis ham hock pig dolor tail reprehenderit. In veniam venison velit incididunt. Eiusmod shankle exercitation laboris hamburger beef ribs pastrami, laborum sausage.</p>
                    <p class="subtitle">THE GAME</p>
                    <p>Incididunt pork ball tip sausage est tempor shoulder reprehenderit turducken. Boudin nostrud ut corned beef bacon ex turducken dolore ullamco. Laboris est qui tri-tip boudin nulla shoulder tail tempor voluptate jowl non minim chuck culpa. Pork chop shank aliqua, in ground round short ribs spare ribs beef ribs enim. Officia sirloin beef ribs, non cupidatat t-bone qui fatback in prosciutto culpa dolore. Kielbasa drumstick esse ut hamburger tempor anim excepteur turkey shankle sirloin short loin pork belly ad. Meatloaf pastrami velit, cow bacon proident fatback.</p>
                        </ol>
                    <a name="corec-vb"></a>
                    <p class="subtitle">CO-REC</p>
                    <p>Short loin rump tempor est jowl turkey. Ad anim leberkas chuck eu tempor. Sirloin do fatback turducken. Drumstick capicola cupidatat fugiat sint, ut ut veniam pork belly. Sirloin cillum sunt labore irure. Reprehenderit pork belly tenderloin dolor exercitation short loin laboris venison boudin sed irure ad.</p>
                    </div>
            	<div>
                <!--Pictures-->
                <h3>Men's &amp; Women's Semi-Finals 2011</h3>
                    <div class="gallery">
                        <div id="vball01" class="slides">
                        <a href="pictures/volleyball-11/semis/01.JPG"><img src="pictures/volleyball-11/semis/01.JPG" onload="h_refslides('vball01');" alt="" /></a>
                        <a href="pictures/volleyball-11/semis/09.JPG"><img src="pictures/volleyball-11/semis/09.JPG" alt="" /></a>
                        <a href="pictures/volleyball-11/semis/17.JPG"><img src="pictures/volleyball-11/semis/17.JPG" alt="" /></a>
                        <a href="pictures/volleyball-11/semis/18.JPG"><img src="pictures/volleyball-11/semis/18.JPG" alt="" /></a>
                        <a href="pictures/volleyball-11/semis/23.JPG"><img src="pictures/volleyball-11/semis/23.JPG" alt="" /></a>
                        </div>
                    </div>
                    <div class="nav"><input type="image" src="../images/prev.png" align="left" onclick="h_nav('vball01',-1)" />
                    <input type="image" src="../images/next.png" align="right" onclick="h_nav('vball01',1)" />
                    </div><br />
                <h3>Men's &amp; Women's Finals 2011</h3>
                    <div class="gallery">
                        <div id="vball02" class="slides">
                        <a href="pictures/volleyball-11/finals/01.JPG"><img src="pictures/volleyball-11/finals/01.JPG" onload="h_refslides('vball02');" alt="" /></a>
                        <a href="pictures/volleyball-11/finals/10.JPG"><img src="pictures/volleyball-11/finals/10.JPG" alt="" /></a>
                        <a href="pictures/volleyball-11/finals/18.JPG"><img src="pictures/volleyball-11/finals/18.JPG" alt="" /></a>
                        <a href="pictures/volleyball-11/finals/19.JPG"><img src="pictures/volleyball-11/finals/19.JPG" alt="" /></a>
                        <a href="pictures/volleyball-11/finals/26.JPG"><img src="pictures/volleyball-11/finals/26.JPG" alt="" /></a>
                        </div>
                    </div>
                    <div class="nav"><input type="image" src="../images/prev.png" align="left" onclick="h_nav('vball02',-1)" />
                    <input type="image" src="../images/next.png" align="right" onclick="h_nav('vball02',1)" />
                    </div>
                </div>
			</div>
        </div>
        
        <script>var t1 = new Spry.Widget.TabbedPanels("t1");</script> 

<?php include ('bottom.php'); ?>
