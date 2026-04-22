<?php
/**
 * Theme Functions
 */
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function authorpro_theme_setup() {
    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on author theme, use a find and replace
    * to change 'author-theme' to the name of your theme in all the template files.
    */
	load_theme_textdomain( 'authorpro', get_template_directory() . '/languages' );

    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'align-wide' );
    add_theme_support('wp-block-styles');
    add_theme_support('woocommerce');
    add_theme_support( 'block-template-parts' );
    // Add support for editor styles.
    add_theme_support( 'editor-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support('align-wide');

    // Add HTML5 support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Register Navigation Menus
    register_nav_menus( array(
        'primary'      => __( 'Primary Menu', 'authorpro' ),
        'docs_sidebar' => __( 'Documentation Sidebar', 'authorpro' ),
    ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
    // Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'authorpro_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

    $home_content = '';
    $template_path = get_template_directory() . '/starter-template.php';

    if ( file_exists( $template_path ) ) {
        ob_start();
        require $template_path;
        $home_content = ob_get_clean();
    }
    // Starter Content
    add_theme_support( 'starter-content', array(

        'options' => array(
            'show_on_front'  => 'page',
            'page_on_front'  => '{{home}}',
        ),

        'posts' => array(
            'home' => array(
                'post_type'    => 'page',
                'post_title'   => __( 'Home', 'authorpro' ),
                'post_content' => $home_content,
                'template'     => 'fullwidth.php',
            ),

            'blog' => array(
                'post_type'  => 'page',
                'post_title' => __( 'Blog', 'authorpro' ),
            ),
        ),

    ) );

}
add_action( 'after_setup_theme', 'authorpro_theme_setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function authorpro_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'authorpro' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'authorpro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s bg-white p-6 mb-8 rounded-xl border border-slate-200 shadow-sm">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title text-lg font-bold text-slate-900 mb-4 pb-2 border-b border-slate-100">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Sidebar', 'authorpro' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', 'authorpro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s bg-white p-6 rounded-xl border border-slate-200 shadow-sm">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title text-lg font-bold text-slate-900 mb-4 pb-2 border-b border-slate-100">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'authorpro' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here for the footer column.', 'authorpro' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s space-y-4 mb-8">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'authorpro' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here for the footer column.', 'authorpro' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s space-y-4 mb-8">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'authorpro' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here for the footer column.', 'authorpro' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s space-y-4 mb-8">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 4', 'authorpro' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here for the footer column.', 'authorpro' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s space-y-4 mb-8">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'authorpro_widgets_init' );



/**
 * Enqueue Frontend Scripts & Styles
 */
function authorpro_enqueue_scripts() {

    // Theme Styles
    wp_enqueue_style( 'authorpro-style', get_stylesheet_uri() );

    // Get Auto-generated Asset file for Dynamic Versioning (Cache Busting)
    $asset_path = get_theme_file_path( 'build/index.asset.php' );
    $asset_file = file_exists( $asset_path ) ? include $asset_path : array( 'dependencies' => array(), 'version' => '1.0.0' );

    // Main Tailwind CSS
    wp_enqueue_style( 'authorpro-theme-style', get_theme_file_uri('build/style-index.css'), array(), '1.0.4' );


    // Main JS (Mobile Menu, Modals)
    wp_enqueue_script( 'authorpro-script', get_theme_file_uri('build/index.js'), $asset_file['dependencies'], $asset_file['version'], true );

    // Dequeue unwanted styles
    // wp_dequeue_style( 'rswpbs-grid' );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'authorpro_enqueue_scripts' );

/**
 * Enqueue Gutenberg Editor Assets
 */
function authorpro_block_editor_assets() {

    global $pagenow;
    if ( 'customize.php' === $pagenow ) {
        return;
    }

    wp_enqueue_style( 'authorpro-editor-styles', get_theme_file_uri( 'build/editor.css' ), array(), '5.1' );

    $heading_font = get_theme_mod( 'authorpro_font_heading', 'Inter' );
    $body_font    = get_theme_mod( 'authorpro_font_body', 'Inter' );

    $custom_css = "
        :root, body, .editor-styles-wrapper {
            --font-body: \"{$body_font}\", sans-serif;
            --font-heading: \"{$heading_font}\", sans-serif;
            --wp--preset--font-family--body: \"{$body_font}\", sans-serif;
            --wp--preset--font-family--heading: \"{$heading_font}\", sans-serif;
        }
        body {
            font-family: var(--font-body);
        }
        h1, h2, h3, h4, h5, h6, .wp-block-heading {
            font-family: var(--font-heading);
        }
    ";

    wp_add_inline_style( 'authorpro-editor-styles', $custom_css );
}
add_action( 'enqueue_block_editor_assets', 'authorpro_block_editor_assets' );

// Filter to add tailwind classes to standard menu (Basic)
function authorpro_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'primary') {
        $classes[] = 'text-slate-600 hover:text-brand-600 font-medium transition';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'authorpro_menu_classes', 10, 3);


add_filter( 'woocommerce_add_to_cart_fragments', 'authorpro_woo_cart_fragments' );
function authorpro_woo_cart_fragments( $fragments ) {
    if ( ! function_exists( 'WC' ) || ! isset( WC()->cart ) || ! WC()->cart ) {
        return $fragments;
    }

    ob_start();
    ?>
    <span class="authorprocart-count absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[10px] font-bold leading-none text-white bg-brand-600 rounded-full transform translate-x-1 -translate-y-1">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['span.authorprocart-count'] = ob_get_clean();

    return $fragments;
}

/**
 * Custom WooCommerce Cart Redesign
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woo-design.php';
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icon Helpers
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Header Helpers
 */
require get_template_directory() . '/inc/header-helpers.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Go Pro
 */
require get_template_directory() . '/inc/customizer/go-pro/class-customize.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Register Custom Block Styles & Patterns
 */
function authorpro_block_features() {
    // Register a custom block style for buttons
    if ( function_exists( 'register_block_style' ) ) {
        register_block_style( 'core/button', array(
            'name'       => 'authorpro-primary',
            'label'      => __( 'AuthorPro Primary', 'authorpro' ),
            'is_default' => false,
        ) );
        register_block_style( 'core/button', array(
            'name'       => 'authorpro-outline',
            'label'      => __( 'AuthorPro Outline', 'authorpro' ),
            'is_default' => false,
        ) );
    }

    // Register block pattern categories
    if ( function_exists( 'register_block_pattern_category' ) ) {
        $block_pattern_categories = array(
            'authorpro-patterns'  => __( 'AuthorPro Patterns', 'authorpro' ),
        );

        foreach ( $block_pattern_categories as $name => $label ) {
            register_block_pattern_category(
                $name,
                array( 'label' => $label )
            );
        }
    }
}
add_action( 'init', 'authorpro_block_features' );