
    <?php get_header(); ?>

        <div class="main-content col-sm-12">
            
        <!-- <h3>Donate to the Market</h3>

        <button type="button" class="btn btn-primary">PayPal</button>

        <p>Make a tax-deductible donation to Farms in the Heights, the 501(c)(3) non-profit that operates the Riverview Farmers Market.</p> -->

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <div class="the-page" id="page-<?php the_ID(); ?>">
                <h2><?php the_title(); ?></h2>

                <div class="the-content">
                    <?php the_content(); ?>
                    
                    <?php 
                        $emailType = "contribute";
                        include("email-form.php");
                    ?>
                </div>
            </div>

        <?php endwhile; else: ?>

        <?php endif; ?>

    <?php get_footer(); ?>
