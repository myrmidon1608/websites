<?php

    function sanitize($data) {
        return htmlentities(strip_tags(mysql_real_escape_string($data)));
    }
    
    function array_sanitize(&$item) {
        $item = htmlentities(strip_tags(mysql_real_escape_string($item)));
    }
    
    function email($to, $subject, $body) {
        mail($to, $subject, $body, 'From: hello@myrmidon16.com');
    }

    function homepage_update() {
        global $dbh;
        
        $sql = $dbh -> prepare("SELECT updates.title, updates.summary, updates.date, updates.image
                                FROM updates
                                ORDER BY updates.date DESC LIMIT 1");
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        $result['date'] = date('F jS, Y', strtotime($result['date']));

        return $result;
    }
    
    function updates_modal() {
        global $dbh;
        
        $sql = $dbh -> prepare("SELECT updates.title, updates.summary, updates.date
                                FROM updates
                                ORDER BY updates.date DESC LIMIT 5");
        $sql -> execute();
        $result = $sql -> fetchAll();

        return $result;
    }
    
    function output_alert($alerts) {
        $output = array();
        
        foreach($alerts as $alert) {
            $output[] = '<li>' . $alert . '</li>';
        }
        return '<ul class="alerts">' . implode('', $output) . '</ul>';
    }
    
    function protect_page() {
        $redirect_page = 'index.php';
        
        if(!logged_in()) {
            header('Location: ' . $redirect_page);
        }
    }
    
    function logged_in_redirect() {
        $redirect_page = 'index.php';
        
        if(logged_in()) {
            header('Location: ' . $redirect_page);
        }
    }
    
    function has_access($user_id, $user_type) {
        global $dbh;
        $user_id = (int)$user_id;
        
        $sql = $dbh -> prepare( "SELECT COUNT(users.user_id) AS userCount FROM users
                                 WHERE users.user_id= :user_id AND
                                       users.type = :user_type" );
        $sql -> bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $sql -> bindParam(':user_type', $user_type, PDO::PARAM_STR);
        $sql -> execute();
        $result = $sql -> fetch(PDO::FETCH_ASSOC);
        return $result['userCount'];
    }
        
?>