<?php 

// Perform a little bit of clean up on the 
// things like excerpts and content
include('inc/clean-up.php');

/**
 * Include Frameworks
 */
	/*
	 * Loads the Options Panel
	 *
	 * If you're loading from a child theme use stylesheet_directory
	 * instead of template_directory
	 */

	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/frameworks/theme-framework/' );
	require_once dirname( __FILE__ ) . '/frameworks/theme-framework/options-framework.php';

	// Loads options.php from child or parent theme
	$optionsfile = locate_template( 'options.php' );
	load_template( $optionsfile );

/**
 * Add theme support
 */
add_action('after_setup_theme', 'cdcb_add_theme_support');
function cdcb_add_theme_support(){
	add_theme_support( 'post-thumbnails' );
}

/**
 * Add Custom Comment Templates
 */
function cdcb_post_comment_template($comment, $args, $depth){
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

?>
	<li <?php comment_class( empty( $args['has_children'] ) ? 'well well-sm' : 'well well-sm parent' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="media-left">
	        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 100 ); ?>
			<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
	    </div>
	    <div class="media-body">
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
				<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
				?>
			</div>

			<?php comment_text(); ?>

		</div>
	</li>
<?php
}