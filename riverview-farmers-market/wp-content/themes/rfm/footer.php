
                    </div>
                    
                    <?php get_sidebar(); ?>
                    
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="footer align-center">
                &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
            </div>
        </div>
    
        <script src="<?php root(); ?>/core/js/jquery.min.js"></script>
        <script src="<?php root(); ?>/core/js/bootstrap.min.js"></script>     
        <script src="<?php root(); ?>/core/js/script.js"></script>
        
        <?php wp_footer(); ?>
    </body>
</html>