<?php
/**
 * @package Freelancer Plus
 */
?>

<?php
    $freelancer_plus_post_date = get_the_date();
    $freelancer_plus_year = get_the_date('Y');
    $freelancer_plus_month = get_the_date('m');

    $freelancer_plus_author_id = get_the_author_meta('ID');
    $freelancer_plus_author_link = esc_url(get_author_posts_url($freelancer_plus_author_id));
    $freelancer_plus_author_name = get_the_author();

    $freelancer_plus_blog_post_thumb =  get_theme_mod( 'freelancer_plus_blog_post_thumb', 1 );

    $freelancer_plus_show_date     = get_theme_mod('freelancer_plus_metafields_date', true);
    $freelancer_plus_show_comments = get_theme_mod('freelancer_plus_metafields_comments', true);
    $freelancer_plus_show_author   = get_theme_mod('freelancer_plus_metafields_author', true);
    $freelancer_plus_show_time     = get_theme_mod('freelancer_plus_metafields_time', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="listarticle">
        <?php if ($freelancer_plus_blog_post_thumb == 1 ) {?> 
        	<?php if (has_post_thumbnail() ){ ?>
                <div class="post-thumb">
                   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
    	    <?php } ?>
        <?php } ?>
        <header class="entry-header">
            <h2 class="single_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ('post' == get_post_type()) : ?>
                <?php if ( $freelancer_plus_show_date || $freelancer_plus_show_comments || $freelancer_plus_show_author || $freelancer_plus_show_time ) : ?>
                    <div class="postmeta">
                        <?php if ($freelancer_plus_show_date) : ?>
                            <div class="post-date">
                                <a href="<?php echo esc_url(get_month_link($freelancer_plus_year, $freelancer_plus_month)); ?>">
                            <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($freelancer_plus_post_date); ?>
                                    <span class="screen-reader-text"><?php echo esc_html($freelancer_plus_post_date); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>  
                        <?php if ($freelancer_plus_show_comments) : ?>  
                            <div class="post-comment">&nbsp; &nbsp;
                                <a href="<?php echo esc_url(get_comments_link()); ?>">
                                <span><?php echo esc_html(get_theme_mod('freelancer_plus_metabox_seperator', '|'));?></span><i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                                    <span class="screen-reader-text"><?php comments_number(); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($freelancer_plus_show_author) : ?>
                            <div class="post-author">&nbsp; &nbsp;
                                <a href="<?php echo $freelancer_plus_author_link; ?>">
                                <span><?php echo esc_html(get_theme_mod('freelancer_plus_metabox_seperator', '|'));?></span><i class="fas fa-user"></i> &nbsp; <?php echo esc_html($freelancer_plus_author_name); ?>
                                    <span class="screen-reader-text"><?php echo esc_html($freelancer_plus_author_name); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($freelancer_plus_show_time) : ?>
                            <div class="post-time">&nbsp; &nbsp;
                                <a href="#">
                                <span><?php echo esc_html(get_theme_mod('freelancer_plus_metabox_seperator', '|'));?></span><i class="fas fa-clock"></i> &nbsp; <?php echo esc_html(get_the_time()); ?>
                                    <span class="screen-reader-text"><?php echo esc_html(get_the_time()); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </header>
        <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
           	<?php if(get_theme_mod('freelancer_plus_blog_post_description_option') == 'Full Content'){ ?>
                <div class="entry-content"><?php
                    $content = get_the_content(); ?>
                    <p><?php echo wpautop($content); ?></p>  
                </div>
             <?php }
            if(get_theme_mod('freelancer_plus_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                    <div class="entry-content"> 
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html($excerpt); ?></p>
                    </div>
                <?php }?>
            <?php }?>  
            <div class="pagemore" >
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','freelancer-plus'); ?></a>
            </div>
        </div>
        <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'freelancer-plus' ) ); ?>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'freelancer-plus' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div>
        <?php endif; ?>
        <div class="clear"></div>    
    </div>
</article>