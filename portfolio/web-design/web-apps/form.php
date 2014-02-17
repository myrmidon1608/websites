		<?php $title = "Email Form";
			$desc = "";
			include('config.php');
		
			if(isset($_POST['submit'])){
				
				if(empty($_POST['email'])){
					$error['email'] = 'You forgot your email!';
				}
				if(empty($_POST['subject'])){
					$error['subject'] = 'You forgot a subject!';
				}
				if(empty($_POST['message'])){
					$error['subject'] = 'You forgot the message!';
				}
				if(sizeof($error) == 0){
					mail('myrmidon16@gmail.com', stripslashes($_POST['subject']), stripslashes($_POST['message']), "From: {$_POST['email']}");
					echo 'Your email has been sent!';
				}
				else {
					foreach($error as $value){
						echo "<div class='error'><p>{$value}</p></div>";
					}
				}
			}
		
		?>
        
        <h1>This is an Email Form.</h1>

            <form method="post" action="form.php">
            
                <label for="email">Email Address</label><br />
                <input type="text" name="email" value="<?php echo $_POST['email']; ?>" size="35" /><br /><br />
                <label for="subject">Subject</label><br />
                <input type="text" name="subject" value="<?php echo stripslashes($_POST['subject']); ?>" size="35" /><br /><br />
                <label for="message">Message</label><br />
                <textarea name="message" rows="10" cols="40"><?php echo stripslashes($_POST['subject']); ?></textarea><br /><br />
                <input type="submit" name="submit" value="Send" />
            
            </form>
    
    	</div>
    </div>
</body>
</html>