<header class="sticky top-0 w-full bg-white/90 backdrop-blur-md z-50 border-b border-slate-100" id="main-header">
    <div class="authorpro-container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <?php
            $display_title   = get_theme_mod( 'authorpro_display_title', true );
            $display_tagline = get_theme_mod( 'authorpro_display_tagline', true );
            $logo_layout     = get_theme_mod( 'authorpro_logo_layout', 'inline' );

            $wrapper_classes = 'site-identity-wrapper flex items-center cursor-pointer';
            if ( 'inline' === $logo_layout ) {
                $wrapper_classes .= ' flex-row gap-4 items-center';
            } else {
                $wrapper_classes .= ' flex-col gap-1 items-start justify-center';
            }
            ?>
            <div class="<?php echo esc_attr( $wrapper_classes ); ?>">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                }
                
                if ( $display_title || $display_tagline ) :
                    ?>
                    <div class="site-identity-text flex flex-col">
                        <?php if ( $display_title ) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl font-bold text-slate-900 tracking-tight">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        <?php endif; ?>

                        <?php if ( $display_tagline ) : ?>
                            <p class="text-sm text-slate-500 m-0">
                                <?php bloginfo( 'description' ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <nav class="hidden lg:flex items-center space-x-8 text-base">
                <?php
                if ( function_exists( 'authorpro_render_header_menu' ) ) {
                    authorpro_render_header_menu( 'primary' );
                }
                ?>
            </nav>
            <?php 
            $show_cart   = get_theme_mod( 'header_show_cart', true );
            $show_search = get_theme_mod( 'header_show_search', true );
            if(!$show_cart && !$show_search) { 
                $header_icons_container_classes = 'lg:hidden';
            } else {
                $header_icons_container_classes = 'flex items-center gap-4';
            }
            ?>
            <div class="<?php echo esc_attr( $header_icons_container_classes ); ?>">
                <?php
                // Get Customizer Settings
                // Cart Icon (Condition: WooCommerce is active AND Customizer setting is true)
                if ( class_exists( 'WooCommerce' ) && $show_cart ) :
                ?>
                <div class="relative group cursor-pointer p-2" id="mini-cart-btn">
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="relative group cursor-pointer p-2 inline-block" title="<?php esc_attr_e( 'View your shopping cart', 'authorpro' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-700 group-hover:text-brand-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
        
                        <span class="authorprocart-count absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-[10px] font-bold leading-none text-white bg-brand-600 rounded-full transform translate-x-1 -translate-y-1">
                            <?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?>
                        </span>
                    </a>
                </div>
                <?php endif; ?>
        
                <?php 
                // Search Icon (Condition: Customizer setting is true)
                if ( $show_search ) : 
                ?>
                <button id="search-toggle" class="p-2 text-slate-500 hover:text-brand-600 transition duration-200 rounded-full hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-brand-600" aria-label="<?php esc_attr_e( 'Open Search', 'authorpro' ); ?>">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <?php endif; ?>
        
                <button id="mobile-menu-btn"
                    class="lg:hidden p-2 rounded-md focus:bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none" aria-label="<?php esc_attr_e( 'Menu', 'authorpro' ); ?>">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="mobile-menu"
        class="hidden lg:hidden bg-white border-t border-slate-100 absolute w-full left-0 top-20 shadow-lg h-screen overflow-y-auto pb-20">
        <div class="px-4 pt-4 pb-6 space-y-2">
            <?php
            if ( function_exists( 'authorpro_render_mobile_menu' ) ) {
                authorpro_render_mobile_menu( 'primary' );
            }
            ?>
        </div>
    </div>
    <div id="search-modal" class="fixed inset-0 z-[100] invisible opacity-0 transition-all duration-200" aria-hidden="true">

        <div class="relative z-50 mt-24 mx-auto max-w-2xl px-4 sm:px-6 opacity-0 scale-95 transition-all duration-200 transform" id="search-modal-content">
            <form method="get" class="relative bg-white rounded-xl shadow-2xl ring-1 ring-slate-900/5 overflow-hidden flex items-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="pl-6 text-slate-400">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </div>
                <label for="search-modal-input" class="sr-only"><?php echo esc_html_x( 'Search for:', 'label', 'authorpro' ); ?></label>
                <input type="search" id="search-modal-input" name="s" class="w-full h-16 bg-transparent border-none focus:outline-none focus:border-none shadow-none ring-0 focus:ring-0 text-slate-900 placeholder-slate-400 text-lg px-4" placeholder="<?php echo esc_attr_x( 'Search documentation, articles...', 'placeholder', 'authorpro' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" autocomplete="off">
                <div class="pr-6 flex items-center">
                     <span class="hidden sm:inline-block text-xs font-medium text-slate-400 border border-slate-200 rounded px-1.5 py-0.5 mr-2">ESC</span>
                     <button type="button" id="search-close-btn" class="p-2 text-slate-400 hover:text-brand-600 rounded-full hover:bg-slate-100 transition focus:outline-none" aria-label="Close">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                     </button>
                </div>
            </form>
        </div>
    </div>

</header>

<?php if ( is_home() && has_header_image() ) : ?>
<div class="custom-header-media w-full relative">
    <div class="w-full bg-cover bg-center bg-no-repeat border-b border-slate-200 shadow-inner" 
         style="background-image: url('<?php echo esc_url( get_header_image() ); ?>'); min-height: 300px; height: 40vh; max-height: 600px;">
        <span class="sr-only"><?php echo esc_html( get_bloginfo( 'name', 'display' ) ); ?></span>
    </div>
</div>
<?php endif; ?>