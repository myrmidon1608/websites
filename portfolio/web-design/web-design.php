			<div class="content" id="webContent">				
				<h2>Web Design</h2>
				<div id="t3">
					<ul class="web-design">
						<li id="intra" onclick="tabChange(event, 'web');" style="background-image:url(web-design/images/intramur.png);"></li>
						<li id="aon" onclick="tabChange(event, 'web');" style="background-image:url(web-design/images/aon.png); margin-top:-15px;"></li>
                        <li id="tcnj" onclick="tabChange(event, 'web');" style="background-image:url(web-design/images/imm-tcnj.png);"></li>
					</ul>
					<div>
						<div class="web-content" id="intraContent">
                        <?php include ('web-design/intra-rec.php'); ?>
						</div>
						<div class="web-content" id="aonContent" style="display:none;">
						<?php include ('web-design/aon-marketing/aon.php'); ?>
						</div>
                        <div class="web-content" id="tcnjContent" style="display:none;">
                        <p style="text-align:center;"><img src="images/construction.gif" alt="Under Construction..." /></p>
                        <p><a href="web-design/web-apps/index.php" target="_blank">IMM 370: Dynamic Web Applications</a></p>
                        <p><a href="web-design/biffles/new/index.php" target="_blank">Biffles</a></p>
                        <!--<h3>Course Work</h3>
                        <h4>IMM 370: Dynamic Web Applications</h4>
                        <p>This course provides students with advanced web development skills and strategies to build dynamic web applications. Students will develop an understanding of how to use server-side technologies such as PHP and MySQL to collect, organize and distribute information. In addition, students will utilize client-side frameworks such as jQuery Mobile and PhoneGap to assist in the delivery of data-driven applications on mobile devices. Through workshops and presentations, students will explore topics related to information architecture, social interface design, cloud computing, security, copyright and identity management.<p>
                        <h4><a href="http://dynamicwebapplications.net/moore/index.php" target="_blank">Dynamic Web Applications</a></h4>
                        <p>For the final project, I worked together with Kevin Monaghan on his web comic and review site "Biffles". My main responsibility was to evolve the website from a static site to a dynamically driven experience. I worked on creating a slideshow for the comics and review summaries that drew their data through PHP and mySQL from information uploaded on a database. I am currently the main webmaster for the website and update it frequently.</p>
                        <h4><a href="http://dynamicwebapplications.net/biffles/index.php" target="_blank">Biffles: Comics &amp; Reviews</a></h4>
                        <h4>IMM 130: Design Fundamentals for the Web</h4>
                        <p>In this course students develop an understanding of when and how to use tools such as HTML, CSS, and Javascript, as well as an appreciation for fundamental issues of graphical communication, including color, typography and composition. Throughout the course students examine the differing constraints and additional considerations of designing for a digital and interactive medium and learn how to effectively organize web content by exploring processes and techniques for information architecture, interaction design and user testing.</p>
                        <h4><a href="web-design/fundamentals/index.php" target="_blank">Design Fundamentals for the Web</a></h4>-->
                        </div>
					</div>
				</div>
            </div>
            <div class="contend"></div>
				