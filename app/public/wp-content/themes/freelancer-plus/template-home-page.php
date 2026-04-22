<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Freelancer Plus
 */

get_header(); ?>

<div id="content">
  <?php
    $freelancer_plus_hidcatslide = get_theme_mod('freelancer_plus_hide_categorysec', true);
    $freelancer_plus_slidersection = get_theme_mod('freelancer_plus_slidersection');

    if ($freelancer_plus_hidcatslide && $freelancer_plus_slidersection) { ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('freelancer_plus_slidersection',false) ) { ?>
          <?php $freelancer_plus_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('freelancer_plus_slidersection',false)));
            while( $freelancer_plus_queryvar->have_posts() ) : $freelancer_plus_queryvar->the_post(); ?>
              <div class="slidesection">
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail('full');
                  } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slider.png" alt="<?php echo esc_attr( 'slider', 'freelancer-plus'); ?>"/>
                <?php } ?>
                <div class="slider-box">
                  <h1><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h1>
                  <?php
                    $freelancer_plus_trimexcerpt = get_the_excerpt();
                    $freelancer_plus_shortexcerpt = wp_trim_words( $freelancer_plus_trimexcerpt, $freelancer_plus_num_words = 15 );
                    echo '<p class="mt-4">' . esc_html( $freelancer_plus_shortexcerpt ) . '</p>';
                  ?>
                  <div class="slide-btn mt-5">
                    <?php 
                    $freelancer_plus_button_text = get_theme_mod('freelancer_plus_button_text', 'Contact');
                    $freelancer_plus_button_link_slider = get_theme_mod('freelancer_plus_button_link_slider', ''); 
                    if (empty($freelancer_plus_button_link_slider)) {
                        $freelancer_plus_button_link_slider = get_permalink();
                    }
                    if ($freelancer_plus_button_text || !empty($freelancer_plus_button_link_slider)) { ?>
                      <?php if(get_theme_mod('freelancer_plus_button_text','Contact') != ''){ ?>
                        <a href="<?php echo esc_url($freelancer_plus_button_link_slider); ?>">
                          <?php echo esc_html($freelancer_plus_button_text); ?>
                            <span class="screen-reader-text"><?php echo esc_html($freelancer_plus_button_text); ?></span><i class="fas fa-long-arrow-alt-right ms-2"></i>
                        </a>
                      <?php } ?>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <?php
    $freelancer_plus_hidepageboxes = get_theme_mod('freelancer_plus_disabled_pgboxes', true);
    $freelancer_plus_services_cat = get_theme_mod('freelancer_plus_services_cat');
    if( $freelancer_plus_hidepageboxes && $freelancer_plus_services_cat){
  ?>
  <section id="serives_box" class="py-4">
    <div class="container">
      <?php if( get_theme_mod('freelancer_plus_main_title') != '' ){ ?>
        <h2 class="text-center mb-2"><?php echo esc_html(get_theme_mod('freelancer_plus_main_title','')); ?></h2>
      <?php }?>
      <div class="mt-5">
        <div class="row">
          <?php if( get_theme_mod('freelancer_plus_services_cat',false) ) { ?>
            <?php $freelancer_plus_queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('freelancer_plus_services_cat',false)));
              while( $freelancer_plus_queryvar->have_posts() ) : $freelancer_plus_queryvar->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                  <div class="services_inner_box text-center p-4">
                    <?php the_post_thumbnail( 'full' ); ?>
                    <h3 class="pt-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php
                      $freelancer_plus_trimexcerpt = get_the_excerpt();
                      $freelancer_plus_shortexcerpt = wp_trim_words( $freelancer_plus_trimexcerpt, $freelancer_plus_num_words = 15 );
                      echo '<p class="mb-3">' . esc_html( $freelancer_plus_shortexcerpt ) . '</p>';
                    ?>
                  </div>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
            <?php } ?>
          <?php }?>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>
