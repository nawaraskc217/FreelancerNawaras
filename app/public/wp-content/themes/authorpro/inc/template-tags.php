<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AuthorPro
 */

if ( ! function_exists( 'authorpro_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function authorpro_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);

		// Calculate Reading Time
		$word_count   = str_word_count( strip_tags( get_the_content() ) );
		$reading_time = ceil( $word_count / 200 ); // average 200 words per minute
		$reading_time_text = sprintf(
			/* translators: %s: time in minutes */
			esc_html__( '%s min read', 'authorpro' ),
			$reading_time
		);

		// Output Wrapper
        echo '<div class="flex items-center text-sm text-slate-500 font-medium mb-2">';
        
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'authorpro' ),
			$time_string
		);

		echo '<span class="posted-on flex items-center gap-1">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<span class="mx-2 text-slate-300">&bull;</span>';
		echo '<span class="reading-time flex items-center gap-1"><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>' . esc_html( $reading_time_text ) . '</span>';
        
        echo '</div>';
	}
endif;

if ( ! function_exists( 'authorpro_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function authorpro_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'authorpro' ),
			'<span class="author vcard"><a class="url fn n text-slate-900 hover:text-brand-600 transition font-semibold" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		$avatar = get_avatar( get_the_author_meta( 'ID' ), 32, '', '', array(
			'class' => 'h-10 w-10 rounded-full bg-slate-200 border-2 border-white shadow-sm'
		) );

		echo '<div class="flex items-center mt-6 pt-6 border-t border-slate-100">';
		echo $avatar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '<div class="ml-3">';
            echo '<p class="text-xs text-slate-500 uppercase tracking-wider font-bold mb-0.5">Written by</p>';
		    echo '<span class="text-sm font-medium text-slate-900"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '</div>';
		echo '</div>';
	}
endif;

if ( ! function_exists( 'authorpro_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * on single views.
	 */
	function authorpro_post_thumbnail( $size = 'medium_large', $class = '' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			// Fallback placeholder logic if desired, or return
			if ( ! has_post_thumbnail() ) {
				echo '<div class="w-full h-full bg-slate-50 flex items-center justify-center text-slate-300 rounded-2xl border border-slate-100 min-h-[200px]">';
				echo '<svg class="w-12 h-12 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>';
				echo '</div>';
			}
			return;
		}

		$wrapper_class = 'relative h-48 overflow-hidden bg-slate-100 ' . $class;
		
		echo '<div class="' . esc_attr( $wrapper_class ) . '">';
		
		if ( is_singular() ) :
			?>
			<div class="aspect-w-16 aspect-h-9 relative rounded-2xl overflow-hidden shadow-xl ring-1 ring-slate-900/5 mb-8">
				<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
			</div>
			<?php
		else :
			?>
			<a class="block w-full h-full group" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					$size,
					array(
						'alt'   => the_title_attribute(
							array(
								'echo' => false,
							)
						),
						'class' => 'w-full h-full object-cover transform group-hover:scale-105 transition duration-500',
					)
				);
				?>
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/5 transition-colors duration-300"></div>
			</a>
			<?php
		endif; // End is_singular().
		
		// Category Overlay
		if ( ! is_singular() ) {
			$categories = get_the_category();
			if ( ! empty( $categories ) ) {
				echo '<div class="absolute top-4 left-4 z-10">';
				echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="inline-flex items-center px-2.5 py-1 bg-white/95 backdrop-blur-sm text-brand-600 text-xs font-bold rounded shadow-sm uppercase tracking-wide hover:bg-white hover:shadow-md transition">' . esc_html( $categories[0]->name ) . '</a>';
				echo '</div>';
			}
		}

		echo '</div>';
	}
endif;

if ( ! function_exists( 'authorpro_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function authorpro_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
            
            echo '<div class="flex flex-wrap gap-2 items-center mt-6">';
            
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( '' );
			if ( $categories_list ) {
                // We need to strip the default comma separator and inject our classes
                // Simple regex to add classes to links
                $categories_list = str_replace('<a href="', '<a class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 hover:bg-indigo-100 transition" href="', $categories_list);
                $categories_list = str_replace('rel="category tag">', 'rel="category tag">', $categories_list);
                
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links flex flex-wrap gap-2">%1$s</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', '' ); // No separator
			if ( $tags_list ) {
                $tags_list = str_replace('<a href="', '<a class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-600 hover:bg-slate-200 transition" href="', $tags_list);
                
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links flex flex-wrap gap-2">%1$s</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
            
            echo '</div>';
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link block mt-4 text-sm">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'authorpro' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'authorpro' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link block mt-2 text-sm text-slate-400 hover:text-brand-600">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'authorpro_pagination' ) ) :
	/**
	 * Custom Pagination
	 */
	function authorpro_pagination() {

		global $wp_query;

		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		echo '<div class="flex gap-2 justify-center mt-16">';
		
		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>',
			'next_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
			'screen_reader_text' => __( 'Posts navigation', 'authorpro' ),
		) );

		echo '</div>';
	}

