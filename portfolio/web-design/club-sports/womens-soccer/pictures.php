<?php $tpTitle= "| Pictures";
$pgDesc= "The Women's Club Soccer program at The College of New Jersey is a great way for students to play soccer without the rigor of a hectic varsity schedule. This is the pictures page, where a gallery of the women's club soccer team in action is posted.";
include ('top.php'); ?>
 
			<div class="header"><img src="images/headers/pic-header.png" alt="Pictures" /></div><br />
			<div class="preview">
				<div>
				<a href="pictures/pic08.php"><img id="08gal" src="pictures/2008/01.jpg" align="left" onmouseover="show_b(this,'A','pictures/2008/',['01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg'])" onmouseout="show_b(this,0)" alt="" /></a>
				<h3>2008 Season Gallery</h3>
				</div>
				<div>
		   		<a href="pictures/pic09.php"><img id="09gal" src="pictures/2009/01.jpg" align="left" onmouseover="show_b(this,'A','pictures/2009/',['01.jpg', '02.jpg', '03.jpg', '04.jpg', '05.jpg'])" onmouseout="show_b(this,0)" alt="" /></a>
				<h3>2009 Season Gallery</h3>
				</div>
				<div>
		   		<a href="pictures/pic10.php"><img id="10gal" src="pictures/2010/01.jpg" align="left" onmouseover="show_b(this,'A','pictures/2010/',['01.jpg', '02.jpg', '03b.jpg', '04.jpg', '05.jpg'])" onmouseout="show_b(this,0)" alt="" /></a>
				<h3>2010 Season Gallery</h3>
				</div>
				<div>
		   		<a href="pictures/pic11.php"><img id="11gal" src="pictures/2011/01b.jpg" align="left" onmouseover="show_b(this,'A','pictures/2011/',['01b.jpg', '02b.jpg', '03.jpg', '04b.jpg', '05.jpg'])" onmouseout="show_b(this,0)" alt="" /></a>
				<h3>2011 Season Gallery</h3>
				</div>
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
