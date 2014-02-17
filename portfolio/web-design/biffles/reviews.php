<?php 
	$btitle = "Reviews";
	$bdesc = "";
	include('top.php');
?>

<script type="text/javascript">

var i = 0;

function slideshow(dir) {
	
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

window.onload = slideshow(0);

</script>
    
<div style="width:750px; height:240px; margin:0 auto;">
    <img src="images/previous.png" style="float:left; cursor:pointer; margin-top:100px;" onclick="slideshow(1);">
    <img src="images/next.png" style="float:right; cursor:pointer; margin-top:100px;" onclick="slideshow(-1);">
    <div id="piggy2"></div>
</div>

<div class="jiggy">
	
<?php
 $sql = "SELECT posting_id, author, title,  DATE_FORMAT(postdate, '%c/%e/%y ') AS formatteddate, message FROM postings ORDER BY postdate DESC";
    $result = mysql_query($sql);
	
    while($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {
     echo "<tr>";
	 ?> 
     <h23> 
	 <?php echo "<td><a href=\"blogpage.php?posting_id={$row['posting_id']}\">{$row['title']}</a></td>";?>
     </h23> 
     <p class="author"> 
	 <?php 
	 echo "<td><blogpage.php?posting_id={$row['posting_id']}\">{$row['formatteddate']}</td>";
	 echo "<td><blogpage.php?posting_id={$row['posting_id']}\">{$row['author']}</td>";
	 ?>
     </p>
     <?php
     echo "</tr>";
	}
?>
</div>

<?php include('bottom.php'); ?>