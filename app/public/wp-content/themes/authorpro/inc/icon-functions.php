<?php
/**
 * SVG Icon Helper Functions
 *
 * @package rs_wp_starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return an SVG icon based on the icon name.
 *
 * @param string $icon_name Name of the icon.
 * @param int    $size      Optional. Size of the icon in pixels. Default 24.
 * @param string $class     Optional. Additional CSS classes for the SVG.
 * @return string The SVG markup.
 */
function authorpro_get_icon( $icon_name, $size = 24, $class = '' ) {
	$svg = '';
	
	$class_attr = 'class="icon icon-' . esc_attr( $icon_name ) . ( $class ? ' ' . esc_attr( $class ) : '' ) . '"';
	$size_attr  = 'width="' . esc_attr( $size ) . '" height="' . esc_attr( $size ) . '"';

	switch ( $icon_name ) {
		case 'search':
			$svg = '<svg ' . $class_attr . ' ' . $size_attr . ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>';
			break;
		case 'menu':
			$svg = '<svg ' . $class_attr . ' ' . $size_attr . ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
			break;
		case 'close':
			$svg = '<svg ' . $class_attr . ' ' . $size_attr . ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';
			break;
		// Add more SVGs here as an example...
	}

	return $svg;
}

/**
 * Echo an SVG icon.
 *
 * @param string $icon_name Name of the icon.
 * @param int    $size      Optional. Size of the icon in pixels. Default 24.
 * @param string $class     Optional. Additional CSS classes for the SVG.
 */
function authorpro_icon( $icon_name, $size = 24, $class = '' ) {
	echo authorpro_get_icon( $icon_name, $size, $class );
}
