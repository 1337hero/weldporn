<?php
// Register Home Blocks Post Type
// Register Custom Post Type
function home_block_type() {

    $labels = array(
        'name'                  => _x( 'Home Blocks', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Home Blocks', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Home Blocks', 'text_domain' ),
        'name_admin_bar'        => __( 'Home Blocks', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'all_items'             => __( 'All Home Blocks', 'text_domain' ),
        'add_new_item'          => __( 'Add New Block', 'text_domain' ),
        'add_new'               => __( 'Add New Block', 'text_domain' ),
        'new_item'              => __( 'New Block', 'text_domain' ),
        'edit_item'             => __( 'Edit Block', 'text_domain' ),
        'update_item'           => __( 'Update Block', 'text_domain' ),
        'view_item'             => __( 'View Block', 'text_domain' ),
        'search_items'          => __( 'Search Blocks', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Home Blocks Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set Home Blocks image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove Home Blocks image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as Home Blocks image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Home Blocks', 'text_domain' ),
        'description'           => __( 'Home Blocks for home page', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-images-alt2',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'home_block', $args );

}
add_action( 'init', 'home_block_type', 0 );