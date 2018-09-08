<?php

// Optimize WooCommerce Scripts
add_action( 'wp_enqueue_scripts', 'storefront_social_icons_enqueue_fab' );
function storefront_social_icons_enqueue_fab() {
    wp_enqueue_style( 'font-awesome-5-brands', '//use.fontawesome.com/releases/v5.0.13/css/brands.css' );
}

// Add Custom styles
add_action( 'wp_enqueue_scripts', 'load_theme', 999 );
function load_theme() {
    // wp_deregister_script( 'jquery' );
    wp_enqueue_style( 'main-styling', get_stylesheet_directory_uri() . '/assets/styles.min.css' );
    wp_register_script( 'theme', get_stylesheet_directory_uri() . '/assets/scripts.min.js','','',true );
    wp_enqueue_script( 'unslider' );
    wp_enqueue_script( 'theme' ); 
}

// Move JQuery to Google CDN
add_action( 'init', function(){
    if (  ! is_admin()) {
        if( is_ssl() ){
            $protocol = 'https';
        }else {
            $protocol = 'http';
        }

        /** @var WP_Scripts $wp_scripts */
        global  $wp_scripts;
        /** @var _WP_Dependency $core */
        $core = $wp_scripts->registered[ 'jquery-core' ];
        $core_version = $core->ver;
        $core->src = "$protocol://ajax.googleapis.com/ajax/libs/jquery/$core_version/jquery.min.js";

        if ( WP_DEBUG ) {
            /** @var _WP_Dependency $migrate */
            $migrate         = $wp_scripts->registered[ 'jquery-migrate' ];
            $migrate_version = $migrate->ver;
            $migrate->src    = "$protocol://cdn.jsdelivr.net/jquery.migrate/$migrate_version/jquery-migrate.min.js";
        }else{
            /** @var _WP_Dependency $jquery */
            $jquery = $wp_scripts->registered[ 'jquery' ];
            $jquery->deps = [ 'jquery-core' ];
        }

    }


},11 );


// Add Theme Support for these items
add_theme_support( 'title-tag' );

// Register some menus
function weld_navigation() {
  register_nav_menus(
    array(
      'nav-1' => __( 'Main Nav' ),
      'shop-head' => __( 'Shop' ),
      'footer-1' => __( 'Footer-1' )
    )
  );
}
add_action( 'init', 'weld_navigation' );

// Bring together these other parts
require_once('extras.php' );
require_once('login.php' );
require_once('nuke.php' );
require_once('post-type-slideshow.php' );