endif;

if ( ! function_exists( 'authorpro_comment_callback' ) ) :
	/**
	 * Custom comment callback to match the theme's design.
	 *
	 * @param object $comment The comment object.
	 * @param array  $args    Arguments.
	 * @param int    $depth   Depth.
	 */
	function authorpro_comment_callback( $comment, $args, $depth ) {
        // Prepare classes based on depth
        $wrapper_classes = 'flex gap-4';
        if ( $depth > 1 ) {
            $wrapper_classes .= ' mt-6 ml-4 md:ml-8 border-l-2 border-slate-100 pl-4 md:pl-6';
        }
        
        // Background color logic (Level 1 = slate-50, Level 2 = white, etc.)
        $bg_class = ( $depth % 2 != 0 ) ? 'bg-slate-50' : 'bg-white';
        // Border color logic (Level 1 = border-slate-100, Level 2 = border-brand-100... wait, 
        // Child 1 (L2) is border-brand-100. Child 2 (L2) is border-slate-100.)
        // Actually, let's look at HTML specific cases:
        // L1 (JD): border-slate-100 (Line 230)
        // L2 (Dev): border-brand-100 (Line 250) - Because it's Author?
        // L2 (Sarah): border-slate-100 (Line 273)
        // L3 (Dev): border-brand-100 (Line 298)
        
        // So Author comments get border-brand-100, others border-slate-100.
        $post = get_post();
        $is_author = ( $comment->user_id === $post->post_author );
        $border_class = $is_author ? 'border-brand-100' : 'border-slate-100';

        // Avatar Size
        $avatar_size = ( $depth > 1 ) ? 32 : 40; // 32px (w-8) vs 40px (w-10)
        $avatar_class_w = ( $depth > 1 ) ? 'w-8 h-8' : 'w-10 h-10';

		?>
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class( $wrapper_classes ); ?>>
			
            <div class="flex-shrink-0">
                <?php if ( 0 != $args['avatar_size'] ) : ?>
                    <div class="<?php echo esc_attr( $avatar_class_w ); ?> flex items-center justify-center bg-slate-200 rounded-full border border-white shadow-sm overflow-hidden">
                        <?php echo get_avatar( $comment, $avatar_size, '', '', array( 'class' => 'w-full h-full object-cover' ) ); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Content Wrapper: Remains OPEN until end_callback -->
			<div class="flex-1 w-full min-w-0">
				<div class="<?php echo esc_attr( $bg_class . ' ' . $border_class ); ?> p-4 md:p-5 rounded-xl rounded-tl-none border relative group shadow-sm transition-all hover:shadow-md">
					<div class="flex justify-between items-center mb-2 flex-wrap gap-2">
						<div>
							<span class="font-bold text-slate-900 text-sm block flex items-center gap-2">
								<?php echo get_comment_author_link(); ?>
								<?php if ( $is_author ) : ?>
									<span class="bg-brand-100 text-brand-700 text-[10px] px-1.5 py-0.5 rounded uppercase font-bold tracking-wide"><?php esc_html_e( 'Author', 'authorpro' ); ?></span>
								<?php endif; ?>
							</span>
							<span class="text-xs text-slate-400 block mt-0.5">
								<?php
									/* translators: 1: date, 2: time */
									printf(
										esc_html__( '%1$s at %2$s', 'authorpro' ),
										get_comment_date(),
										get_comment_time()
									);
								?>
							</span>
						</div>

                        <?php
                        comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before'    => '',
                                    'after'     => '',
                                    'class'     => 'text-xs text-brand-600 font-medium opacity-0 group-hover:opacity-100 transition focus:opacity-100', // Added focus for accessibility
                                    'reply_text'=> __( 'Reply', 'authorpro' ),
                                )
                            )
                        );
                        ?>
					</div>

					<div class="text-slate-600 text-sm leading-relaxed prose prose-sm max-w-none">
						<?php if ( '0' == $comment->comment_approved ) : ?>
							<p class="text-orange-500 mb-2"><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'authorpro' ); ?></em></p>
						<?php endif; ?>
						<?php comment_text(); ?>
					</div>
				</div>
		<?php
	}
