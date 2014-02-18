
<?php 
    // Core PHP
    require('core/init.php');
    // Login Modal
    include('includes/login.php');
    // Head Info
    include('includes/_head.html');
    // Loading Screen
    if(!isset($_GET['login']))
        echo "<div id=\"loading\"><div></div></div>";
    // Logged In User Bar
    if(logged_in()) include('includes/userbar.php');
    
    $portfolioSection = isset($_GET['section']) ? $_GET['section'] : "home";
    
    switch($portfolioSection) {
        case 'blog':
            include('includes/_blog/header.html');
            include('blog.php');
            include('includes/_blog/sidebar.php');
            break;
        case 'about':
            include('includes/_about/bio.html');
            break;
        case 'home':
            include('includes/updates.php');
            include('includes/_home/header.html');
            if(!logged_in()) include('includes/_home/callout.html');
            include('includes/_home/menu.html');
            break;
        default:
            break;
    }
    include('includes/_footer.html');

?>