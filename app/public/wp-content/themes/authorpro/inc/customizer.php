<?php
/**
 * authorpro_starter Theme Customizer
 *
 * @package authorpro_starter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function authorpro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_image' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'authorpro_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'authorpro_customize_partial_blogdescription',
			)
		);
	}

	// Explicit toggles for Site Title and Tagline
	$wp_customize->add_setting( 'authorpro_display_title', array(
		'default'           => true,
		'sanitize_callback' => 'rest_sanitize_boolean',
	) );
	$wp_customize->add_control( 'authorpro_display_title', array(
		'label'   => esc_html__( 'Display Site Title', 'authorpro' ),
		'section' => 'title_tagline',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'authorpro_display_tagline', array(
		'default'           => true,
		'sanitize_callback' => 'rest_sanitize_boolean',
	) );
	$wp_customize->add_control( 'authorpro_display_tagline', array(
		'label'   => esc_html__( 'Display Tagline', 'authorpro' ),
		'section' => 'title_tagline',
		'type'    => 'checkbox',
	) );

	// Logo Layout
	$wp_customize->add_setting( 'authorpro_logo_layout', array(
		'default'           => 'inline',
		'sanitize_callback' => 'sanitize_key',
	) );
	$wp_customize->add_control( 'authorpro_logo_layout', array(
		'label'   => esc_html__( 'Logo & Text Layout', 'authorpro' ),
		'section' => 'title_tagline',
		'type'    => 'radio',
		'choices' => array(
			'inline'  => esc_html__( 'Logo Left, Text Right', 'authorpro' ),
			'stacked' => esc_html__( 'Logo Top, Text Bottom', 'authorpro' ),
		),
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'authorpro_site_identity',
			array(
				'selector' => '.site-identity-wrapper',
				'settings' => array( 'authorpro_display_title', 'authorpro_display_tagline', 'authorpro_logo_layout' ),
			)
		);
	}

	// Remove default core controls for Site Title & Tagline visibility
	$wp_customize->remove_setting( 'display_header_text' );
	$wp_customize->remove_control( 'display_header_text' );
	
	$wp_customize->remove_setting( 'header_text' );
	$wp_customize->remove_control( 'header_text' );

	// Remove Default Colors
	$wp_customize->remove_control( 'header_textcolor' );


	// Primary Brand Color (Tailwind brand-600)
	$wp_customize->add_setting( 'authorpro_color_brand_600', array(
		'default'           => '#ea580c',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'authorpro_color_brand_600', array(
		'label'   => esc_html__( 'Primary Brand Color', 'authorpro' ),
		'section' => 'colors',
	) ) );

	// Brand Hover Color (Tailwind brand-700)
	$wp_customize->add_setting( 'authorpro_color_brand_700', array(
		'default'           => '#c2410c',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'authorpro_color_brand_700', array(
		'label'   => esc_html__( 'Brand Hover Color', 'authorpro' ),
		'section' => 'colors',
	) ) );

	// Heading Color (Tailwind slate-900)
	$wp_customize->add_setting( 'authorpro_color_slate_900', array(
		'default'           => '#0f172a',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'authorpro_color_slate_900', array(
		'label'   => esc_html__( 'Headings & Dark Text Color', 'authorpro' ),
		'section' => 'colors',
	) ) );

	// Text Color (Tailwind slate-600)
	$wp_customize->add_setting( 'authorpro_color_slate_600', array(
		'default'           => '#475569',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'authorpro_color_slate_600', array(
		'label'   => esc_html__( 'Body Text Color', 'authorpro' ),
		'section' => 'colors',
	) ) );

	// Typography Section
	$wp_customize->add_section( 'typography', array(
		'title'       => esc_html__( 'Typography', 'authorpro' ),
		'description' => esc_html__( 'Typography settings for the theme.', 'authorpro' ),
		'priority'    => 40,
	) );

	$font_choices = array(
		'Inter'             => 'Inter (Sans-serif)',
		'Libre Baskerville' => 'Libre Baskerville (Serif)',
	);

	// Update Heading Font Control
	$wp_customize->add_setting( 'authorpro_font_heading', array(
		'default'           => 'Libre Baskerville',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'authorpro_font_heading', array(
		'label'   => esc_html__( 'Heading Font', 'authorpro' ),
		'section' => 'typography',
		'type'    => 'select',
		'choices' => $font_choices,
	) );

	// Update Body Font Control
	$wp_customize->add_setting( 'authorpro_font_body', array(
		'default'           => 'Inter',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'authorpro_font_body', array(
		'label'   => esc_html__( 'Body Font', 'authorpro' ),
		'section' => 'typography',
		'type'    => 'select',
		'choices' => $font_choices,
	) );

    // Require Theme Options
    // require get_template_directory() . '/inc/theme-options/colors.php';
    // require get_template_directory() . '/inc/theme-options/typography.php';

    // =========================================
    // Theme Options Panel
    // =========================================
    $wp_customize->add_panel( 'authorpro_theme_options_panel', array(
        'priority'       => 30,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => esc_html__( 'Theme Options', 'authorpro' ),
        'description'    => esc_html__( 'Global theme options and settings.', 'authorpro' ),
    ) );

    // Header Section
    $wp_customize->add_section( 'authorpro_header_section', array(
        'title'    => esc_html__( 'Header', 'authorpro' ),
        'panel'    => 'authorpro_theme_options_panel',
        'priority' => 10,
    ) );

    // Show/Hide Search Icon
    $wp_customize->add_setting( 'header_show_search', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'header_show_search', array(
        'label'   => esc_html__( 'Show Search Icon', 'authorpro' ),
        'section' => 'authorpro_header_section',
        'type'    => 'checkbox',
    ) );

    // Show/Hide Cart Icon
    $wp_customize->add_setting( 'header_show_cart', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'header_show_cart', array(
        'label'   => esc_html__( 'Show Cart Icon', 'authorpro' ),
        'section' => 'authorpro_header_section',
        'type'    => 'checkbox',
    ) );

    // Sidebar & Columns Section
    $wp_customize->add_section( 'authorpro_sidebar_column_section', array(
        'title'    => esc_html__( 'Sidebar & Columns', 'authorpro' ),
        'panel'    => 'authorpro_theme_options_panel',
        'priority' => 20,
    ) );

    // Show/Hide Blog Sidebar
    $wp_customize->add_setting( 'authorpro_blog_sidebar', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ) );
    $wp_customize->add_control( 'authorpro_blog_sidebar', array(
        'label'       => esc_html__( 'Enable Blog Sidebar', 'authorpro' ),
        'description' => esc_html__( 'Shows sidebar on blog, archive, and search pages.', 'authorpro' ),
        'section'     => 'authorpro_sidebar_column_section',
        'type'        => 'checkbox',
    ) );

    // Blog Grid Columns
    $wp_customize->add_setting( 'authorpro_blog_columns', array(
        'default'           => '3',
        'sanitize_callback' => 'sanitize_key',
    ) );
    $wp_customize->add_control( 'authorpro_blog_columns', array(
        'label'   => esc_html__( 'Post Grid Columns', 'authorpro' ),
        'section' => 'authorpro_sidebar_column_section',
        'type'    => 'select',
        'choices' => array(
            '1' => esc_html__( '1 Column', 'authorpro' ),
            '2' => esc_html__( '2 Columns', 'authorpro' ),
            '3' => esc_html__( '3 Columns', 'authorpro' ),
            '4' => esc_html__( '4 Columns', 'authorpro' ),
        ),
    ) );
}
add_action( 'customize_register', 'authorpro_customize_register', 99 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function authorpro_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function authorpro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function authorpro_customize_preview_js() {
	wp_enqueue_script( 'rswp-starter-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'authorpro_customize_preview_js' );

/**
 * Bridge Customizer settings to theme.json
 * Intercepts theme.json configuration and dynamically injects Customizer values,
 * eliminating the need to print CSS Custom Properties to the DOM.
 *
 * @param WP_Theme_JSON_Data $theme_json The theme JSON data object.
 * @return WP_Theme_JSON_Data
 */
