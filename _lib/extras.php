<?php

// Replace Out of Stock
add_filter('woocommerce_get_availability', 'availability_filter_func');
function availability_filter_func($availability)
{
    $availability['availability'] = str_ireplace('Out of stock', 'Sold Out', $availability['availability']);
    return $availability;
}

/**
 * Change the add to cart text on single product pages
 */
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );

function woo_custom_cart_button_text() {

    global $woocommerce;
    
    foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
        $_product = $values['data'];
    
        if( get_the_ID() == $_product->id ) {
            return __('Already in cart - Add Again?', 'woocommerce');
        }
    }
    
    return __('Add to cart', 'woocommerce');
}

/**
 * Change the add to cart text on product archives
 */
add_filter( 'add_to_cart_text', 'woo_archive_custom_cart_button_text' );

function woo_archive_custom_cart_button_text() {

    global $woocommerce;
    
    foreach($woocommerce->cart->get_cart() as $cart_item_key => $values ) {
        $_product = $values['data'];
    
        if( get_the_ID() == $_product->id ) {
            return __('Already in cart', 'woocommerce');
        }
    }
    
    return __('Add to cart', 'woocommerce');
}

remove_action( 'woocommerce_before_shop_loop', 'storefront_woocommerce_pagination', 30 );

add_filter( 'woocommerce_product_tabs', 'woo_rename_tab', 98);
function woo_rename_tab($tabs) {

 $tabs['description']['title'] = 'More info';

 return $tabs;
}

add_filter( 'woocommerce_page_title', 'woo_shop_page_title');

function woo_shop_page_title( $page_title ) {
    
    if( 'Shop' == $page_title) {
        return "Upgrade Your Truck!";
    }
}



function iconic_modify_theme_support() {
    $theme_support = get_theme_support( 'woocommerce' );
    $theme_support = is_array( $theme_support ) ? $theme_support[0] : array();
 
    $theme_support['single_image_width'] = 1024;
    $theme_support['thumbnail_image_width'] = 300;
 
    remove_theme_support( 'woocommerce' );
    add_theme_support( 'woocommerce', $theme_support );
}
 
add_action( 'after_setup_theme', 'iconic_modify_theme_support', 10 );

