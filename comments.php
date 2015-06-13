<?php


/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<hr id="comments"> 

<h1><?php comments_number( 'Be the first to respond', '1 Response', '% Responses' ); ?></h1>
<hr> 

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
            'callback' => 'cdcb_post_comment_template',
            'reverse_top_level' => false //Show the latest comments at the top of the list
        ), $comments);
    ?>
    </ul>

    <nav>
        <ul class="pager">
            <li class="previous"><?php previous_comments_link( '<span aria-hidden="true">&larr;</span> Older' ); ?></li>
            <li class="next"><?php next_comments_link( 'Newer <span aria-hidden="true">&rarr;</span>' ); ?></li>
        </ul>
    </nav>

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