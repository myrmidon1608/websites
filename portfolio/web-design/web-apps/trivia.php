<!DOCTYPE html>
<head>
<title>Trivia</title>
<meta name="description" content="" />
<link rel="stylesheet" href="dynamic.css" />
<link rel="shortcut icon" href="../../images/moore-icon.ico">
</head>
<body class="trivia">
	<div>
	<h2>Stop! Who approaches the Bridge of Death must answer me<br />
	these questions four, 'ere the other side he see.</h2>

        <form method="post" action="trivia.php">
        
            <label for="q1">Question #1:<br />
            What is your quest?</label><br /><br />
            <input name="q1" type="radio" value="a" <?php if($_POST['q1'] == 'a'){ echo 'checked="checked"'; } ?>>Fame and fortune.</input><br />
            <input name="q1" type="radio" value="b" <?php if($_POST['q1'] == 'b'){ echo 'checked="checked"'; } ?>>Green.</input><br />
            <input name="q1" type="radio" value="c" <?php if($_POST['q1'] == 'c'){ echo 'checked="checked"'; } ?>>I seek the Grail.</input><br />
            <input name="q1" type="radio" value="d" <?php if($_POST['q1'] == 'd'){ echo 'checked="checked"'; } ?>>To cross the Bridge of Death.</input><br /><br />
            <label for="q2">Question #2:<br />
            What is the capital of Assyria?</label><br /><br />
            <input name="q2" type="radio" value="a" <?php if($_POST['q2'] == 'a'){ echo 'checked="checked"'; } ?>>Nineveh.</input><br />
            <input name="q2" type="radio" value="b" <?php if($_POST['q2'] == 'b'){ echo 'checked="checked"'; } ?>>Bangkok.</input><br />
            <input name="q2" type="radio" value="c" <?php if($_POST['q2'] == 'c'){ echo 'checked="checked"'; } ?>>Blue.</input><br />
            <input name="q2" type="radio" value="d" <?php if($_POST['q2'] == 'd'){ echo 'checked="checked"'; } ?>>I don't know THAT!!</input><br /><br />
            <label for="q3">Question #3:<br />
             What goes black, white, black, white, black, white?</label><br /><br />
            <input name="q3" type="radio" value="a" <?php if($_POST['q3'] == 'a'){ echo 'checked="checked"'; } ?>>Blue... NO YELLOW!</input><br />
            <input name="q3" type="radio" value="b" <?php if($_POST['q3'] == 'b'){ echo 'checked="checked"'; } ?>>A nun rolling down a hill.</input><br />
            <input name="q3" type="radio" value="c" <?php if($_POST['q3'] == 'c'){ echo 'checked="checked"'; } ?>>Babylon.</input><br />
            <input name="q3" type="radio" value="d" <?php if($_POST['q3'] == 'd'){ echo 'checked="checked"'; } ?>>All of the above.</input><br /><br />
            <label for="q4">Question #4:<br />
            What is the airspeed velocity of an unladen swallow?</label><br /><br />
            <input name="q4" type="radio" value="a" <?php if($_POST['q4'] == 'a'){ echo 'checked="checked"'; } ?>>Yellow.</input><br />
            <input name="q4" type="radio" value="b" <?php if($_POST['q4'] == 'b'){ echo 'checked="checked"'; } ?>>What do you mean, an African or a European swallow?</input><br />
            <input name="q4" type="radio" value="c" <?php if($_POST['q4'] == 'c'){ echo 'checked="checked"'; } ?>>69 m/s.</input><br />
            <input name="q4" type="radio" value="d" <?php if($_POST['q4'] == 'd'){ echo 'checked="checked"'; } ?>>Well...I don't know...</input><br /><br />
            <input name="submit" type="submit" value="Submit!" />
        
        </form>
    
		<?php
    
        	if(isset($_POST['submit'])){
				$numcorrect = 0;
				
				if($_POST['q1'] == 'c'){
					$numcorrect = $numcorrect + 1;
					}
		
				if($_POST['q2'] == 'a'){
					$numcorrect = $numcorrect + 1; 
					}
		
				if($_POST['q3'] == 'b'){
					$numcorrect = $numcorrect + 1; 
					}
					
				if($_POST['q4'] == 'b'){
					$numcorrect = $numcorrect + 1; 
					}
				
				$difference = ($numcorrect / 4) * 100;
				
				if($numcorrect == '4'){
					echo "<div class='can-pass'>";
					echo "{$difference}%<br /><br />
					Right. Off you go.";
					echo "</div>";
				}
				else{
					echo "<div class='can-pass'>";
					
					if($_POST['q1'] == ''){
					echo "Answer Question 1!<br /><br />";
					}
					if($_POST['q2'] == ''){
					echo "Answer Question 2!<br /><br />";
					}
					if($_POST['q3'] == ''){
					echo "Answer Question 3!<br /><br />";
					}
					if($_POST['q4'] == ''){
					echo "Answer Question 4!<br /><br />";
					}
					else {
					echo "{$difference}%<br /><br />
					&quot;Auuuuuuuugh!&quot<br />
					You&rsquo;ve been flung from the bridge!";
					}
					echo "</div>";
				}
        	}
		?>
    
	</div>
</body>
</html>