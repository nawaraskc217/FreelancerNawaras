<?php

    $freelancer_plus_first_color = get_theme_mod('freelancer_plus_first_color');
    $freelancer_plus_second_color = get_theme_mod('freelancer_plus_second_color');
    $freelancer_plus_color_scheme_css = '';

    /*------------------ Global First Color -----------*/

    if ($freelancer_plus_first_color) {
        $freelancer_plus_color_scheme_css .= ':root {';
        $freelancer_plus_color_scheme_css .= '--first-theme-color: ' . esc_attr($freelancer_plus_first_color) . ' !important;';
        $freelancer_plus_color_scheme_css .= '} ';
    }
    
    /*------------------ Global Second Color -----------*/
    
    if ($freelancer_plus_second_color) {
        $freelancer_plus_color_scheme_css .= ':root {';
        $freelancer_plus_color_scheme_css .= '--second-theme-color: ' . esc_attr($freelancer_plus_second_color) . ' !important;';
        $freelancer_plus_color_scheme_css .= '} ';
    }

    $freelancer_plus_color_scheme_css .= '.slidesection, .page-links a, .page-links span, .site-main .wp-block-button__link, .postsec-list .wp-block-button__link, .woocommerce a.added_to_cart,.banner-btn a,.pagemore a,.serv-btn a,.woocommerce ul.products li.product .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.button, .woocommerce button.button, .woocommerce #respond input#submit, #commentform input#submit, .nav-links .page-numbers, span.onsale, .breadcrumb a, button.wc-block-components-checkout-place-order-button {';
    $freelancer_plus_color_scheme_css .= 'background-image: linear-gradient(to right, '.esc_attr($freelancer_plus_first_color).', '.esc_attr($freelancer_plus_second_color).') !important;';
    $freelancer_plus_color_scheme_css .= '}';

    //---------------------------------Logo-Max-height--------- 
    $freelancer_plus_logo_width = get_theme_mod('freelancer_plus_logo_width');

    if($freelancer_plus_logo_width != false){

    $freelancer_plus_color_scheme_css .='.logo img{';

        $freelancer_plus_color_scheme_css .='width: '.esc_html($freelancer_plus_logo_width).'px;';

    $freelancer_plus_color_scheme_css .='}';
    }

    /*---------------------------Slider Height ------------*/

    $freelancer_plus_slider_img_height = get_theme_mod('freelancer_plus_slider_img_height');
    if($freelancer_plus_slider_img_height != false){
        $freelancer_plus_color_scheme_css .='.slidesection img{';
            $freelancer_plus_color_scheme_css .='height: '.esc_attr($freelancer_plus_slider_img_height).' !important;';
        $freelancer_plus_color_scheme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $freelancer_plus_footer_bg_image = get_theme_mod('freelancer_plus_footer_bg_image');
    if($freelancer_plus_footer_bg_image != false){
        $freelancer_plus_color_scheme_css .='.footer-widget{';
            $freelancer_plus_color_scheme_css .='background: url('.esc_attr($freelancer_plus_footer_bg_image).')!important;';
        $freelancer_plus_color_scheme_css .='}';
    }

    /*--------------------------- Scroll to top positions -------------------*/

    $freelancer_plus_scroll_position = get_theme_mod( 'freelancer_plus_scroll_position','Right');
    if($freelancer_plus_scroll_position == 'Right'){
        $freelancer_plus_color_scheme_css .='#button{';
            $freelancer_plus_color_scheme_css .='right: 20px;';
        $freelancer_plus_color_scheme_css .='}';
    }else if($freelancer_plus_scroll_position == 'Left'){
        $freelancer_plus_color_scheme_css .='#button{';
            $freelancer_plus_color_scheme_css .='left: 20px;';
        $freelancer_plus_color_scheme_css .='}';
    }else if($freelancer_plus_scroll_position == 'Center'){
        $freelancer_plus_color_scheme_css .='#button{';
            $freelancer_plus_color_scheme_css .='right: 50%;left: 50%;';
        $freelancer_plus_color_scheme_css .='}';
    }    

    /*--------------------------- Blog Post Page Image Box Shadow -------------------*/

    $freelancer_plus_blog_post_page_image_box_shadow = get_theme_mod('freelancer_plus_blog_post_page_image_box_shadow',0);
    if($freelancer_plus_blog_post_page_image_box_shadow != false){
        $freelancer_plus_color_scheme_css .='.post-thumb img{';
            $freelancer_plus_color_scheme_css .='box-shadow: '.esc_attr($freelancer_plus_blog_post_page_image_box_shadow).'px '.esc_attr($freelancer_plus_blog_post_page_image_box_shadow).'px '.esc_attr($freelancer_plus_blog_post_page_image_box_shadow).'px #cccccc;';
        $freelancer_plus_color_scheme_css .='}';
    }

    /*--------------------------- Woocommerce Product Image Border Radius -------------------*/

    $freelancer_plus_woo_product_img_border_radius = get_theme_mod('freelancer_plus_woo_product_img_border_radius');
    if($freelancer_plus_woo_product_img_border_radius != false){
        $freelancer_plus_color_scheme_css .='.woocommerce ul.products li.product a img{';
            $freelancer_plus_color_scheme_css .='border-radius: '.esc_attr($freelancer_plus_woo_product_img_border_radius).'px;';
        $freelancer_plus_color_scheme_css .='}';
    }
    /*--------------------------- Woocommerce Product Sale Position -------------------*/    

    $freelancer_plus_product_sale_position = get_theme_mod( 'freelancer_plus_product_sale_position','Left');
    if($freelancer_plus_product_sale_position == 'Right'){
        $freelancer_plus_color_scheme_css .='.woocommerce ul.products li.product .onsale{';
            $freelancer_plus_color_scheme_css .='left:auto !important; right:.5em !important;';
        $freelancer_plus_color_scheme_css .='}';
    }else if($freelancer_plus_product_sale_position == 'Left'){
        $freelancer_plus_color_scheme_css .='.woocommerce ul.products li.product .onsale {';
            $freelancer_plus_color_scheme_css .='right:auto !important; left:.5em !important;';
        $freelancer_plus_color_scheme_css .='}';
    }        

    /*--------------------------- Shop page pagination -------------------*/

    $freelancer_plus_wooproducts_nav = get_theme_mod('freelancer_plus_wooproducts_nav', 'Yes');
    if($freelancer_plus_wooproducts_nav == 'No'){
    $freelancer_plus_color_scheme_css .='.woocommerce nav.woocommerce-pagination{';
        $freelancer_plus_color_scheme_css .='display: none;';
    $freelancer_plus_color_scheme_css .='}';
    }

    /*--------------------------- Related Product -------------------*/

    $freelancer_plus_related_product_enable = get_theme_mod('freelancer_plus_related_product_enable',true);
    if($freelancer_plus_related_product_enable == false){
    $freelancer_plus_color_scheme_css .='.related.products{';
        $freelancer_plus_color_scheme_css .='display: none;';
    $freelancer_plus_color_scheme_css .='}';
    }

    /*--------------------------- Scroll to Top Button Shape -------------------*/

    $freelancer_plus_scroll_top_shape = get_theme_mod('freelancer_plus_scroll_top_shape', 'circle');
    if($freelancer_plus_scroll_top_shape == 'box' ){
        $freelancer_plus_color_scheme_css .='#button{';
            $freelancer_plus_color_scheme_css .=' border-radius: 0%';
        $freelancer_plus_color_scheme_css .='}';
    }elseif($freelancer_plus_scroll_top_shape == 'curved' ){
        $freelancer_plus_color_scheme_css .='#button{';
            $freelancer_plus_color_scheme_css .=' border-radius: 20%';
        $freelancer_plus_color_scheme_css .='}';
    }elseif($freelancer_plus_scroll_top_shape == 'circle' ){
        $freelancer_plus_color_scheme_css .='#button{';
            $freelancer_plus_color_scheme_css .=' border-radius: 50%;';
        $freelancer_plus_color_scheme_css .='}';
    }