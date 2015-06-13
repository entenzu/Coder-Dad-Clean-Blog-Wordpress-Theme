<?php 
if( isset( $_POST['sentMessage'] ) ){
    $p = $_POST;
    $errors = [];

    if( empty( $_POST['contact_name'] ) ){
        $errors['name'] = 'You must enter a name.';
    }

    if( empty( $_POST['contact_email'] ) ){
        $errors['email'] = 'You must enter a email.';
    }

    if( !filter_var( $_POST['contact_email'], FILTER_VALIDATE_EMAIL ) ){
        $errors['email'] = 'You must enter a valid email.';
    }

    if( empty( $_POST['contact_message'] ) ){
        $errors['message'] = 'You must enter a message.';
    }

    if( empty( $errors ) ){
        $message = of_get_option('contact_format', "{{NAME}} has sent you a message using your contact form on {{BLOGNAME}}.\r\n\r\n They said:\r\n{{MESSAGE}}\r\n\r\n You can contact them back at: \r\n Email: {{EMAIL}}\r\n Phone: {{PHONE}}");
        $message = str_replace( '{{NAME}}'    , $_POST['contact_name']   , $message );
        $message = str_replace( '{{EMAIL}}'   , $_POST['contact_email']  , $message );
        $message = str_replace( '{{PHONE}}'   , $_POST['contact_phone']  , $message );
        $message = str_replace( '{{MESSAGE}}' , $_POST['contact_message'], $message );
        $message = str_replace( '{{BLOGNAME}}', get_bloginfo('name')     , $message );

        $subject = of_get_option('contact_subject', '{{NAME}} has sent you a message on {{BLOGNAME}}');
        $subject = str_replace( '{{NAME}}'    , $_POST['contact_name']   , $subject );
        $subject = str_replace( '{{BLOGNAME}}', get_bloginfo('name')     , $subject );

        if( !empty( of_get_option('contact_email') ) ){
            $sent = wp_mail( of_get_option('contact_email'), $subject, $message );

            if( $sent ){
                $success = of_get_option( 'contact_form_sent', 'Successfully sent the message.' );
                $success = str_replace( '{{NAME}}', $_POST['contact_name'], $success );
            } else {
                $errors['failed'] = of_get_option( 'contact_form_not_sent', 'Could not send the message' );
                $errors['failed'] = str_replace( '{{NAME}}', $_POST['contact_name'], $errors['failed'] );
            }
        }
    }
}

get_header(); 
?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo of_get_option( 'contact_image_uploader', 'http://lorempixel.com/g/1920/800/' ); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1><?php echo of_get_option( 'contact_headline', get_the_title() ); ?></h1>
                        <?php if( !empty( of_get_option( 'contact_sub_headline' ) ) ): ?>
                        <hr class="small">
                        <span class="subheading"><?php echo of_get_option( 'contact_sub_headline' ); ?></span>
                        <?php endif; ?>
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
                <p><?php the_content(); ?></p>
                
                <?php if( of_get_option('use_local_contact', 'yes') == 'yes' && !empty( of_get_option('contact_email') ) ): ?>
                <form method="post" id="contactForm" novalidate>
                   
                    <?php if( !empty( $success ) ): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>

                    <?php if( !empty( $errors['failed'] ) ): ?>
                        <div class="alert alert-danger"><?php echo $errors['failed']; ?></div>
                    <?php endif; ?>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="contact_name" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"><?php if( !empty( $errors['name'] ) ) echo $errors['name']; ?></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" name="contact_email" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"><?php if( !empty( $errors['email'] ) ) echo $errors['email']; ?></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Phone Number" name="contact_phone" id="phone">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" name="contact_message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"><?php if( !empty( $errors['message'] ) ) echo $errors['message']; ?></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" name="sentMessage" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
                <?php endif; endwhile; endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>