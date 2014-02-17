<?php

$host = 'mysql1.000webhost.com';
$database = 'a2031327_main';
$user = 'a2031327_myr';
$pw = 'future04';
			
mysql_connect($host, $user, $pw) or die('Not Connecting');
mysql_select_db($database) or die ('No Database Selected');

$username = $_POST['username'];
$password = $_POST['password'];

if ($username && $password) {

	$query = mysql_query("SELECT * FROM admin WHERE username ='$username'");
	$numrows = mysql_num_rows($query);
	
	if ($numrows != 0) {
		while ($row = mysql_fetch_assoc($query)) {
			$dbusername = $row['username'];
			$dbpassword = $row['password'];
			$userid = $row['user_id'];
		}
		
		if ($username == $dbusername && $password == $dbpassword) {
			$_SESSION['username'] = $username;
			$_SESSION['user_id'] = $userid;	
		}
		else echo "<p class='alert'>Incorrect password.</p>";
	}
	else echo "<p class='alert'>That username doesn't have access.</p>";
}
else echo "<p class='alert'>Sign in to access backdoor.</p>";

?>

	<div>
	<form method="post" action="backdoor.php">
		<table>
			<tr>
				<td><label>Username:</label></td>
                <td><input type="text" name="username" size="33" /></td>
			</tr>
			<tr>
                <td><label>Password:</label></td>
                <td><input type="password" name="password" size="33" /></td>
			</tr>
			<tr>
                <td colspan="2"><input type="submit" name="login" value="Login" />
			</tr>
		</table>
	</form>
    </div>