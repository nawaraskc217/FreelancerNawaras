<?php
$awt_settings = get_option('awt_global_settings', []);
$awt_footer_force = isset($awt_settings['awt_footer_force_global']) && $awt_settings['awt_footer_force_global'] === '1';
if ($awt_footer_force) {
    $footer_slug = $awt_settings['awt_global_footer_block'] ?? '';
    $footer_id = function_exists('rswpthemes_awt_get_block_id_by_slug') ? rswpthemes_awt_get_block_id_by_slug($footer_slug) : false;

    if ($footer_id) {
        echo do_blocks('<!-- wp:block {"ref":' . absint($footer_id) . '} /-->');
    } else {
        get_template_part('template-parts/footer/footer', 'template');
    }
} else {
    get_template_part('template-parts/footer/footer', 'template');
}
wp_footer(); ?>
</div> <!-- CLose InnerBody -->

</body>
</html>
