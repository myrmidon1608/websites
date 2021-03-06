<!DOCTYPE html>
<html>
    <head>
        <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        
        <link rel="shortcut icon" href="<?php root(); ?>/core/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php root(); ?>/core/img/favicon.ico" type="image/x-icon">
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php root(); ?>/core/css/fonts.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-54093348-1', 'auto');
            ga('send', 'pageview');
        </script>
        
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="row logo">
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 hidden-xs logo">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php root(); ?>/core/img/peach.png" alt="" />
                        </a>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-5 title">
                        <h1><?php bloginfo('name'); ?></h1>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 hidden-xs logo">
                        <h4 class="hidden-xs">Food with a View</h4>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-5 title">
                        <h4>accepts SNAP/EBT/WIC/SFMNP</h4>
                    </div>
                </div>
            </div>
            
            <div class="navbar row" role="navigation">
                <!-- Mobile button -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand visible-xs">Food with a View</p>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                
                    <div class="collapse navbar-collapse" id="main-navbar">
                        <?php 
                            $pages = (wp_count_posts("page")->publish) + 1;
                            $menuItemWidth = round((100/$pages), 3);
                        ?>
                        <ul class="nav navbar-nav">
                            <li class="<?php set_active("home"); ?>">
                                <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">Home</a>
                            </li>
                            <li class="<?php set_active(array(331, 478)); ?>">
                                <a href="vendors" title="2014 Vendors">Vendors</a>
                            </li>
                            <li class="<?php set_active(333); ?>">
                                <a href="events-calendar" title="Events Calendar">Events</a>
                            </li>
                            <li class="<?php set_active(335); ?>">
                                <a href="ogdens-end-community-garden" title="Ogden's End Community Garden">Garden</a>
                            </li>
                            <li class="<?php set_active(337); ?>">
                                <a href="contact" title="Contact <?php bloginfo('name'); ?>">Contact</a>
                            </li>
                            <li class="<?php set_active(354); ?>">
                                <a href="contribute" title="Contribute">Contribute</a>
                            </li>
                            <li class="<?php set_active(339); ?>">
                                <a href="frequently-asked-questions" title="<?php bloginfo('name'); ?> FAQs">FAQ</a>
                            </li>
                        </ul>
                    </div>
            </div>

            <?php if( is_home() ) : ?>
            
            <div class="alert-banner homepage row">
                <div class="col-sm-6">
                    <a href="sign-up-to-be-a-vendor" title="Vendor Application">Sign up to be a vendor</a>
                </div>
                <div class="col-sm-6">
                    <a href="contact" title="Contact <?php bloginfo('name'); ?>">Sign up for our newsletter</a>
                </div>
            </div>
            
            <?php include("archive-carousel-item.php"); endif; ?>

            <div class="content">
                <div class="row">