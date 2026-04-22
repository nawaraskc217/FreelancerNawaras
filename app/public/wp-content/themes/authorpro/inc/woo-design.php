<?php
/**
 * Modern Tailwind CSS Cart Page Redesign
 * File: inc/woo-cart-design.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// 1. Wrap the Cart in a Tailwind Container
add_action( 'woocommerce_before_cart', 'authorpro_woo_cart_wrapper_start' );
function authorpro_woo_cart_wrapper_start() {
    echo '<div class="tw-modern-cart bg-slate-50 min-h-screen py-12">';
    echo '<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">';
    echo '<h1 class="text-3xl font-bold text-slate-900 mb-8">Your Shopping Cart</h1>';
    echo '<div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start">';
}

add_action( 'woocommerce_after_cart', 'authorpro_woo_cart_wrapper_end' );
function authorpro_woo_cart_wrapper_end() {
    echo '</div></div></div>';
}

// 2. Customize the Product Table (Left Side - 8/12)
// We use CSS to hide the default table headers on mobile and show cards
add_filter( 'woocommerce_cart_item_name', 'authorpro_cart_product_title', 10, 3 );
function authorpro_cart_product_title( $name, $cart_item, $cart_item_key ) {
    $_product = $cart_item['data'];
    $permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';

    return sprintf(
        '<span class="text-lg font-semibold text-indigo-600 hover:text-indigo-500 transition-colors">%s</span>',
        $name
    );
}

// 3. Styling the Quantity Group
add_filter( 'woocommerce_cart_item_quantity', 'authorpro_cart_quantity_input', 10, 3 );
function authorpro_cart_quantity_input( $product_quantity, $cart_item_key, $cart_item ) {
    // Note: To make +/- buttons fully functional, you'll need a small JS snippet
    // This adds the Tailwind classes to the standard WC input
    return str_replace( 'class="qty"', 'class="qty w-16 text-center border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"', $product_quantity );
}

/**
 * Enqueue Custom CSS for the Cart Layout
 * This targets the standard WooCommerce classes to inject Tailwind utility behaviors
 */
add_action( 'wp_enqueue_scripts', 'authorpro_woo_custom_styles' );
function authorpro_woo_custom_styles() {
    if ( is_woocommerce() || is_cart() || is_checkout() ) {
        wp_enqueue_style( 'rswp-woo-custom', get_template_directory_uri() . '/assets/css/woo-custom.css', array(), '1.0.0' );
    }
}

/**
 * Custom WooCommerce Layout Wrappers
 *
 * @package AuthorPro
 */

// 1. Remove default WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// 2. Add Custom Start Wrapper
add_action( 'woocommerce_before_main_content', 'authorpro_woo_wrapper_start', 10 );
function authorpro_woo_wrapper_start() {
    echo '<div class="authorpro-container py-12">';
    echo '<div class="flex flex-col lg:flex-row gap-12">';
    
    // Check if we are not on a single product page AND the shop sidebar has active widgets
    $has_sidebar = ! is_singular( 'product' ) && is_active_sidebar( 'sidebar-shop' );
    
    // If sidebar exists, take 75% width. Otherwise, take full width.
    $main_classes = $has_sidebar ? 'w-full lg:w-3/4' : 'w-full';
    
    echo '<main id="main" class="site-main ' . esc_attr( $main_classes ) . '">';
}

// 3. Add Custom End Wrapper (Closes main)
add_action( 'woocommerce_after_main_content', 'authorpro_woo_wrapper_end', 10 );
function authorpro_woo_wrapper_end() {
    echo '</main>';
}

// 4. Custom Sidebar Logic and Close Container
add_action( 'woocommerce_sidebar', 'authorpro_woo_sidebar', 10 );
function authorpro_woo_sidebar() {
    // Only show sidebar on archive/shop pages, not single products
    if ( ! is_singular( 'product' ) && is_active_sidebar( 'sidebar-shop' ) ) {
        echo '<aside class="w-full lg:w-1/4 widget-area">';
        dynamic_sidebar( 'sidebar-shop' );
        echo '</aside>';
    }
    
    // Close the flex div and container div opened in wrapper_start
    echo '</div>'; // End flex
    echo '</div>'; // End container
}