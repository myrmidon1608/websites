
    <?php get_header(); ?>

        <div class="main-content col-sm-8">

            <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

                <div class="the-post">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    <h4><?php the_date(); ?></h4>

                    <div class="the-content">
                        <?php the_content('Read more...'); ?>
                    </div>
                </div>

            <?php endwhile; else: ?>

            <?php endif; ?>
        
        </div>

        <?php get_sidebar(); ?>

    <?php get_footer(); ?>
