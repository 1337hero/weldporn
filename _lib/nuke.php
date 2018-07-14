<?php

//*******************************************//
//                                           //
//        WORDPRESS DOES STUPID THINGS       //
//      SO THIS FILE NUKES THAT STUFF!!      //
//                                           //
//*******************************************//

// REMOVE BLOAT FROM HEAD!!
add_filter( 'emoji_svg_url', '__return_false' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

// REORDER ADMIN MENU IN MY IMAGINE
function reorder_admin_menu( $__return_true ) {
    return array(
         'index.php', 
         'edit.php?post_type=product', // Products
         'edit.php?post_type=shop_order', // WooCommerce
         'separator1', // --Space--
         'upload.php',
         'edit.php?post_type=page',  // Pages
         'edit.php?post_type=slideshow', // HOMEPAGE SLIDESHOW 
         'edit.php?post_type=home_block', // LOGO ROTATOR
         'separator2', // --Space--
         'nav-menus.php', // MENU
         'themes.php', 
         'plugins.php', // Plugins
         'options-general.php', // Settings
         'users.php' // Users
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );


// REMOVE ACCESS TO THINGS WE DO NOT WANT THE CLIENT MESSING WITH
function remove_admin_menus() {
    remove_menu_page( 'edit.php' ); //Posts
    remove_menu_page( 'edit-comments.php' ); // Comments
    remove_menu_page( 'tools.php' ); // Tools
}
add_action( 'admin_menu', 'remove_admin_menus' );

// REMOVE ACCESS TO THEME CUSTOMIZE LINK
function remove_customize_page(){
 global $submenu;
 unset($submenu['themes.php'][6]); 
}
add_action( 'admin_menu', 'remove_customize_page');

// REMOVE DASHBOARD WIDGETS
function remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

// DISABLE SUPPORT FOR COMMENTS AND TRACKBACKS EVERYWHERE
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// CLOSE COMMENTS ON FRONT END
function df_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// HIDE EXISTING COMMENTS
function df_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// REDIRECT USER TRYING TO ACCESS COMMENTS PAGE
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// REMOVE COMMENTS METABOX FROM DASHBOARD
function df_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// REMOVE COMMENTS FROM ADMIN BAR
function df_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'df_disable_comments_admin_bar');

// ADD MESSAGE IN ADMIN AREA
add_filter('admin_footer_text', 'change_footer_content');
function change_footer_content() {
    echo 'Site built & managed by <a href="http://www.1337hero.com" target="_blank">Mike Key</a>';
}