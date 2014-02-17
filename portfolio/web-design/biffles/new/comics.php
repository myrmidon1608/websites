<?php 
	/*$btitle = "Comics";
	$bdesc = "";*/
	include('top.php');
?>
            
            <div class="comics-title">
            	<img src="" alt="" />
                <p class="section-title">GINGER AND WASABI</p>
            </div>
            <div id="panel-switch">
                <img src="images/previous.png" class="comic-nav" style="float:left;" onclick="slideshow(1);" />
                <img src="images/next.png" class="comic-nav" style="float:right;" onclick="slideshow(-1);" />
                <img id="comic" />
                <div id="comic-info"></div>
            </div>
            
    	</div>
	</div>
</body>
</html>