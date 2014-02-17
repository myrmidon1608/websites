            	<div class="content" id="gameContent">
                    <div class="name"><span id="gname">&nbsp;</span></div>
                    <h2>Game Design</h2>
                    <div id="t2">
                        <ul class="game-design">
                            <li id="bro" onclick="tabChange(event);" style="background-image:url(game-design/icons/bropocalypse.png);"></li>
                            <li id="side" onclick="tabChange(event);" style="background-image:url(game-design/icons/sidequest.png);"></li>
                            <li id="blh" onclick="tabChange(event);" style="background-image:url(game-design/icons/blue-light.png);"></li>
                            <li id="explore" onclick="tabChange(event);" style="background-image:url(game-design/icons/exploradorable.png);"></li>
                        </ul>
                        <div style="padding-top:30px;">
                            <div class="game-content" id="broContent">
                            <?php include ('game-design/bropocalypse/bropocalypse.php'); ?>
                            </div>
                            <div class="game-content" id="sideContent" style="display:none;">
                            <?php include ('capstone/sidequest.php'); ?>
                            </div>
                            <div class="game-content" id="blhContent" style="display:none;">
                            <?php include ('game-design/blue-light-hunt/blue-light-hunt.php'); ?>
                            </div>
                            <div class="game-content" id="exploreContent" style="display:none;">
                            <?php include ('game-design/exploradorable/exploradorable.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contend"></div>

<script>

var gameName = {
	"bro" : "Bropocalypse",
	"side" : "sideQUEST",
	"blh" : "Blue Light Hunt",
	"explore" : "Exploradorable"
}

$.each(gameName, function(index, value) {
	$("#" + index).mouseover(function() {
		$('.name').find('#gname').text(value);
	});
	$("#" + index).mouseout(function() {
		$('.name').find('#gname').text("");
	});
});

</script>