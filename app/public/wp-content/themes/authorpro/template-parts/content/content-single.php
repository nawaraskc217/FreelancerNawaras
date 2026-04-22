<?php
/**
 * Template part for displaying single posts
 *
 * @package AuthorPro
 */

?>

<?php
$main_classes = 'pt-20 pb-20';
if ( authorpro_has_custom_background() ) {
    $main_classes .= ' max-w-5xl mx-auto bg-white/95 rounded-2xl shadow-sm my-12';
}
?>
<main id="main" class="<?php echo esc_attr( $main_classes ); ?>">

	<!-- Post Header -->
	<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-12">
		<?php authorpro_breadcrumb(); ?>
		<?php the_title( '<h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight mb-6">', '</h1>' ); ?>

		<div class="flex items-center justify-center space-x-6 text-sm">
			<div class="flex items-center">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 40, '', '', array( 'class' => 'h-10 w-10 rounded-full border-2 border-white shadow-sm mr-3' ) ); ?>
				<div class="text-left">
					<p class="text-slate-900 font-semibold"><?php the_author(); ?></p>
					<p class="text-slate-500"><?php echo get_the_date(); ?></p>
				</div>
			</div>
			<!-- Reading time placeholder -->
			<div class="hidden sm:block h-8 w-px bg-slate-200"></div>
			<div class="hidden sm:flex text-slate-500">
				<svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
				<?php
				$word_count   = str_word_count( strip_tags( get_the_content() ) );
				$reading_time = ceil( $word_count / 200 );
				printf( esc_html__( '%s min read', 'authorpro' ), $reading_time );
				?>
			</div>
		</div>
	</div>

	<!-- Featured Image -->
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
		<div class="aspect-w-16 aspect-h-9 relative rounded-2xl overflow-hidden shadow-2xl ring-1 ring-slate-900/5">
			<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
		</div>
	</div>
	<?php endif; ?>

	<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

		<div class="flex items-center justify-between border-b border-slate-100 pb-6 mb-8">
			<span class="text-sm font-bold text-slate-900"><?php esc_html_e( 'Share Article', 'authorpro' ); ?></span>
			<div class="flex gap-2">
				<button class="p-2 text-slate-500 hover:text-[#1877F2] hover:bg-slate-50 rounded-full transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></button>
				<button class="p-2 text-slate-500 hover:text-[#1DA1F2] hover:bg-slate-50 rounded-full transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg></button>
				<button class="p-2 text-slate-500 hover:text-[#0A66C2] hover:bg-slate-50 rounded-full transition"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></button>
			</div>
		</div>

		<article id="post-<?php the_ID(); ?>" class="prose prose-slate prose-lg max-w-none prose-headings:font-bold flow-root clearfix">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'authorpro' ),
					'after'  => '</div>',
				)
			);
			?>
		</article>

		<!-- Author Box -->
		<div class="mt-16 p-8 bg-slate-50 rounded-2xl border border-slate-100 flex flex-col sm:flex-row items-center sm:items-start gap-6">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 80, '', '', array( 'class' => 'w-20 h-20 rounded-full object-cover border-2 border-white shadow-md' ) ); ?>
			<div class="text-center sm:text-left">
				<h4 class="text-lg font-bold text-slate-900 mb-1"><?php printf( esc_html__( 'Written by %s', 'authorpro' ), get_the_author() ); ?></h4>
				<p class="text-slate-600 text-sm mb-4">
					<?php echo get_the_author_meta( 'description' ); ?>
				</p>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="text-brand-600 text-sm font-semibold hover:underline"><?php esc_html_e( 'View all posts →', 'authorpro' ); ?></a>
			</div>
		</div>

		<!-- Comments -->
		<?php
		if ( comments_open() || get_comments_number() ) :
			?>
			<div id="comments" class="mt-16 pt-12 border-t border-slate-200">
				<?php comments_template(); ?>
			</div>
			<?php 
		endif;
		?>

	</div>
</main>
