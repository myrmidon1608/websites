
    <?php get_header(); ?>

        <div class="main-content col-sm-8">

        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

            <div class="the-post-single">
                <h2><?php the_title(); ?></h2>
                <h4><?php the_date(); ?></h4>

                <div class="the-content">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php endwhile; else: ?>

        <?php endif; ?>
        
        </div>

        <?php get_sidebar(); ?>

    <?php get_footer(); ?>
