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
    $activeCls = "";
    
    if($id == "home" && is_home()) {
        $activeCls = " active";
    }
    
    foreach((array)$id as $page) {
        if(is_page($page)) {
            $activeCls = " active";
        }
    }
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

function send_email($type = "contact") {
    $to = "farmsintheheights@gmail.com";
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

include("home-carousel-manager.php");
  
add_action("init", "carousel_rewrite");

function carousel_rewrite() {
    global $wp_rewrite;

    $wp_rewrite -> add_permastruct("typename", "typename/%year%/%postname%/", true, 1);
    add_rewrite_rule("typename/([0-9]{4})/(.+)/?$", "index.php?typename=$matches[2]", "top");
    $wp_rewrite -> flush_rules();
}

?>