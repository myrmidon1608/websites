<?php

    function logged_in() {
        return (isset($_SESSION['user_id'])) ? true : false;
    }
        
    function register_user($register_data) {
        global $dbh;
        array_walk($register_data, 'array_sanitize');
        $register_data['password'] = crypt($register_data['password'], $register_data['salt']);
        
        $fields = 'users.' . implode(', users.', array_keys($register_data));
        $data = '\'' . implode('\', \'', $register_data) . '\'';

        $dbh -> query( "INSERT INTO users (" . $fields . ")
                        VALUES (" . $data . ")");
        email($register_data['email'], 'Activate Your Account', "\n\nHello " . $register_data['first_name'] . ",\n\nYou need to activate your account by clicking the link below.\n\nhttp://localhost:8888/Login_Template/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . "\n\nThanks,\n\nMyrmidon16");
    }
        
    function update_user($update_data, $user_id) {
        global $dbh;
        array_walk($update_data, 'array_sanitize');
        $update = array();
        
        foreach($update_data as $field => $data) {
            $update[] = 'users.' . $field . ' = \'' . $data . '\'';
        }
        $data = implode(', ', $update);

        $dbh -> query( "UPDATE users SET " . $data . "
                        WHERE users.user_id = " . $user_id);
    }
    
    function activate($email, $code) {
        global $dbh;
        $email = sanitize($email);
        $code  = sanitize($code);
        
        $sql = $dbh -> prepare( "SELECT COUNT(users.user_id) AS userCount FROM users
                                 WHERE users.email= :email AND
                                       users.email_code= :code" );
        $sql -> bindParam(':email', $email, PDO::PARAM_STR);
        $sql -> bindParam(':code', $code, PDO::PARAM_STR);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        
        if($result['userCount']) {
            $dbh -> query( "UPDATE users SET users.active = 1
                            WHERE users.email = '" . $email . "'");
        }
        return $result['userCount'];
        
    }

    function user_data($user_id) {
        global $dbh;
        $data = array();
        $user_id = (int)$user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();
        
        if($func_num_args > 1) {
            unset($func_get_args[0]);
            $fields = 'users.' . implode(', users.', $func_get_args);

            $result = $dbh -> query( "SELECT " . $fields . " FROM users
                                      WHERE users.user_id = " . $user_id);
            $data = $result -> fetch(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    
    function user_exists($username) {
        global $dbh;
        $username = sanitize($username);
        
        $sql = $dbh -> prepare( "SELECT COUNT(users.user_id) AS userCount FROM users
                                 WHERE users.username= :username" );
        $sql -> bindParam(':username', $username, PDO::PARAM_STR);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result['userCount'];
    }
    
    function user_active($username) {
        global $dbh;
        $username = sanitize($username);
        $active = 1;
        
        $sql = $dbh -> prepare( "SELECT COUNT(users.user_id) AS userCount FROM users
                                 WHERE users.username= :username AND
                                       users.active= :active" );
        $sql -> bindParam(':username', $username, PDO::PARAM_STR);
        $sql -> bindParam(':active', $active, PDO::PARAM_INT);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result['userCount'];
    }
    
    function user_id_from_username($username) {
        global $dbh;
        $username = sanitize($username);
        
        $sql = $dbh -> prepare( "SELECT users.user_id AS userID FROM users
                                 WHERE users.username= :username" );
        $sql -> bindParam(':username', $username, PDO::PARAM_STR);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result['userID'];
        
    }
    
    function salt_from_user_id($user_id) {
        global $dbh;
        
        $sql = $dbh -> prepare( "SELECT users.salt AS userSalt FROM users
                                 WHERE users.user_id= :user_id" );
        $sql -> bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result['userSalt'];
        
    }
    
    function user_id_from_email($email) {
        global $dbh;
        $email = sanitize($email);
        
        $sql = $dbh -> prepare( "SELECT users.user_id AS userID FROM users
                                 WHERE users.email= :email" );
        $sql -> bindParam(':email', $email, PDO::PARAM_STR);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result['userID'];
        
    }
    
    function login($username, $password) {
        global $dbh;
        $user_id  = user_id_from_username($username);
        $salt     = salt_from_user_id($user_id);
        $username = sanitize($username);
        $password = crypt($password, $salt);
        
        $sql = $dbh -> prepare( "SELECT users.user_id AS userID FROM users
                                 WHERE users.username= :username AND
                                       users.password= :password" );
        $sql -> bindParam(':username', $username, PDO::PARAM_STR);
        $sql -> bindParam(':password', $password, PDO::PARAM_STR);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result['userID'];
    }
    
    function email_exists($email) {
        global $dbh;
        $email = sanitize($email);
        
        $sql = $dbh -> prepare( "SELECT COUNT(users.user_id) userCount FROM users
                                 WHERE users.email= :email" );
        $sql -> bindParam(':email', $email, PDO::PARAM_STR);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result['userCount'];
    }
    
    function change_password($user_id, $password) {
        global $dbh;
        $salt = crypt(rand(999, 999999) + salt_from_user_id($user_id) + microtime());
        $user_id = (int)$user_id;
        $password = crypt($password, $salt);

        $dbh -> query( "UPDATE users SET users.password = '" . $password . "',
                                         users.salt = '" . $salt . "',
                                         users.recover_pw = 0
                        WHERE users.user_id = " . $user_id);
    }
    
    function recover($mode, $email) {
        $mode = sanitize($mode);
        $email = sanitize($email);
        $user_id = user_id_from_email($email);
        
        $user_data = user_data($user_id, 'first_name', 'username');
        
        if($mode == 'username') {
            email($email, "Recover Username", "\n\nHello " . $user_data['first_name'] . ",\n\nHere is your username: " . $user_data['username'] . "\n\nThanks,\n\nMyrmidon16");
        } else if($mode == 'password') {
            $generate_pw = substr(md5(rand(999, 999999)), 0, 8);
            
            change_password($user_id, $generate_pw);
            update_user(array('recover_pw' => 1), $user_id);
            
            email($email, "Recover Password", "\n\nHello " . $user_data['first_name'] . ",\n\nHere is your new password: " . $generate_pw . "\n\nThanks,\n\nMyrmidon16");
        }
    }
    
    function upload_profile_pic($user_id, $temp_path, $extn) {
        global $dbh;
        $user_id = (int)$user_id;
        $file_path = 'img/profile/' . substr(md5(time()), 0, 10) . '.' . $extn;
        $file_path = sanitize($file_path);

        move_uploaded_file($temp_path, $file_path);

        $dbh -> query( "UPDATE users SET users.profile_pic = '" . $file_path . "'
                        WHERE users.user_id = " . $user_id);
    }

?>
