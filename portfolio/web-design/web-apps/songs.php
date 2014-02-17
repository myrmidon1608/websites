		<?php $title= "Songs";
            $desc= "";
            include('config.php'); 
			
			if(isset($_POST['submit'])) {
				
				if(empty($_POST['name'])) {
					$error['name'] = 'You forgot the name of the song!';
				}
				if(empty($_POST['artist'])) {
					$error['artist'] = 'You forgot an artist!';
				}
				if(empty($_POST['album'])) {
					$error['album'] = 'You forgot an album!';
				}
				if(sizeof($error) == 0) {
					$sql = "INSERT INTO songs (song_id, name, artist, album, genre, submitdate)
							VALUES (null, '{$_POST['name']}', '{$_POST['artist']}', '{$_POST['album']}', '{$_POST['genre']}', NOW())";
                    mysql_query($sql);
					echo 'Your song has been added!';
				}
				else {
					foreach($error as $value){
						echo "<div class='error'><p>{$value}</p></div>";
					}
				}
			}
		?>
            
            <h1>This is a List of Songs.</h1>
            
            <form method="post" action="songs.php">
            	<table class="song">
                	<tr>
                    	<td><label>Song Name : </label></td>
                        <td><input type="text" name="name" value="<?php echo stripslashes($_POST['name']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                		<td><label>Artist : </label></td>
                        <td><input type="text" name="artist" value="<?php echo stripslashes($_POST['artist']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td><label>Album : </label></td>
                        <td><input type="text" name="album" value="<?php echo stripslashes($_POST['album']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td><label>Genre : </label></td>
                        <td><input type="text" name="genre" value="<?php echo stripslashes($_POST['genre']); ?>" size="35" /></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><input type="submit" name="submit" value="Submit" /></td>
                    </tr>
                </table>
            </form>
    
            <table>
                <tr>
                    <th width="300px">Song</th>
                    <th width="150px">Artist</th>
                    <th width="275px">Album</th>
                    <th width="75px">Genre</th>
                    <th width="150px">Date Added</th>
                </tr>
                
                <?php
                $sql = "SELECT * FROM songs ORDER BY artist";
                $result = mysql_query($sql);
                
                while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['artist']}</td>";
                    echo "<td>{$row['album']}</td>";
                    echo "<td>{$row['genre']}</td>";
                    echo "<td>{$row['submitdate']}</td>";
                    echo "</tr>";
                } ?>
            
            </table>
    	</div>
    </div>
</body>
</html>