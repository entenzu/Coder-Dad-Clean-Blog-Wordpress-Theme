<?php get_header(); ?>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
                <div class="post-preview">
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="post-title">
                            <?php the_title(); ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php the_excerpt(); ?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?></a> on <?php echo get_the_date(); ?></p>
                </div>
                <hr>
                <?php endwhile; endif; ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="prev pull-left">
                        <?php previous_posts_link( '&larr; Newer Entries' ) ?>
                    </li>
                    <li class="next">
                        <?php next_posts_link( 'Older Posts &rarr;' ); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php get_footer(); ?>