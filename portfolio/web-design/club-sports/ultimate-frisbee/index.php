<!DOCTYPE html>
<head>
<title>TCNJ Ultimate Frisbee</title>
<meta name="description" content="This is the home page for the Ultimate Frisbee clubs at The College of New Jersey. Please use the links below to visit the site for Revolution, the Men's Frisbee team, or Anarchy, the Women's Frisbee team." />
<style>
body {background-color:#000000;
	padding:0px;
	margin:0px;}

img {border:0px;}

.container {width:1165px;
	height:100%;
	padding-top:50px;
	margin:0 auto;}
		
.ultimate {width:425px;
	float:left;
	padding:95px 10px;}

.nj {width:255px;
	float:left;
	padding:0px 10px;}
</style>
<script>
//Revolution
loadImage1 = new Image();
loadImage1.src = "images/revolution-blue.png";
staticImage1 = new Image();
staticImage1.src = "images/revolution-gold.png";
//Anarchy
loadImage2 = new Image();
loadImage2.src = "images/anarchy-blue.png";
staticImage2 = new Image();
staticImage2.src = "images/anarchy-gold.png";
</script>
</head>

<body>
    <div class="container">
        <div class="ultimate">
        <a href="revolution/index.php" onmouseover="image1.src=loadImage1.src;" onmouseout="image1.src=staticImage1.src;" target="_blank">
    	<img src="images/revolution-gold.png" name="image1" alt="Revolution" /></a>
        </div>
        <div class="nj"><img src="images/nj.png" alt="TCNJ" /></div>
        <div class="ultimate">
        <a href="anarchy/index.php" onmouseover="image2.src=loadImage2.src;" onmouseout="image2.src=staticImage2.src;" target="_blank">
    	<img src="images/anarchy-gold.png" name="image2" alt="Anarchy" /></a>
        </div>
    </div>
</body>
</html>
