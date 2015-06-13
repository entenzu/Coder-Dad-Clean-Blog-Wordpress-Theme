<?php get_header(); ?>  
    <?php if( have_posts() ): while( have_posts() ): the_post(); ?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php the_title(); ?></h1>
                        <span class="meta">Posted by <a href="<?php the_author_meta('user_url'); ?>"><?php the_author(); ?></a> on <?php the_date(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 post-' . the_ID() . ' col-lg-offset-2 col-md-10 col-md-offset-1'); ?>>
                    <?php the_content(); ?>
                    
                    <?php comments_template(); ?>
                </div>
            </div>
        </div>
    </article>

    <hr>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>