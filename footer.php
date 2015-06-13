
    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="<?php echo of_get_option( 'twitter_footer' ); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo of_get_option( 'facebook_footer' ); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo of_get_option( 'pinterest_footer' ); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted"><?php echo str_replace( '{{DATE}}', date('Y'), 
                                                                str_replace( '{{BLOGNAME}}', get_bloginfo('name'), 
                                                                str_replace( '©', '&copy;', 
                                                                    of_get_option('copyright', "Copyright &copy; " . get_bloginfo('name') . ' ' . date('Y') ) 
                                                                ) ) ); ?></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/clean-blog.min.js"></script>
    
    <?php wp_footer(); ?>
</body>

</html>
