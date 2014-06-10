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

?>