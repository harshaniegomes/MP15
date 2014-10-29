<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge;FF=3;OtherUA=4" />
<link rel="icon" href="/wp-content/themes/event-site-2013/gsma-icon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/wp-content/themes/event-site-2013/gsma-icon.ico" type="image/x-icon" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>><div id="level_1_wrap"><div id="bgwrap">
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
        <nav id="top-navigation" class="secondary-navigation" role="navigation">
   			<?php // wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'nav-menu' ) ); ?>
        </nav>
		<hgroup>
        	
            
            
        	<div id="logo-wrap"><a href="<?php  
					
					if( current_user_can('level_1') ) { ?>							
                        
                    	<?php if ( strpos( $_SERVER['REQUEST_URI'], '/fr/' ) === 0 ) { ?> 
                            <?php echo esc_url( home_url( '/fr/' )); ?> 
                            
                        <?php } else if ( strpos( $_SERVER['REQUEST_URI'], '/es/' ) === 0 ) { ?> 
                        	 <?php echo esc_url( home_url( '/es/' )); ?> 
                             
                        <?php } else { ?> 
                            <?php echo esc_url( home_url( '/' )); ?> 
                        <?php  } ?> 
                        
                                               
					<?php } else if( current_user_can('level_0') ) { ?>	
                    
						<?php if ( strpos( $_SERVER['REQUEST_URI'], '/fr/' ) === 0 ) { ?> 
                            <?php echo esc_url( home_url( '/fr/' )); ?> 
                            
                        <?php } else if ( strpos( $_SERVER['REQUEST_URI'], '/es/' ) === 0 ) { ?> 
                        	 <?php echo esc_url( home_url( '/es/' )); ?> 
                             
                        <?php } else { ?> 
                            <?php echo esc_url( home_url( '/' )); ?> 
                        <?php  } ?> 

					<?php } else { ?>
						<?php echo esc_url( home_url( '/' )); ?>
					<?php } ?> " title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="/wp-content/themes/event-site-2013/images/MP_logo_2014.png"></a></div>
                    
			<?php do_action('icl_language_selector'); ?>           
            
            
		</hgroup>

		

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->
	<div class="main_dropshadow">
	<div id="main" class="wrapper">
    <nav id="site-navigation" class="main-navigation" role="navigation">
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
            <?php $walker = new id_walker; wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ,'walker'=>$walker) ); ?>
		</nav><!-- #site-navigation -->