<?php
/**
 * Freelancer Plus functions and definitions
 *
 * @package Freelancer Plus
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'freelancer_plus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function freelancer_plus_setup() {
	global $freelancer_plus_content_width;
	if ( ! isset( $freelancer_plus_content_width ) )
		$freelancer_plus_content_width = 680;

	load_theme_textdomain( 'freelancer-plus', get_template_directory() . '/languages' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'freelancer-plus' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );

	global $pagenow;

    if ( is_admin() && 'themes.php' === $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
        add_action('admin_notices', 'freelancer_plus_deprecated_hook_admin_notice');
    }
}
endif; // freelancer_plus_setup
add_action( 'after_setup_theme', 'freelancer_plus_setup' );

function freelancer_plus_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function freelancer_plus_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'freelancer-plus' ),
		'description'   => __( 'Appears on blog page sidebar', 'freelancer-plus' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'freelancer-plus' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'freelancer-plus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'freelancer-plus' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'freelancer-plus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'freelancer-plus' ),
		'description'   => __( 'Appears on shop page', 'freelancer-plus' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar(array(
        'name'          => __('Single Product Sidebar', 'freelancer-plus'),
        'description'   => __('Sidebar for single product pages', 'freelancer-plus'),
		'id'            => 'woocommerce-single-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));	

	$freelancer_plus_widget_areas = get_theme_mod('freelancer_plus_footer_widget_areas', '4');
	for ($freelancer_plus_i=1; $freelancer_plus_i<=$freelancer_plus_widget_areas; $freelancer_plus_i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'freelancer-plus' ) . $freelancer_plus_i,
			'id'            => 'footer-' . $freelancer_plus_i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'freelancer_plus_widgets_init' );

// Change number of products per row to 4
add_filter('loop_shop_columns', 'freelancer_plus_loop_columns');
if (!function_exists('freelancer_plus_loop_columns')) {
    function freelancer_plus_loop_columns() {
        $colm = get_theme_mod('freelancer_plus_products_per_row', 4); // Default to 4 if not set
        return $colm;
    }
}

// Use the customizer setting to set the number of products per page
function freelancer_plus_products_per_page($cols) {
    $cols = get_theme_mod('freelancer_plus_products_per_page', 9); // Default to 9 if not set
    return $cols;
}
add_filter('loop_shop_per_page', 'freelancer_plus_products_per_page', 9);

function freelancer_plus_scripts() {

	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'freelancer-plus-basic-style', get_stylesheet_uri() );
	wp_style_add_data('freelancer-plus-basic-style', 'rtl', 'replace');

	wp_enqueue_style( 'freelancer-plus-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'freelancer-plus-default', esc_url(get_template_directory_uri())."/css/default.css" );
	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'freelancer-plus-basic-style',$freelancer_plus_color_scheme_css );
	
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'freelancer-plus-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font-family
	$freelancer_plus_headings_font = esc_html(get_theme_mod('freelancer_plus_headings_fonts'));
	$freelancer_plus_body_font = esc_html(get_theme_mod('freelancer_plus_body_fonts'));

	if ($freelancer_plus_headings_font) {
	    wp_enqueue_style('freelancer-plus-headings-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($freelancer_plus_headings_font));
	} else {
	    wp_enqueue_style('poppins-headings', 'https://fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}

	if ($freelancer_plus_body_font) {
	    wp_enqueue_style('freelancer-plus-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($freelancer_plus_body_font));
	} else {
	    wp_enqueue_style('poppins-body', 'https://fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}

}
add_action( 'wp_enqueue_scripts', 'freelancer_plus_scripts' );

require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

// select
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';

/**
 * Load TGM.
 */
require get_template_directory() . '/inc/tgm/tgm.php';

function freelancer_plus_setup_theme() {
	if ( ! defined( 'FREELANCER_PLUS_THEME_PAGE' ) ) {
	define('FREELANCER_PLUS_THEME_PAGE',__('https://www.theclassictemplates.com/collections/best-wordpress-templates','freelancer-plus'));
	}
	if ( ! defined( 'FREELANCER_PLUS_SUPPORT' ) ) {
	define('FREELANCER_PLUS_SUPPORT',__('https://wordpress.org/support/theme/freelancer-plus','freelancer-plus'));
	}
	if ( ! defined( 'FREELANCER_PLUS_REVIEW' ) ) {
	define('FREELANCER_PLUS_REVIEW',__('https://wordpress.org/support/theme/freelancer-plus/reviews/','freelancer-plus'));
	}
	if ( ! defined( 'FREELANCER_PLUS_PRO_DEMO' ) ) {
	define('FREELANCER_PLUS_PRO_DEMO',__('https://live.theclassictemplates.com/demo/freelancer-plus','freelancer-plus'));
	}
	if ( ! defined( 'FREELANCER_PLUS_PREMIUM_PAGE' ) ) {
	define('FREELANCER_PLUS_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/freelancer-wordpress-theme','freelancer-plus'));
	}
	if ( ! defined( 'FREELANCER_PLUS_THEME_DOCUMENTATION' ) ) {
	define('FREELANCER_PLUS_THEME_DOCUMENTATION',__('https://live.theclassictemplates.com/demo/docs/freelancer-plus-free/','freelancer-plus'));
	}
	if ( ! defined( 'FREELANCER_PLUS_BUNDLE_PAGE' ) ) {
		define('FREELANCER_PLUS_BUNDLE_PAGE',__('https://www.theclassictemplates.com/products/wordpress-theme-bundle','freelancer-plus'));
	}
}
add_action( 'after_setup_theme', 'freelancer_plus_setup_theme' );

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));


if ( ! function_exists( 'freelancer_plus_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function freelancer_plus_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/* Activation Notice */
function freelancer_plus_deprecated_hook_admin_notice() {
    $freelancer_plus_theme = wp_get_theme();
    $freelancer_plus_dismissed = get_user_meta( get_current_user_id(), 'freelancer_plus_dismissable_notice', true );
    if ( !$freelancer_plus_dismissed) { ?>
        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
            <div class="admin-image">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
            </div>
            <div class="admin-content" >
                <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'freelancer-plus' ), esc_html($freelancer_plus_theme->get( 'Name' )), esc_html($freelancer_plus_theme->get( 'Version' ))); ?>
                </h1>
                <p><?php _e('Get Started With Theme By Clicking On Getting Started.', 'freelancer-plus'); ?></p>
                <div style="display: grid;">
                    <a class="admin-notice-btn button button-hero upgrade-pro" target="_blank" href="<?php echo esc_url( FREELANCER_PLUS_PREMIUM_PAGE ); ?>"><?php esc_html_e('Upgrade Pro', 'freelancer-plus') ?><i class="dashicons dashicons-cart"></i></a>
                    <a class="admin-notice-btn button button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=freelancer-plus' )); ?>"><?php esc_html_e( 'Get started', 'freelancer-plus' ) ?><i class="dashicons dashicons-backup"></i></a>
                    <a class="admin-notice-btn button button-hero" target="_blank" href="<?php echo esc_url( FREELANCER_PLUS_THEME_DOCUMENTATION ); ?>"><?php esc_html_e('Free Doc', 'freelancer-plus') ?><i class="dashicons dashicons-visibility"></i></a>
                    <a  class="admin-notice-btn button button-hero" target="_blank" href="<?php echo esc_url( FREELANCER_PLUS_PRO_DEMO ); ?>"><?php esc_html_e('View Demo', 'freelancer-plus') ?><i class="dashicons dashicons-awards"></i></a>
                </div>
            </div>
        </div>
    <?php }
}