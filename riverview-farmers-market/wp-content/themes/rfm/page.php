
    <?php get_header(); ?>

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <div class="the-page" id="page-<?php the_ID(); ?>">
                <h2><?php the_title(); ?></h2>

                <div class="the-content">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endwhile; else: ?>

        <?php endif; ?>

    <?php get_footer(); ?>
