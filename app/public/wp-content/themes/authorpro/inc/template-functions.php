<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package AuthorPro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function authorpro_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'authorpro_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function authorpro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'authorpro_pingback_header' );

/**
 * Check if a custom background image or a non-default custom background color is set.
 */
function authorpro_has_custom_background() {
    $bg_color = get_background_color();
    $default_color = 'ffffff'; 
    $support = get_theme_support( 'custom-background' );
    if ( is_array( $support ) && isset( $support[0]['default-color'] ) ) {
        $default_color = $support[0]['default-color'];
    }
    return get_background_image() || ( $bg_color && $bg_color !== $default_color );
}
