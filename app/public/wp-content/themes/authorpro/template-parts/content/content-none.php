<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package AuthorPro
 */

?>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-12 text-center max-w-2xl mx-auto">
	<div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
		<svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
		</svg>
	</div>
	<h2 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e( 'Nothing Found', 'authorpro' ); ?></h2>
	
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p class="text-slate-600 mb-8">
			<?php
			printf(
				wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'authorpro' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		</p>

	<?php elseif ( is_search() ) : ?>

		<p class="text-slate-600 mb-8">
			<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'authorpro' ); ?>
		</p>
		
		<div class="max-w-md mx-auto relative group">
			<?php get_search_form(); ?>
		</div>

	<?php else : ?>

		<p class="text-slate-600 mb-8">
			<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'authorpro' ); ?>
		</p>
		
		<div class="max-w-md mx-auto relative group">
			<?php get_search_form(); ?>
		</div>

	<?php endif; ?>
</div>
