<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package AuthorPro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden' ); ?>>

	<header class="border-b border-slate-100 px-8 py-8 bg-white">
		<?php the_title( '<h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">', '</h1>' ); ?>
	</header>

	<div class="px-8 py-8">
		<div class="prose prose-slate max-w-none prose-headings:font-bold prose-a:text-brand-600 hover:prose-a:text-brand-700 prose-img:rounded-lg flow-root clearfix">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links mt-6 pt-6 border-t border-slate-100 text-sm font-medium text-slate-600">' . esc_html__( 'Pages:', 'authorpro' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</div>

</article>
