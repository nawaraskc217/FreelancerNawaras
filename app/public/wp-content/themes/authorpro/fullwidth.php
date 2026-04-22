<?php
/**
 * Template Name: Full Width Template
 * Template Post Type: page
 *
 * @package Author Portfolio
 */
get_header();
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile; // End of the loop.
get_footer();
