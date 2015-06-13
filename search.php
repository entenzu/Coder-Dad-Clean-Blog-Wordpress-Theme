<?php get_header(); ?>

	<!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo of_get_option( 'home_image_uploader', 'http://lorempixel.com/g/1920/800/' ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>
                            Search results for: <?php echo $_GET['s']; ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

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
                <?php endwhile; else: ?>
                <h1 class="text-center">No results found for this search. Please try another.</h1>
                <hr>
                <div class="row">
                	
                	<div class="col-xs-12">
                		<form action="<?php echo home_url(); ?>" method="get" novalidate>
                		<div class="input-group">
					    	<span class="input-group-btn">
					    		<input value="Search" class="btn btn-default" type="submit">
					    	</span>
					    	<input type="text" class="form-control" name="s" style="padding: 25px;" placeholder="Search for...">
					    </div><!-- /input-group -->
					    </form>
                	</div>

                </div>
            	<?php endif; ?>
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