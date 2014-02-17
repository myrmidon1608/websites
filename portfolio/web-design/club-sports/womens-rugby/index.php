<?php $title= "| Home";
$desc= "";
include ('top.php'); ?>

				<h1>home</h1>
            	</div>
            </div>
        <p>Bacon ipsum dolor sit amet ham andouille tri-tip excepteur anim corned beef est. Biltong bacon andouille anim, laborum ea brisket cupidatat dolore ad officia swine sunt fatback. Laborum andouille ad non dolore mollit tail chicken pastrami capicola. Non pig pork chop tail leberkas nulla venison short loin consequat. Ex pork jowl, sausage ribeye voluptate aliqua filet mignon pariatur enim. Id elit pork fugiat labore incididunt brisket tri-tip velit fatback dolore jerky qui. Chicken voluptate flank tri-tip shoulder.</p><br />
		<h4>PICTURES</h4>
        	<div class="box">
			<a href="pictures/09-17-11.php"><img id="091711" src="pictures/09-17-11/01.jpg" class="slides" align="left" onmouseover="show_b(this,'A','pictures/09-17-11/',['01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg'])" onmouseout="show_b(this,0)" alt="" /></a>
			<p>September 17th, 2011</p>
			</div>
			<div class="box">
			<a href="pictures/10-23-10.php"><img id="102310" src="pictures/10-23-10/01.jpg" class="slides" align="left" onmouseover="show_b(this,'A','pictures/10-23-10/',['01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg'])" onmouseout="show_b(this,0)" alt="" /></a>
			<p>October 23rd, 2010</p>
			</div>
			<div class="box">
			<a href="pictures/09-25-10.php"><img id="092510" src="pictures/09-25-10/01b.jpg" class="slides" align="left" onmouseover="show_b(this,'A','pictures/09-25-10/',['01b.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg'])" onmouseout="show_b(this,0)" alt="" /></a>
			<p>September 25th, 2010</p>
			</div>
            
<script>
var HoldDelay=1000;
var TO;
function show_b(){
	clearTimeout(TO);
	var args=show_b.arguments;
	var obj=args[0];
	if (typeof(obj)=='string'){
		obj=document.getElementById(obj);
	}
	if (!window['SS'+obj.id]){
		window['SS'+obj.id]=[0,args[2],args[3]];
	}
	var ary=window['SS'+obj.id];
	var nu=args[1];
	if (nu=='A'){
		nu=1;
	}
	ary[0]+=nu;
	if (ary[0]<0){
		ary[0]=ary[2].length-1;
	}
	if (ary[0]>=ary[2].length){
		ary[0]=0;
	}
	obj.src=ary[1]+ary[2][ary[0]];
	if (args[1]=='A'){
		TO=setTimeout( function(){
			show_b(obj,'A');
		},HoldDelay);
	}
}
</script>
				
<?php include ('bottom.php'); ?>