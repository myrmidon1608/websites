
    <?php get_header(); ?>

        <div class="main-content col-sm-12">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <div class="the-page" id="page-<?php the_ID(); ?>">
                <h2><?php the_title(); ?></h2>

                <div class="the-content">
                    <?php the_content(); ?>
                    
                    <?php include("email-form.php"); ?>
                </div>
            </div>

        <?php endwhile; else: ?>

        <?php endif; ?>

    <?php get_footer(); ?>
