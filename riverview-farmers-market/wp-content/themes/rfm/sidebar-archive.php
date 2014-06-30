
    <div class="sidebar-archive sidebar-item">
        <div class="sidebar-inner">
            <h4>Recent Posts</h4>
            <?php wp_get_archives(
                    array(
                        'type' => 'postbypost',
                        'limit' => 5,
                        'format' => 'custom',
                        'before' => '<p>',
                        'after' => '</p>'
                    )
                ); ?>
        </div>
    </div>