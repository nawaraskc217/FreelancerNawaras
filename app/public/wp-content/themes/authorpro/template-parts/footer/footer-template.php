<?php 
$has_active_footer = false;
for ( $i = 1; $i <= 4; $i++ ) {
    if ( is_active_sidebar( 'footer-' . $i ) ) {
        $has_active_footer = true;
        break; // Stop checking once we find an active one
    }
}
$footerWrapper = 'pt-16';
$copyrightWrapperDiv = 'border-t border-slate-200 pt-8';
if(!$has_active_footer){
    $footerWrapper = 'pt-8';
    $copyrightWrapperDiv = '';
}
?>

<footer class="bg-white border-t border-slate-200 <?php echo esc_attr( $footerWrapper ); ?> pb-8">
    <div class="authorpro-container">
        <?php
        // Only render the wrapper if there is active content
        if ( $has_active_footer ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
                    <?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
                        <div class="footer-widget-area col-span-1">
                            <?php dynamic_sidebar( 'footer-' . $i ); ?>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <div class=" <?php echo esc_attr( $copyrightWrapperDiv ); ?> flex flex-col md:flex-row justify-between items-center">
            <p class="text-slate-500 text-sm mb-4 md:mb-0">
                &copy; <?php echo date( 'Y' ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. All rights reserved.
            </p>
            <div class="flex items-center space-x-2 text-sm text-slate-500">
                <span>Powered by</span>
                <a href="#" class="font-bold text-slate-800 hover:text-brand-600 transition">RS WP Themes</a>
            </div>
        </div>
    </div>
</footer>
