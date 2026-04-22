<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'authorpro' ); ?>>
    <?php
    $innerbody_classes = 'innerbody text-slate-800 antialiased font-sans';
    if ( ! authorpro_has_custom_background() ) {
        $innerbody_classes .= ' bg-white';
    }
    ?>
    <div class="<?php echo esc_attr( $innerbody_classes ); ?>">
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text sr-only focus:not-sr-only focus:absolute focus:z-[100000] p-4 bg-white text-brand-600" href="#main"><?php esc_html_e( 'Skip to content', 'authorpro' ); ?></a>
    <?php
    $awt_settings = get_option('awt_global_settings', []);
    $awt_header_force = isset($awt_settings['awt_header_force_global']) && $awt_settings['awt_header_force_global'] === '1';

    if ($awt_header_force) {
        $header_slug = $awt_settings['awt_global_header_block'] ?? '';
        $header_id = function_exists('rswpthemes_awt_get_block_id_by_slug') ? rswpthemes_awt_get_block_id_by_slug($header_slug) : false;

        if ($header_id) {
            echo do_blocks('<!-- wp:block {"ref":' . absint($header_id) . '} /-->');
        } else {
            get_template_part('template-parts/header/header', 'template');
        }
    } else {
        get_template_part('template-parts/header/header', 'template');
    }