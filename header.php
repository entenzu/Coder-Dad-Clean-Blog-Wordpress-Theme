<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php wp_title(); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/clean-blog.min.css" rel="stylesheet">
        
    <!-- Theme CSS -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">

    <?php wp_head(); ?>

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body <?php body_class( is_user_logged_in() ? 'logged-in' : '' ); ?>>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php home_url(); ?>">
                    <?php if ( of_get_option( 'logo_uploader' ) ) { ?>
                    <img src="<?php echo of_get_option( 'logo_uploader' ); ?>" class="img-responsive logo" />
                    <?php 
                    } else { 
                        bloginfo( 'name' );
                    }
                    ?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php   
                /**
                 * Displays a navigation menu
                 * @param array $args Arguments
                 */
                $args = array(
                    'theme_location' => 'cdcb_header_nav',
                    'menu' => '',
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_link_pages',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
                    'depth' => -1,
                    'walker' => ''
                );
            
                wp_nav_menu( $args );
                ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <?php if( is_home() || is_404() ): ?>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo of_get_option( 'home_image_uploader', 'http://lorempixel.com/g/1920/800/' ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>
                            <?php echo of_get_option( 'header_top_line', get_bloginfo('name') ); ?>
                        </h1>
                        <hr class="small">
                        <span class="subheading"><?php echo of_get_option( 'header_bottom_line', get_bloginfo('description') ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>

    