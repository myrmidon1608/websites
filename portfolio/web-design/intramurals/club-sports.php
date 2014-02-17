<?php $title= "| Club Sports";
$desc= "The Club Sports program at The College of New Jersey provides the opportunity for students to participate in various sports programs in a competitive environment. Any information on individual programs, including how to join, can be found through the club sports drop-down menu.";
include ('top.php'); ?>
        <div class="club-ss">
        <img src="club-sports/slideshow/club-sports.jpg" style="position:absolute;" id="begin-slides" alt="" />
		<script>
		$(document).ready(function(){
				$("#begin-slides").animate({marginTop:"0px"}, 2000, function(){
					$("#begin-slides").fadeOut(2000);
				});
			});	

		var delay=2000
		var curindex=0
		var randomimages=new Array()

		randomimages[0]="club-sports/slideshow/club01.jpg"
		randomimages[1]="club-sports/slideshow/club02.jpg"
		randomimages[2]="club-sports/slideshow/club03.jpg"
		randomimages[3]="club-sports/slideshow/club04.jpg"
		randomimages[4]="club-sports/slideshow/club05.jpg"
		randomimages[5]="club-sports/slideshow/club06.jpg"
		randomimages[6]="club-sports/slideshow/club07.jpg"
		randomimages[7]="club-sports/slideshow/club08.jpg"
		randomimages[8]="club-sports/slideshow/club09.jpg"
		randomimages[9]="club-sports/slideshow/club10.jpg"
		randomimages[10]="club-sports/slideshow/club11.jpg"
		randomimages[11]="club-sports/slideshow/club12.jpg"
		randomimages[12]="club-sports/slideshow/club13.jpg"
		randomimages[13]="club-sports/slideshow/club14.jpg"
		randomimages[14]="club-sports/slideshow/club15.jpg"
		randomimages[15]="club-sports/slideshow/club16.jpg"
		randomimages[16]="club-sports/slideshow/club17.jpg"
		randomimages[17]="club-sports/slideshow/club18.jpg"

		var preload=new Array()

		for (n=0;n<randomimages.length;n++){
			preload[n]=new Image()
			preload[n].src=randomimages[n]
		}
		document.write('<img name="defaultimage" src="'+randomimages[Math.floor(Math.random()*(randomimages.length))]+'">')

		function rotateimage(){
			if (curindex==(tempindex=Math.floor(Math.random()*(randomimages.length)))){
				curindex=curindex==0? 1 : curindex-1
			}
			else
			curindex=tempindex
			document.images.defaultimage.src=randomimages[curindex]
		}
		setInterval("rotateimage()",delay)
		</script>
        </div>
	
		<!--<img src="club-sports/pictures/slideshow/club-sports.jpg" class="club" id="club" align="right" alt="" />-->
		<p><img src="images/logos/clubsports.png" alt="Club Sports" /></p>
			<div id="t1">
				<ul class="tabs">
					<li tabindex="0">Program News</li>
					<li tabindex="0">Fund Run '11</li>
				</ul>
				<div style="margin-top:50px;">
					<div>
						<p>Bacon ipsum dolor sit amet andouille rump aute duis nisi ground round ut exercitation strip steak sirloin. Id ham hock deserunt, jowl jerky pariatur ea in shoulder consectetur. Sed ex salami in qui hamburger meatball short loin boudin pariatur ribeye capicola dolore do. Beef ribs shank sed, ut commodo prosciutto do adipisicing pastrami meatball ut ullamco aute kielbasa short loin. Spare ribs turducken cillum drumstick, tongue ham sunt dolor shankle meatball meatloaf.</p>
						<p>Ut jowl shoulder swine incididunt frankfurter ground round strip steak esse nisi irure prosciutto pork. Sunt consequat commodo sausage filet mignon. Minim cillum tail short loin shank, ut drumstick do commodo spare ribs dolore elit officia enim nisi. Andouille ex shank, brisket ad pork belly occaecat aute eiusmod esse jerky sunt.</p>
						<p>Irure proident nulla consectetur prosciutto pork chop commodo pig consequat esse et velit ham pancetta. Proident shoulder eu laboris, leberkas est pork belly minim do cillum prosciutto quis. Ball tip sunt salami, ribeye consequat qui incididunt dolore bacon sirloin nulla eiusmod pig pariatur. Flank aliqua ad veniam andouille cupidatat irure culpa jowl laboris tongue cillum esse exercitation proident.</p>					
					</div>
					<div><?php include ('club-sports/fund-run/fund-run11.php'); ?></div>
				</div>
			</div>
		
		<script type="text/javascript">var t1 = new Spry.Widget.TabbedPanels("t1");</script>

<?php include ('bottom.php'); ?>
