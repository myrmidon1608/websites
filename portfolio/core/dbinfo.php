<?php

    $connect = array (
        'host' => 'localhost', //'myrmidon16.db',
        'database' => 'test', //'main',
        'user' => 'root', //'banjokazooie',
        'password' => '' //'mumbo2jumbo'
    );

    include('functions/general.php');
    include('functions/user.php');

    try {
        $dbh = new PDO('mysql:host=' . $connect['host'] . ';dbname=' . $connect['database'], $connect['user'], $connect['password']);
        $alerts = array();
        
        if(logged_in()) {
            $session_user_id = $_SESSION['user_id'];
            $user_data = user_data($session_user_id, 'username', 'first_name', 'last_name');
        }
        
    } catch (PDOException $e) {
        print "Error: " . $e->getMessage() . "<br/>";
        die();
    }
    
?>
