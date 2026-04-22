<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AuthorPro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('flex flex-col bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-lg transition duration-300 group h-full'); ?>>

	<?php authorpro_post_thumbnail('medium_large', ''); ?>

	<div class="p-6 flex flex-col flex-1">

		<div class="flex items-center text-xs text-slate-400 mb-3 font-medium">
			<?php authorpro_posted_on(); ?>
		</div>

		<?php
		if (is_singular()):
			the_title('<h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">', '</h1>');
		else:
			the_title('<h3 class="text-xl aldatitle font-bold text-slate-900 mb-3 group-hover:text-brand-600 transition line-clamp-3 break-words"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
		endif;
		?>

		<div class="text-slate-600 text-sm mb-4 flex-grow line-clamp-4 leading-relaxed">
			<?php the_excerpt(); ?>
		</div>

		<?php authorpro_posted_by(); ?>

	</div><!-- .p-6 -->
</article><!-- #post-<?php the_ID(); ?> -->