<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AuthorPro
 */

get_header();
?>

<main id="main" class="min-h-screen">
	<!-- Hero Header -->
	<?php $hero_bg = authorpro_has_custom_background() ? 'bg-white/95 backdrop-blur-md' : 'bg-white'; ?>
	<header class="<?php echo esc_attr( $hero_bg ); ?> border-b border-slate-200 pt-20 pb-16">
		<div class="authorpro-container mx-auto px-4 text-center">
			
			<h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 mb-4 tracking-tight">
				<?php esc_html_e( 'Search Results', 'authorpro' ); ?>
			</h1>
			
			<div class="max-w-2xl mx-auto text-lg text-slate-500 mb-8">
				<?php
				/* translators: 1: number of results, 2: search query. */
				printf(
					esc_html( _n( 'We found %1$s result for your search "%2$s"', 'We found %1$s results for your search "%2$s"', $wp_query->found_posts, 'authorpro' ) ),
					'<span class="font-bold text-slate-900">' . esc_html( number_format_i18n( $wp_query->found_posts ) ) . '</span>',
					'<span class="font-bold text-slate-900">' . get_search_query() . '</span>'
				);
				?>
			</div>

			<!-- Search Form -->
			<div class="max-w-lg mx-auto">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header>

	<!-- Grid Section -->
	<?php
	$bg_wrapper_class = authorpro_has_custom_background() ? 'bg-transparent' : 'bg-slate-50';
	$container_class = 'authorpro-container mx-auto px-4 sm:px-6 lg:px-8';
	if ( authorpro_has_custom_background() ) {
		$container_class .= ' bg-white/95 rounded-2xl shadow-sm py-10 mt-6 mb-12';
	}
	?>
	<div class="authorpro-main-wrapper <?php echo esc_attr( $bg_wrapper_class ); ?> py-12">
		<div class="<?php echo esc_attr( $container_class ); ?>">
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
				<div class="<?php echo esc_attr( $main_class ); ?>">
					<?php if ( have_posts() ) : ?>
						<div class="<?php echo esc_attr( $grid_class ); ?>">
							<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content/content', is_search() ? 'search' : '' );
							endwhile;
							?>
						</div>

						<?php authorpro_pagination(); ?>

					<?php else : ?>
						<div class="text-center py-20">
							<h2 class="text-2xl font-bold text-slate-900 mb-4"><?php esc_html_e( 'Nothing Found', 'authorpro' ); ?></h2>
							<p class="text-slate-600 mb-8 max-w-lg mx-auto"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'authorpro' ); ?></p>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( $show_sidebar ) : ?>
					<aside class="w-full lg:w-1/4 widget-area pl-0 lg:pl-8">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</aside>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();