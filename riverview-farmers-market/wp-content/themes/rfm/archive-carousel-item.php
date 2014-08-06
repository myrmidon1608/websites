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
            
            <!--<div class="item active">
              <img src="//placehold.it/1024x700" alt="">
                <div class="carousel-caption">
                    <h1>Community</h1>
                    <p>A working Bootstrap carousel example.</p>
                </div>
            </div>
            <div class="item">
              <img src="//placehold.it/1024x700/662222" alt="">
                <div class="carousel-caption">
                    <h1>Fresh</h1>
                    <p>This is the second slide text.</p>
                </div>
            </div>
            <div class="item">
                <img src="//placehold.it/1024x700/119922" alt="">
                <div class="carousel-caption">
                    <h1>Arts</h1>
                    <p>Take note of the 'active' and 'slide' classes.</p>
                </div>
            </div>-->

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
