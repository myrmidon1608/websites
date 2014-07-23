<?php

define('PATH', get_bloginfo('stylesheet_directory'));

add_theme_support('nav-menus');

if(function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'main' => 'Main Nav'
        )
    );
}

if(function_exists('register_sidebar')) {
    register_sidebar(
        array(
            'name' => __('Primary Sidebar', 'primary-sidebar'),
            'id' => 'primary-sidebar-area'
        )
    );
}

function root() {
    print PATH;
}

function set_active($id) {
    $activeCls = (($id == "home" && is_home()) || is_page($id)) ? " active" : "";
    print $activeCls;
}

function check_form($ele) {
    $val = false;
    
    if(!isset($_POST[$ele]) || empty($_POST[$ele])) {
        $val = "This field is required.";
    } else {
    // Additional validation
        if ($ele == "EMAIL" && !filter_var($_POST[$ele], FILTER_VALIDATE_EMAIL)) {
            $val = "Invalid email address.";
        }
    }
    return $val;
}

function send_email($type) {
    $to = "myrmidon16@gmail.com";//farmsintheheights@gmail.com";
    $subject = $_POST["FNAME"] . " " . $_POST["LNAME"] . " has contacted the Farmers Market";
    $message = $_POST["BODY"];
    $from = "From: " . $_POST["FNAME"] . " " . $_POST["LNAME"] . " <" . $_POST["EMAIL"] . ">";
    
    switch($type) {
        case "contact":
            $subject .= " for more information";
            break;
        case "contribute":
            $subject .= " to contribute";
            break;
    }
    mail($to, $subject, $message, $from);
}

?>