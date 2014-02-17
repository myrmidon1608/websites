<?php 
	$btitle = "Home";
	$bdesc = "";
	include('top.php');
?>

<script type="text/javascript">

var i = 0;

function comicss(dir) {
	
	var d = dir;
	i += d;

	$.ajax({
        url: "panelcheck.php",
        dataType: "json",
        success: function(data, textStatus, xhr) {
            data = JSON.parse(xhr.responseText);
			if(i < 0) {
				i = data.length - 1;
			}
			else if(i > (data.length - 1)) {
				i = 0;
			}
			var panel = data[i];
			
			$.ajax({
				url: "comiccheck.php",
				dataType: "json",
				success: function(data, textStatus, xhr) {
					data = JSON.parse(xhr.responseText);
					var comic = data[i];

					$('#comic').replaceWith("<img id='comic' src='" + comic + "' alt='comic' />");
					
					if(panel == 4) {
						$('#panel-switch').css('width', '500px');
					}
					else if(panel == 6) {
						$('#panel-switch').css('width', '700px');
					}
				}
			});
		}
    });
}

window.onload = comicss(0);

</script>

<div id="panel-switch" style="height:300px; margin:0 auto;">
    <img src="images/previous.png" style="float:left; cursor:pointer; margin-top:100px;" onclick="comicss(1);" />
    <img src="images/next.png" style="float:right; cursor:pointer; margin-top:100px;" onclick="comicss(-1);" />
    <div id="piggy"><img id="comic" /></div>
</div>

<script type="text/javascript">

var i = 0;

function reviewss(dir) {
	
	var d = dir;
	i += d;
	
	$.ajax({
        url: "reviewcheck.php",
        dataType: "json",
       success: function(data, textStatus, xhr) {
            data = JSON.parse(xhr.responseText);
			if(i < 0) {
				i = data.length - 1;
			}
			else if(i > (data.length - 1)) {
				i = 0;
			}
			var review = data[i];	
			
			$('#piggy2').replaceWith("<div id='piggy2'><p>" + review + "</p></div>");
		}
    });
}

window.onload = reviewss(0);

</script>
    
<div style="width:750px; height:240px; margin:50px auto 0px auto;">
    <img src="images/previous.png" style="float:left; cursor:pointer; margin-top:100px;" onclick="reviewss(1);">
    <img src="images/next.png" style="float:right; cursor:pointer; margin-top:100px;" onclick="reviewss(-1);">
    <div id="piggy2"></div>   
</div>

<?php include('bottom.php'); ?>