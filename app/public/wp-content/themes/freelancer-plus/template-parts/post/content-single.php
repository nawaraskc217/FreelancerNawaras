<?php
/**
 * @package Freelancer Plus
 */
?>

<?php
    $freelancer_plus_post_date = get_the_date();
    
    $freelancer_plus_author_name = get_the_author();

    $freelancer_plus_single_post_show_date     = get_theme_mod('freelancer_plus_single_post_date', true);
    $freelancer_plus_single_post_show_comments = get_theme_mod('freelancer_plus_single_post_comment', true);
    $freelancer_plus_single_post_show_author   = get_theme_mod('freelancer_plus_single_post_author', true);
    $freelancer_plus_single_post_show_time     = get_theme_mod('freelancer_plus_single_post_time', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
    <?php if (has_post_thumbnail() ){ ?>
        <div class="post-thumb">
           <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>
    <?php if ('post' == get_post_type()) : ?>
        <?php if ( $freelancer_plus_single_post_show_date || $freelancer_plus_single_post_show_comments || $freelancer_plus_single_post_show_author || $freelancer_plus_single_post_show_time ) : ?>
            <div class="postmeta">
                <?php if ($freelancer_plus_single_post_show_date) : ?>
                <div class="post-date">
                    <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($freelancer_plus_post_date); ?>
                </div>
                <?php endif; ?>
                <?php if ($freelancer_plus_single_post_show_comments) : ?>
                <div class="post-comment">&nbsp; &nbsp;
                    <span><?php echo esc_html(get_theme_mod('freelancer_plus_single_post_metabox_seperator', '|'));?></span>
                    <i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                </div>
                <?php endif; ?>
                <?php if ($freelancer_plus_single_post_show_author) : ?>
                    <div class="post-author">&nbsp; &nbsp;
                        <span><?php echo esc_html(get_theme_mod('freelancer_plus_single_post_metabox_seperator', '|'));?></span>
                        <i class="fas fa-user"></i> &nbsp; <?php echo esc_html($freelancer_plus_author_name); ?>
                    </div>
                <?php endif; ?>
                <?php if ($freelancer_plus_single_post_show_time) : ?>
                    <div class="post-time">&nbsp; &nbsp;
                        <span><?php echo esc_html(get_theme_mod('freelancer_plus_single_post_metabox_seperator', '|'));?></span>
                        <i class="fas fa-clock"></i> &nbsp; <?php echo get_the_time(); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'freelancer-plus' ),
                'after'  => '</div>',
            ) );
        ?>
        <?php the_tags(); ?>
    </div>
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'freelancer-plus' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>