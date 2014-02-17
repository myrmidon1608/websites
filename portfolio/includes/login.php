<?php

    if(!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if(empty($username)) {
            $alerts[] = "Username is required.";
        } else if(!user_exists($username)) {
            $alerts[] = "User doesn't exist!";
        }

        if(empty($password)) {
            $alerts[] = "Password is required.";
        }
        
        if(empty($alerts)) {
            $login = login($username, $password);
            
            if(!$login) {
                $alerts[] = "Incorrect credentials.";
            } else {
                $_SESSION['user_id'] = $login;
                header('Location: index.php');
                exit();
            }
        }
    }
    
    if(isset($_GET['login']) && empty($_GET['login'])) { ?>

    <div class="modalContainer" id="loginModal">
    <?php } else { ?>
    <div class="modalContainer hidden" id="loginModal">
    <?php } ?>
        
        <div class="modal">
            <div class="modal-header">
                <button type="button" class="close" onclick="closeModal(this);">&times;</button>
                <h4>Login/Register</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="index.php?login">
                    <table class="form">
                        <tr>
                            <td><label>Username:</label></td>
                            <td><input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Password:</label></td>
                            <td><input type="password" name="password" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="login" value="Login" />
                        </tr>
                    </table>
                </form>
                <?php echo output_alert($alerts); ?>
            </div>
        </div>
    </div>