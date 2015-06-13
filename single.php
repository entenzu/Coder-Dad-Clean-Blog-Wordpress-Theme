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
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php the_content(); ?>

                    <div class="comments">
                        <ul class="media-list">
                            <?php
                            //Gather comments for a specific page/post 
                            $comments = get_comments(array(
                                'post_id' => get_the_id(),
                                'status' => 'approve' //Change this to the type of comments to be displayed
                            ));

                            //Display the list of comments
                            wp_list_comments(array(
                                'per_page' => 10, //Allow comment pagination
                                'callback' => 'cdcb_post_comment_template',
                                'reverse_top_level' => false //Show the latest comments at the top of the list
                            ), $comments);
                        ?>
                        </ul>

                        <div class='comment-form'>
                            <?php
                            $commenter = wp_get_current_commenter();
                            $req = get_option( 'require_name_email' );
                            $aria_req = ( $req ? " aria-required='true'" : '' );
                            $fields =  array(
                                  'author' =>
                                    '<div class="comment-form-author form-group"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
                                    ( $req ? '<span class="required">*</span>' : '' ) .
                                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                                    '" class="form-control"' . $aria_req . ' /></div>',

                                  'email' =>
                                    '<div class="comment-form-email form-group"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                                    ( $req ? '<span class="required">*</span>' : '' ) .
                                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                                    '" class="form-control"' . $aria_req . ' /></div>',

                                  'url' =>
                                    '<div class="comment-form-url form-group"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
                                    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                                    '" class="form-control" /></div>',
                                );
                            $args = array(
                                  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                                  'comment_field' =>  '<div class="comment-form-comment form-group"><label for="comment">' . _x( 'Comment', 'noun' ) .
                                        '</label><textarea id="comment" name="comment" rows="8" class="form-control" aria-required="true">' .
                                        '</textarea></p>',
                                );
                            comment_form($args);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <hr>
    <?php endwhile; endif; ?>
<?php get_footer(); ?>