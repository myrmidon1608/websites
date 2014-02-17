<?php

    function logged_in() {
        return (isset($_SESSION['user_id'])) ? true : false;
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
    
?>
