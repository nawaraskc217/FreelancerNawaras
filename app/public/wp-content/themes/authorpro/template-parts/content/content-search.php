<?php
/**
 * Template part for displaying search results
 *
 * @package AuthorPro
 */

// Determine Post Type Label
$post_type_label = 'Page';
$label_color_class = 'bg-slate-100 text-slate-600';
$post_type = get_post_type();

if ('docs' === $post_type) {
	$label_color_class = 'bg-blue-100 text-blue-700';
	$post_type_label = 'Documentation';
} elseif ('post' === $post_type) {
	$label_color_class = 'bg-emerald-100 text-emerald-700';
	$post_type_label = 'Blog';
} elseif ('book' === $post_type) {
	$label_color_class = 'bg-purple-100 text-purple-700';
	$post_type_label = 'Book';
}
?>

<article id="post-<?php the_ID(); ?>"
	class="bg-white rounded-lg shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow duration-200 flex flex-col md:flex-row gap-6">

	<div class="flex-1">
		<header class="mb-2">
			<div class="flex items-center gap-3 mb-2">
				<span
					class="text-xs font-semibold px-2.5 py-0.5 rounded-full uppercase tracking-wide <?php echo esc_attr($label_color_class); ?>">
					<?php echo esc_html($post_type_label); ?>
				</span>
				<span class="text-xs text-slate-400 flex items-center">
					<svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
						</path>
					</svg>
					<?php echo esc_html(get_the_date()); ?>
				</span>
			</div>
			<?php the_title(sprintf('<h2 class="text-xl font-bold text-slate-900 mb-1 break-words"><a href="%s" class="hover:text-brand-600 transition-colors">', esc_url(get_permalink())), '</a></h2>'); ?>
		</header>

		<div class="text-slate-600 text-sm leading-relaxed mb-4 line-clamp-2">
			<?php the_excerpt(); ?>
		</div>

		<a href="<?php the_permalink(); ?>"
			class="inline-flex items-center text-sm font-medium text-brand-600 hover:text-brand-700">
			<?php esc_html_e('Read more', 'authorpro'); ?>
			<svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
				</path>
			</svg>
		</a>
	</div>
</article>