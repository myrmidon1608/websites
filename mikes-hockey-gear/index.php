<?php

    $page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : '';

    include ('includes/_header.html');
    
    switch($page) {
        case 'contact':
            include ('includes/_contact.html');
            break;
        case 'used':
            include ('includes/_usedgear.html');
            break;
        case 'map':
            include ('includes/_sitemap.html');
            break;
        case '':
        default:
            include ('includes/_home.html');
            break;
    }
    
    include ('includes/_footer.html');
    
?>