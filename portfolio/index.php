
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
    
    $portfolioSection = isset($_GET['section']) ? $_GET['section'] : "";
    
    switch($portfolioSection) {
        case 'blog':
            include('includes/_blog/header.html');
            include('blog.php');
            include('includes/_blog/sidebar.php');
            break;
        case 'about':
            include('includes/_about/bio.html');
            break;
        default:
            include('includes/updates.php');
            include('includes/_home/header.html');
            include('includes/_home/update.php');
            include('includes/_home/menu.html');
            break;
    }
    include('includes/_footer.html');

?>