function authorpro_theme_json_customizer_bridge( $theme_json ) {
	$data = array(
		'version'  => 2,
		'settings' => array(
			'color' => array(
				'palette' => array(
					array(
						'slug'  => 'brand-600',
						'color' => get_theme_mod( 'authorpro_color_brand_600', '#ea580c' ),
					),
					array(
						'slug'  => 'brand-700',
						'color' => get_theme_mod( 'authorpro_color_brand_700', '#c2410c' ),
					),
					array(
						'slug'  => 'slate-900',
						'color' => get_theme_mod( 'authorpro_color_slate_900', '#0f172a' ),
					),
					array(
						'slug'  => 'slate-600',
						'color' => get_theme_mod( 'authorpro_color_slate_600', '#475569' ),
					),
				),
			),
			'typography' => array(
				'fontFamilies' => array(
					array(
						'slug'       => 'heading',
						'fontFamily' => get_theme_mod( 'authorpro_font_heading', 'Inter' ) . ', sans-serif',
					),
					array(
						'slug'       => 'sans',
						'fontFamily' => get_theme_mod( 'authorpro_font_body', 'Inter' ) . ', sans-serif',
					),
				),
			),
		),
	);

	return $theme_json->update_with( $data );
}
add_filter( 'wp_theme_json_data_theme', 'authorpro_theme_json_customizer_bridge' );



/**
 * Output CSS Variables
 */
function authorpro_customizer_css() {
	?>
	<style type="text/css">
		:root, .editor-styles-wrapper {
			/* Dynamic Theme Colors */
			--color-brand-600: <?php echo esc_attr( get_theme_mod( 'authorpro_color_brand_600', '#dc2626' ) ); ?>;
			--color-brand-700: <?php echo esc_attr( get_theme_mod( 'authorpro_color_brand_700', '#b91c1c' ) ); ?>;
			--color-slate-900: <?php echo esc_attr( get_theme_mod( 'authorpro_color_slate_900', '#0f172a' ) ); ?>;
			--color-slate-600: <?php echo esc_attr( get_theme_mod( 'authorpro_color_slate_600', '#475569' ) ); ?>;
			--font-heading: <?php echo esc_attr( get_theme_mod( 'authorpro_font_heading', 'Inter' ) ); ?>, sans-serif;
			--font-body: <?php echo esc_attr( get_theme_mod( 'authorpro_font_body', 'Inter' ) ); ?>, sans-serif;
		}
	</style>
	<?php
}
// Add this action if it is missing
if ( ! has_action( 'wp_head', 'authorpro_customizer_css' ) ) {
	add_action( 'wp_head', 'authorpro_customizer_css' );
}
