		<?php $title= "Madlibs";
			$desc= "";
			include('config.php'); 
			
			if(isset($_POST['submit'])) {
				
				if(empty($_POST['name'])) {
					$error['name'] = 'You forgot a name!';
				}
				if(empty($_POST['food'])) {
					$error['food'] = 'You forgot a food!';
				}
				if(empty($_POST['verb1'])) {
					$error['verb1'] = 'You forgot a verb!';
				}
				if(empty($_POST['verb2'])) {
					$error['verb2'] = 'You forgot a verb!';
				}
				if(empty($_POST['adj1'])) {
					$error['adj1'] = 'You forgot an adjective!';
				}
				if(empty($_POST['adj2'])) {
					$error['adj2'] = 'You forgot an adjective!';
				}
				if(sizeof($error) == 0) {
					echo "<div class='output'>";
					echo "{$_POST['name1']} {$_POST['food']} {$_POST['verb1']} the {$_POST['adj1']} wall.<br />";
					echo "The {$_POST['people']} then {$_POST['verb2']} his {$_POST['adj2']} {$_POST['color']} ball.";
					echo "</div>";
				}
				else {
					foreach($error as $value){
						echo "<div class='error'><p>{$value}</p></div>";
					}
				}
			}
		?>

            <form method="post" action="madlibs.php">
            	<table class="madlibs">
                	<tr>
                    	<td width="200px"><label>Name:</label></td>
                        <td><input name="name" type="text" value="<?php echo stripslashes($_POST['name']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td><label>Food:</label></td>
                        <td><input name="food" type="text" value="<?php echo stripslashes($_POST['food']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td><label>Verb:</label></td>
                        <td><input name="verb1" type="text" value="<?php echo stripslashes($_POST['verb1']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td><label>Another Verb:</label></td>
                        <td><input name="verb2" type="text" value="<?php echo stripslashes($_POST['verb2']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td><label>Adjective:</label></td>
                        <td><input name="adj1" type="text" value="<?php echo stripslashes($_POST['adj1']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td><label>Another Adjective:</label></td>
                        <td><input name="adj2" type="text" value="<?php echo stripslashes($_POST['adj2']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td><label>People:</label></td>
                        <td><select name="people">
                    		<option value="accountants">accountants</option>
                    		<option value="ring leaders">ring leaders</option>
                    		<option value="architects">architects</option>
                    		<option value="herps">herps</option>
                    		<option value="derps">derps</option>
                			</select></td>
                    </tr>
                    <tr>
                        <td><label>Color:</label><br /></td>
                        <td><input name="color" type="radio" value="turquoise"><font>turquoise</font></input><br />
                			<input name="color" type="radio" value="auburn"><font>auburn</font></input><br />
                			<input name="color" type="radio" value="forest green"><font>forest green</font></input></td>
                    </tr>
                    <td>
                		<td><input name="submit" type="submit" value="Generate" /></td>
                    </tr>
                </table>
            </form>
    
    	</div>
    </div>
</body>
</html>