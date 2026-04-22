<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AuthorPro
 */

get_header();
?>

<?php
$main_bg = authorpro_has_custom_background() ? 'bg-transparent' : 'bg-slate-50';
$container_class = 'authorpro-container mx-auto px-4 sm:px-6 lg:px-8 pt-10';
if ( authorpro_has_custom_background() ) {
    $container_class .= ' bg-white/95 rounded-2xl shadow-sm pb-10 mb-12';
}
?>
<main id="main" class="authorpro-main-wrapper min-h-screen <?php echo esc_attr( $main_bg ); ?> py-12">
	<div class="<?php echo esc_attr( $container_class ); ?>">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div>
</main>

<?php
get_footer();