<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    include('db-info.php');

	$number = $_POST['office'];
    
	if(!empty($_POST)) {
        $q = "SELECT office, empl_name, type FROM tiles WHERE office = $number";
        $employee = mysql_fetch_assoc(mysql_query($q));
        
        $json = array(
            "office" => $employee['office'],
            "name" => $employee['empl_name'],
            "office_type" => $employee['type']
        );

        $output = json_encode($json);
        echo $output;
    }
    else
        echo "Nothing to see here.";
	
?>
