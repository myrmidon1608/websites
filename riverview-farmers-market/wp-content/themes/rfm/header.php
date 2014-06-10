<!DOCTYPE html>
<html>
    <head>
        <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="">
        
        <link rel="stylesheet" href="<?php root(); ?>/core/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php root(); ?>/core/css/fonts.css" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-5 hidden-xs logo">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php root(); ?>/core/img/peach.png" alt="" />
                            <div>'<?php echo date('y'); ?></div>
                        </a>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-7  col-xs-12">
                        <h1><?php bloginfo('name'); ?></h1>
                    </div>
                </div>
            </div>
            
            <div class="navbar row" role="navigation">
                <!-- Mobile button -->
                <div class="navbar-header col-sm-4">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <p class="navbar-brand">Food with a View<span class="visible-xs">&nbsp;&nbsp;'<?php echo date('y'); ?></span></p>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse col-sm-8" id="main-navbar">
                    <div class="nav navbar-nav row">
                        <div class="active col-sm-3"><a href="#" title="2014 Vendors">Vendors</a></div>
                        <div class="col-sm-3"><a href="#" title="Events Calendar">Events</a></div>
                        <div class="col-sm-3"><a href="#" title="Ogden's End Community Garden">Garden</a></div>
                        <div class="col-sm-3"><a href="#" title="Riverview Farmers Market FAQs">FAQ</a></div>
                    </div>
                </div>
            </div>

            <?php if( is_home() ) : include("home-carousel.php"); endif; ?>

            <div class="content">
                <div class="row">
                    <div class="main-content col-sm-8">