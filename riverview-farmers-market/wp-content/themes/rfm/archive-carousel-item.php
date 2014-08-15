    <div id="homepage-carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
        <p class="hours align-right">
            May-November<br />
            Sundays&nbsp;&nbsp;9am–2pm
        </p>
        <div class="carousel-inner">

        <?php 
        
            $carousel = get_posts(array("post_type" => "carousel-item", "numberposts" => -1));
            $i = 0;
            
            foreach($carousel as $post): setup_postdata($post);

            $custom = get_post_custom($post->ID);

            $title = $custom["title"][0];
            $details = $custom["details"][0];
            $link = $custom["link"][0];
            $image = $custom["image"][0]; ?>
            
            <div class="item<?php if($i == 0) { ?> active<?php } ?>" id="carousel-item-<?php the_ID(); ?>">
                <img src="<?php root(); ?>/core/img/carousel/<?php echo $image; ?>" alt="<?php echo $details; ?>">
                <a href="<?php echo $link; ?>">
                    <div class="carousel-caption">
                        <h1><?php echo $title; ?></h1>
                        <p><?php echo $details; ?></p>
                    </div>
                </a>
            </div>

        <?php 
            $i++;
            endforeach;  ?>

        </div>

        <!-- Controls
        <a class="left carousel-control" href="#homepage-carousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#homepage-carousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a> -->
    </div>
