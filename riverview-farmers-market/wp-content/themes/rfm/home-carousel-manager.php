<?php

    add_action("init", "home_carousel_manager");

    function home_carousel_manager() {
        $args = array(
            "label" => __("Homepage Carousel"),
            "singluar_label" => __("Carousel"),
            "hierarchical" => false,
            "public" => true,
            "show_ui" => true,
            "capacity_type" => "post",
            "has_archive" => true,
            "supports" => array(""),
            "rewrite" => array("slug" => "carousel-item", "with_front" => false)
            
        );
        
        register_post_type("carousel-item", $args);
    }

    if(function_exists("add_theme_support")) {
        add_theme_support("post-thumbnails");
        add_image_size("carousel-img");
    }

    register_taxonomy(
        "carousel-item",
        array("carousel-item"),
        array(
            "label" => "Homepage Carousel",
            "singluar_label" => "Carousel",
            "hierarchical" => false,
            "rewrite" => true,
            "slug" => "carousel-item"
        )
    );
    
    add_action("admin_init", "carousel_add_meta");

    function carousel_add_meta() {
        add_meta_box("carousel-meta", "Homepage Carousel", "carousel_meta_options", "carousel-item", "normal", "high");
    }

    function carousel_meta_options() {
        global $post;
        
        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
            return $post_id;
        }
        
        $custom = get_post_custom($post -> ID);
        $title = $custom["title"][0];
        $details = $custom["details"][0];
        $link = $custom["link"][0];
        $image = $custom["image"][0];
    ?>

    <style type="text/css">
        <?php include ("core/css/carousel-manager.css"); ?>
    </style>

    <div class="carousel-editor">
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="<?php echo $title; ?>" />
        </div>
        <div>
            <label>Details:</label>
            <input type="text" name="details" value="<?php echo $details; ?>" />
        </div>
        <div>
            <label>Link:</label>
            <input type="text" name="link" value="<?php echo $link; ?>" />
        </div>
        <div>
            <label>Image:</label>
            <input type="file" name="image" />
            <span><?php echo $image; ?></span>
        </div>
    </div>
<?php

    }
    
    add_action('wp_insert_post', 'handle_upload_field');

    function handle_upload_field() {
        if (!empty($_FILES['image']['name'])) {
            $upload = wp_handle_upload($_FILES['image']);
            if (!isset($upload['error'])) {
                // no errors, do what you like
            }
        }
    }
    
    add_action("save_post", "home_carousel_save");
    
    function home_carousel_save() {
        global $post;
        
        if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) {
            return $post_id;
        } else {
            update_post_meta($post -> ID, "title", $_POST["title"]);
            update_post_meta($post -> ID, "details", $_POST["details"]);
            update_post_meta($post -> ID, "link", $_POST["link"]);
            if(!empty($_POST["image"])) {
                update_post_meta($post -> ID, "image", $_POST["image"]);
            }
        }
    }
    
?>