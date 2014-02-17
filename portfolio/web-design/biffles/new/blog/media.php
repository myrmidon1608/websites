<?php 
	include ('top.php');
	include('../php/db-info.php');
	
	$genre = 0;
	$genre_type = "media";	

	include ('../php/bloglist.php');
	
	echo "</div><p class='section-title'>MEDIA BLOG</p>";

	include ('../php/blogview.php');
	
?>
 
        </div>
	</div>
</body>
</html>