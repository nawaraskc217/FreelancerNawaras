<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AuthorPro
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h3 class="text-2xl font-bold text-slate-900 mb-8">
			<?php
			$authorpro_comment_count = get_comments_number();
			if ( '1' === $authorpro_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'authorpro' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comment', '%1$s Comments', $authorpro_comment_count, 'comments title', 'authorpro' ) ),
					number_format_i18n( $authorpro_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<div class="space-y-8 comment-list">
			<?php
			wp_list_comments(
				array(
					'style'        => 'div',
					'short_ping'   => true,
					'callback'     => 'authorpro_comment_callback',
                    'end-callback' => 'authorpro_comment_end_callback',
                    'avatar_size'  => 40,
				)
			);
			?>
		</div>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'authorpro' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
    $html_req  = ( $req ? " required='required'" : '' );
    $html5     = true;

	comment_form(
		array(
            'class_container'    => 'mt-16 bg-white rounded-2xl border border-slate-200 p-8 shadow-sm',
            'class_form'         => 'comment-form',
            'title_reply'        => esc_html__( 'Leave a Reply', 'authorpro' ),
            'title_reply_before' => '<h3 class="text-lg font-bold text-slate-900 mb-6">',
            'title_reply_after'  => '</h3>',
            'fields'             => array(
                'author' => sprintf(
                    '<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6"><div><label for="author" class="block text-sm font-medium text-slate-700 mb-2">%s %s</label><input id="author" name="author" type="text" value="%s" size="30" maxlength="245" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none transition text-sm" placeholder="%s"%s /></div>',
                    esc_html__( 'Name', 'authorpro' ),
                    ( $req ? '<span class="text-brand-600">*</span>' : '' ),
                    esc_attr( $commenter['comment_author'] ),
                    esc_attr__( 'John Doe', 'authorpro' ),
                    $aria_req . $html_req
                ),
                'email'  => sprintf(
                    '<div><label for="email" class="block text-sm font-medium text-slate-700 mb-2">%s %s</label><input id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none transition text-sm" placeholder="%s"%s /></div></div>',
                    esc_html__( 'Email', 'authorpro' ),
                    ( $req ? '<span class="text-brand-600">*</span>' : '' ),
                    ( $html5 ? 'type="email"' : 'type="text"' ),
                    esc_attr( $commenter['comment_author_email'] ),
                    esc_attr__( 'john@example.com', 'authorpro' ),
                    $aria_req . $html_req
                ),
                'url'    => sprintf(
                    '<div class="mb-6"><label for="url" class="block text-sm font-medium text-slate-700 mb-2">%s</label><input id="url" name="url" %s value="%s" size="30" maxlength="200" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none transition text-sm" placeholder="%s" /></div>',
                    esc_html__( 'Website', 'authorpro' ),
                    ( $html5 ? 'type="url"' : 'type="text"' ),
                    esc_attr( $commenter['comment_author_url'] ),
                    esc_attr__( 'https://yourwebsite.com', 'authorpro' )
                ),
                'cookies' => sprintf(
                    '<div class="flex items-start mb-6"><div class="flex items-center h-5"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s class="w-4 h-4 border border-slate-300 rounded bg-slate-50 text-brand-600 focus:ring-3 focus:ring-brand-100" /></div><div class="ml-3 text-sm"><label for="wp-comment-cookies-consent" class="font-medium text-slate-600">%s</label></div></div>',
                    ( empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"' ),
                    esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'authorpro' )
                ),
            ),
            'comment_field' => sprintf(
                '<div class="mb-6"><label for="comment" class="block text-sm font-medium text-slate-700 mb-2">%s <span class="text-brand-600">*</span></label><textarea id="comment" name="comment" rows="5" maxlength="65525" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500 outline-none transition resize-y text-sm" placeholder="%s" required="required"></textarea></div>',
                esc_html_x( 'Comment', 'noun', 'authorpro' ),
                esc_attr__( 'Write your thoughts here...', 'authorpro' )
            ),
            'submit_button' => '<button type="submit" name="%1$s" id="%2$s" class="%3$s">%4$s</button>',
            'class_submit'  => 'inline-flex justify-center items-center px-8 py-3 bg-slate-900 text-white font-bold text-sm rounded-lg hover:bg-slate-800 transition shadow-lg shadow-slate-900/20 transform hover:-translate-y-0.5',
            'label_submit'  => esc_html__( 'Post Comment', 'authorpro' ),
		)
	);
	?>

</div><!-- #comments -->