endif;

if ( ! function_exists( 'authorpro_comment_end_callback' ) ) :
    /**
     * Ends the display of individual comment.
     *
     * @param object $comment The comment object.
     * @param array  $args    Arguments.
     * @param int    $depth   Depth.
     */
    function authorpro_comment_end_callback( $comment, $args, $depth ) {
        echo '</div>'; // Close .flex-1 content wrapper
        echo '</div>'; // Close main .flex wrapper
    }
endif;

/**
 * Recursive Breadcrumb System
 * Usage: authorpro_breadcrumb();
 */

function authorpro_breadcrumb() {

    echo '<nav class="flex flex-wrap justify-center text-sm text-slate-500 mb-6 space-x-2">';

    // Blog Home
    echo '<a href="' . esc_url( home_url( '/blog' ) ) . '" class="hover:text-brand-600">'
        . esc_html__( 'Blog', 'authorpro' ) .
    '</a>';
    echo '<span>/</span>';

    // =========================
    // Helper: Recursive Parents
    // =========================
    function authorpro_get_term_parents( $term, $taxonomy ) {
        $parents = [];

        while ( $term->parent != 0 ) {
            $term = get_term( $term->parent, $taxonomy );
            if ( ! is_wp_error( $term ) ) {
                $parents[] = $term;
            } else {
                break;
            }
        }

        return array_reverse( $parents );
    }

    // =========================
    // Single Post
    // =========================
    if ( is_single() && ! is_page() ) {

        $categories = get_the_category();

        if ( ! empty( $categories ) ) {

            // Primary category logic (SEO style)
            $cat = $categories[0];

            // Parents
            $parents = authorpro_get_term_parents( $cat, 'category' );

            foreach ( $parents as $parent ) {
                echo '<a href="' . esc_url( get_category_link( $parent->term_id ) ) . '" class="hover:text-brand-600">'
                    . esc_html( $parent->name ) .
                '</a><span>/</span>';
            }

            // Current Category
            echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" class="hover:text-brand-600">'
                . esc_html( $cat->name ) .
            '</a>';
        }
    }

    // =========================
    // Category Archive
    // =========================
    elseif ( is_category() ) {

        $term = get_queried_object();
        $parents = authorpro_get_term_parents( $term, 'category' );

        foreach ( $parents as $parent ) {
            echo '<a href="' . esc_url( get_category_link( $parent->term_id ) ) . '" class="hover:text-brand-600">'
                . esc_html( $parent->name ) .
            '</a><span>/</span>';
        }

        echo '<span class="font-medium text-slate-700">' . esc_html( single_cat_title( '', false ) ) . '</span>';
    }

    // =========================
    // Page
    // =========================
    elseif ( is_page() ) {

        global $post;

        if ( $post->post_parent ) {
            $parents = [];
            $parent_id = $post->post_parent;

            while ( $parent_id ) {
                $page = get_post( $parent_id );
                $parents[] = $page;
                $parent_id = $page->post_parent;
            }

            $parents = array_reverse( $parents );

            foreach ( $parents as $parent ) {
                echo '<a href="' . esc_url( get_permalink( $parent->ID ) ) . '" class="hover:text-brand-600">'
                    . esc_html( get_the_title( $parent->ID ) ) .
                '</a><span>/</span>';
            }
        }

        echo '<span class="font-medium text-slate-700">' . esc_html( get_the_title() ) . '</span>';
    }

    // =========================
    // CPT Single
    // =========================
    elseif ( is_singular() ) {

        $post_type = get_post_type_object( get_post_type() );

        if ( $post_type && ! is_wp_error( $post_type ) ) {
            echo '<span class="hover:text-brand-600">' . esc_html( $post_type->labels->singular_name ) . '</span>';
            echo '<span>/</span>';
        }

        echo '<span class="font-medium text-slate-700">' . esc_html( get_the_title() ) . '</span>';
    }

    // =========================
    // Search
    // =========================
    elseif ( is_search() ) {
        echo '<span class="font-medium text-slate-700">' . sprintf(
            esc_html__( 'Search results for "%s"', 'authorpro' ),
            esc_html( get_search_query() )
        ) . '</span>';
    }

    // =========================
    // 404
    // =========================
    elseif ( is_404() ) {
        echo '<span class="font-medium text-slate-700">' . esc_html__( '404 Not Found', 'authorpro' ) . '</span>';
    }

    echo '</nav>';
}