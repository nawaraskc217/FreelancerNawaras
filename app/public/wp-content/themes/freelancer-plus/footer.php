<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Freelancer Plus
 */
?>
<div id="footer">
    <?php 
    $freelancer_plus_footer_widget_enabled = get_theme_mod('freelancer_plus_footer_widget', true);      
    if ($freelancer_plus_footer_widget_enabled !== false && $freelancer_plus_footer_widget_enabled !== '') { ?>

    <?php 
        $freelancer_plus_widget_areas = get_theme_mod('freelancer_plus_footer_widget_areas', '4');
        if ($freelancer_plus_widget_areas == '3') {
            $freelancer_plus_cols = 'col-lg-4 col-md-6';
        } elseif ($freelancer_plus_widget_areas == '4') {
            $freelancer_plus_cols = 'col-lg-3 col-md-6';
        } elseif ($freelancer_plus_widget_areas == '2') {
            $freelancer_plus_cols = 'col-lg-6 col-md-6';
        } else {
            $freelancer_plus_cols = 'col-lg-12 col-md-12';
        }
    ?>

    <div class="footer-widget">
        <div class="container">
        <div class="row">
            <!-- Footer 1 -->
            <div class="<?php echo esc_attr($freelancer_plus_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else : ?>
                    <aside id="categories" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer1', 'freelancer-plus'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Categories', 'freelancer-plus'); ?></h3>
                        <ul>
                            <?php wp_list_categories('title_li='); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 2 -->
            <div class="<?php echo esc_attr($freelancer_plus_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else : ?>
                    <aside id="archives" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer2', 'freelancer-plus'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Archives', 'freelancer-plus'); ?></h3>
                        <ul>
                            <?php wp_get_archives(array('type' => 'monthly')); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 3 -->
            <div class="<?php echo esc_attr($freelancer_plus_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <aside id="meta" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer3', 'freelancer-plus'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Meta', 'freelancer-plus'); ?></h3>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>
                <?php endif; ?>
            </div>

            <!-- Footer 4 -->
            <div class="<?php echo esc_attr($freelancer_plus_cols); ?> footer-block">
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <?php dynamic_sidebar('footer-4'); ?>
                <?php else : ?>
                    <aside id="search-widget" class="widget pb-3" role="complementary" aria-label="<?php esc_attr_e('footer4', 'freelancer-plus'); ?>">
                        <h3 class="widget-title"><?php esc_html_e('Search', 'freelancer-plus'); ?></h3>
                        <?php the_widget('WP_Widget_Search'); ?>
                    </aside>
                <?php endif; ?>
            </div>
        </div>
        </div>
    </div>

    <?php } ?>
    <div class="clear"></div>

  <div class="copywrap text-center">
    <div class="container">
      <p><a href="<?php echo esc_html(get_theme_mod('freelancer_plus_copyright_link',__('https://www.theclassictemplates.com/products/free-freelancer-wordpress-theme','freelancer-plus'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('freelancer_plus_copyright_line',__('© 2026 Nawaras K.C','freelancer-plus'))); ?></a> <?php echo esc_html('By Classic Templates','freelancer-plus'); ?></p>
    </div>
  </div>
</div>

<?php if(get_theme_mod('freelancer_plus_scroll_hide',true)){ ?>
 <a id="button"><?php echo esc_html( get_theme_mod('freelancer_plus_scroll_text',__('TOP', 'freelancer-plus' )) ); ?></a>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>