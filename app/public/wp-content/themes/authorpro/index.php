<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AuthorPro
 */

get_header();
?>
	<?php
	$bg_wrapper_class = authorpro_has_custom_background() ? 'bg-transparent' : 'bg-slate-50';
	$container_class = 'authorpro-container mx-auto px-4 sm:px-6 lg:px-8';
	if ( authorpro_has_custom_background() ) {
		$container_class .= ' bg-white/95 rounded-2xl shadow-sm py-10 mt-6 mb-12';
	}
	?>
	<div class="authorpro-main-wrapper <?php echo esc_attr( $bg_wrapper_class ); ?> py-12">
		<div class="<?php echo esc_attr( $container_class ); ?>">
			<?php
			// 1. Fetch Settings
			$show_sidebar = get_theme_mod( 'authorpro_blog_sidebar', true ) && is_active_sidebar( 'sidebar-1' );
			$columns      = get_theme_mod( 'authorpro_blog_columns', '3' );

			// 2. Define Layout Classes
			$main_class = $show_sidebar ? 'w-full lg:w-3/4' : 'w-full';
			
			// 3. Define Grid Classes safely for Tailwind JIT
			$grid_class = 'grid grid-cols-1 md:grid-cols-2 gap-8';
			if ( '1' === $columns ) {
				$grid_class = 'grid grid-cols-1 gap-8';
			} elseif ( '2' === $columns ) {
				$grid_class = 'grid grid-cols-1 md:grid-cols-2 gap-8';
			} elseif ( '3' === $columns ) {
				$grid_class = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8';
			} elseif ( '4' === $columns ) {
				$grid_class = 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8';
			}
			?>

			<div class="flex flex-col lg:flex-row gap-12">
				<main id="main" class="<?php echo esc_attr( $main_class ); ?>">
					<?php if ( have_posts() ) : ?>
						<div class="<?php echo esc_attr( $grid_class ); ?>">
							<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content/content' );
							endwhile;
							?>
						</div>

						<?php authorpro_pagination(); ?>

					<?php else : ?>
						<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
					<?php endif; ?>
				</main>

				<?php if ( $show_sidebar ) : ?>
					<aside class="w-full lg:w-1/4 widget-area pl-0 lg:pl-8">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</aside>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php
get_footer();
