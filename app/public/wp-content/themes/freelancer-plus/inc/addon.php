<?php
/*
 * @package Freelancer Plus
 */


 function freelancer_plus_admin_enqueue_scripts() {
    wp_enqueue_style( 'freelancer-plus-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'freelancer_plus_admin_enqueue_scripts' );

function freelancer_plus_theme_info_menu_link() {

    $freelancer_plus_theme = wp_get_theme();
    add_theme_page(
        sprintf( esc_html__( 'Welcome to %1$s', 'freelancer-plus' ), $freelancer_plus_theme->get( 'Name' )),
        esc_html__( 'Theme Demo Import', 'freelancer-plus' ),'edit_theme_options','freelancer-plus','freelancer_plus_theme_info_page'
    );
}
add_action( 'admin_menu', 'freelancer_plus_theme_info_menu_link' );

function freelancer_plus_theme_info_page() {

    $freelancer_plus_theme = wp_get_theme();
    ?>
<div class="wrap theme-info-wrap">
    <h1><?php printf( esc_html__( 'Welcome to %1$s', 'freelancer-plus' ), esc_html($freelancer_plus_theme->get( 'Name' ))); ?>
    </h1>
    <p class="theme-description">
    <?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'freelancer-plus' ); ?>
    </p>
    <div class="columns-wrapper clearfix theme-demo">
        <div class="column column-quarter clearfix start-box"> 
            <div class="demo-import">
                <div class="theme-name">
                    <h2><?php esc_html_e( 'FREELANCER PLUS', 'freelancer-plus' ); ?></h2>
                    <p class="version"><?php esc_html_e( 'Version', 'freelancer-plus' ); ?>: <?php echo esc_html( wp_get_theme()->get( 'Version' ) ); ?></p>	
                </div>
                <?php require get_parent_theme_file_path( '/inc/demo-content.php' ); ?>
                <div id="demo-import-loader">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/status.gif'); ?>" alt="<?php echo esc_attr( 'Loading...', 'freelancer-plus'); ?>" />
                </div>
            </div>
        </div>
        <div class="column column-first clearfix">
            <div class="important-link">
                <div class="main-box columns-wrapper clearfix">
                    <div class="themelink column column-third clearfix">
                        <p><strong><?php esc_html_e( 'Pro version of our theme', 'freelancer-plus' ); ?></strong></p>
                        <p><?php esc_html_e( 'Are you excited for our theme? Then we will proceed for pro version of theme.', 'freelancer-plus' ); ?></p>
                        <a class="get-premium" href="<?php echo esc_url( FREELANCER_PLUS_PREMIUM_PAGE ); ?>" target="_blank">
                        <?php esc_html_e( 'Go To Premium', 'freelancer-plus' ); ?>
                        </a>
                    </div>

                    <div class="themelink column column-third clearfix">
                        <p><strong><?php esc_html_e( 'Need Help?', 'freelancer-plus' ); ?></strong></p>
                        <p><?php esc_html_e( 'Go to our support forum to help you out in case of queries and doubts regarding our theme.', 'freelancer-plus' ); ?></p>
                        <a href="<?php echo esc_url( FREELANCER_PLUS_SUPPORT ); ?>" target="_blank">
                        <?php esc_html_e( 'Contact Us', 'freelancer-plus' ); ?>
                        </a>
                    </div>

                    <div class="themelink column column-third clearfix">
                        <p><strong><?php esc_html_e( 'Check Our Demo', 'freelancer-plus' ); ?></strong></p>
                        <p><?php esc_html_e( 'Here, you can view a live demonstration of our premium theme.', 'freelancer-plus' ); ?></p>
                        <a href="<?php echo esc_url( FREELANCER_PLUS_PRO_DEMO ); ?>" target="_blank">
                        <?php esc_html_e( 'Premium Demo', 'freelancer-plus' ); ?>
                        </a>
                    </div>
                </div>
                <hr>
                <div class="main-box columns-wrapper clearfix">
                    <div class="themelink column column-third clearfix">
                        <p><strong><?php esc_html_e( 'Check all classic features', 'freelancer-plus' ); ?></strong></p>
                        <p><?php esc_html_e( 'Explore all our 90+ Premium Themes Collections', 'freelancer-plus' ); ?></p>
                        <a href="<?php echo esc_url( FREELANCER_PLUS_THEME_PAGE ); ?>" target="_blank">
                        <?php esc_html_e( 'Theme Page', 'freelancer-plus' ); ?>
                        </a>
                    </div>

                    <div class="themelink column column-third clearfix">
                        <p><strong><?php esc_html_e( 'Leave us a review', 'freelancer-plus' ); ?></strong></p>
                        <p><?php esc_html_e( 'Are you enjoying our theme? We would love to hear your feedback.', 'freelancer-plus' ); ?></p>
                        <a href="<?php echo esc_url( FREELANCER_PLUS_REVIEW ); ?>" target="_blank">
                        <?php esc_html_e( 'Rate This Theme', 'freelancer-plus' ); ?>
                        </a>
                    </div>

                    <div class="themelink column column-third clearfix">
                        <p><strong><?php esc_html_e( 'Theme Documentation', 'freelancer-plus' ); ?></strong></p>
                        <p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed theme setup.', 'freelancer-plus' ); ?></p>
                        <a href="<?php echo esc_url( FREELANCER_PLUS_THEME_DOCUMENTATION ); ?>" target="_blank">
                        <?php esc_html_e( 'Documentation', 'freelancer-plus' ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="getting-started">
        <div class="section">
            <h3><?php printf( esc_html__( 'Getting started with %s', 'freelancer-plus' ),
            esc_html($freelancer_plus_theme->get( 'Name' ))); ?></h3>
            <div class="columns-wrapper clearfix">
                <div class="column column-half clearfix">
                    <div class="section themelink">
                        <div class="">
                            <a class="" href="<?php echo esc_url( FREELANCER_PLUS_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Get Premium', 'freelancer-plus' ); ?></a>
                            <a href="<?php echo esc_url( FREELANCER_PLUS_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'View Demo', 'freelancer-plus' ); ?></a>
                            <a class="get-premium" href="<?php echo esc_url( FREELANCER_PLUS_BUNDLE_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Bundle of 90+ Themes at $99', 'freelancer-plus' ); ?></a>
                        </div>
                        <div class="theme-description-1"><?php echo esc_html($freelancer_plus_theme->get( 'Description' )); ?></div>
                    </div>
                </div>
                <div class="column column-half clearfix">
                    <img src="<?php echo esc_url( $freelancer_plus_theme->get_screenshot() ); ?>" alt=""/>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="theme-author">
      <p><?php
        printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'freelancer-plus' ),
            esc_html($freelancer_plus_theme->get( 'Name' )),
            '<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'freelancer-plus' ) . '">classictemplate</a>',
            '<a target="_blank" href="' . esc_url(FREELANCER_PLUS_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'freelancer-plus' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'freelancer-plus' ) . '</a>'
        );
        ?></p>
    </div>
</div>
<?php
}
?>