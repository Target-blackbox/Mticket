<?php

  $classic_tour_booking_first_color = get_theme_mod('classic_tour_booking_first_color');
  $classic_tour_booking_second_color = get_theme_mod('classic_tour_booking_second_color');
  $classic_tour_booking_color_scheme_css = '';

  /*------------------ Global First Color -----------*/
  $classic_tour_booking_color_scheme_css .=' .nav-links .page-numbers, .wc-block-components-totals-coupon__button.contained, #footer .tagcloud a:hover, .slidesection, .slider-img-color, .contact-us a:hover, .contact-box, .page-links a, .page-links span, .site-main .wp-block-button__link, .postsec-list .wp-block-button__link, .breadcrumb a, #commentform input#submit:hover {';
    $classic_tour_booking_color_scheme_css .='background-color: '.esc_attr($classic_tour_booking_first_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';
  
  $classic_tour_booking_color_scheme_css .='.pagemore:hover, .footer-widget, .shop-now a:hover {';
    $classic_tour_booking_color_scheme_css .='background: '.esc_attr($classic_tour_booking_first_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';

  $classic_tour_booking_color_scheme_css .=' .post-details p, #sidebar .widget a:visited,  #sidebar .widget a, .post-date,
  .post-comment, .listarticle h2 a, #blog h2, .main-menu ul li a, .main-nav a, .header .site-description, h1.site-title a:hover , p.site-title a:hover, .product-account i, .product-cart i, .search-box i , .serach_inner input.search-field, input:focus, a:hover, .search-box i {';
    $classic_tour_booking_color_scheme_css .='color: '.esc_attr($classic_tour_booking_first_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';
  
  $classic_tour_booking_color_scheme_css .='.category-btn:focus, .product-search button[type="submit"]:focus, .search-box button:focus, .serach_inner input[type="submit"]:focus {';
    $classic_tour_booking_color_scheme_css .='border: 2px solid'.esc_attr($classic_tour_booking_first_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';
  
  /*------------------ Global Second Color -----------*/
  
  $classic_tour_booking_color_scheme_css .='.woocommerce button.button.alt, button.wc-block-components-checkout-place-order-button, #blog .blog-content .post-color .page-links .post-page-numbers.current, .page-links a:hover, .product-cart .cart-count, .shop-now a, #blog .blog-content .post-color, span.page-numbers.current, .nav-links .page-numbers:hover, input.search-submit, .tagcloud a:hover, .copywrap, #footer .tagcloud a, .contact-us a, .entry-summary .pagemore, #commentform input#submit {';
    $classic_tour_booking_color_scheme_css .='background-color: '.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';
  
  $classic_tour_booking_color_scheme_css .='.posted_in a, .added_to_cart, .post-details h3 a, .site-main .wp-block-button.is-style-outline a, .postsec-list .wp-block-button.is-style-outline a, .header-top p, .info-box a:hover, .social-icons i:hover, .info-box i, h1.site-title a, p.site-title a, .main-nav .current_page_item a,
  .main-nav .current-menu-item a, .main-nav a:hover, .category-btn i:hover, .search-box i:hover, .product-account i:hover, .product-cart i:hover, h3.product-text a:hover, .addcartbtn a:hover, #catsliderarea .slider-text, .slider-box h1 a:hover, #blog .owl-prev, #blog .owl-next, .listarticle h2 a:hover,  form.woocommerce-product-search button, #sidebar ul li::before, #sidebar .widget a:active, #footer a:hover, .ftr-4-box ul li a:hover, .ftr-4-box ul li.current_page_item a, .edit-link a, .page #comments a, .slider-title span, .woocommerce-MyAccount-content a, .entry-content a {';
    $classic_tour_booking_color_scheme_css .='color: '.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';
  
  $classic_tour_booking_color_scheme_css .=' .site-main .wp-block-button a:hover, 
  .site-main .wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):hover, .postsec-list .wp-block-button a:hover, .postsec-list .wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):hover, .serach_inner, .catwrapslider .owl-prev:hover, .catwrapslider .owl-next:hover, #button, .widget_calendar caption, .widget_calendar #today, .breadcrumb .current-breadcrumb, .breadcrumb .current-breadcrumb, nav.woocommerce-MyAccount-navigation ul li, .woocommerce ul.products li.product .button, .woocommerce a.button, span.onsale {';
    $classic_tour_booking_color_scheme_css .='background: '.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';

  $classic_tour_booking_color_scheme_css .=' .site-main .wp-block-button.is-style-outline a, .postsec-list .wp-block-button.is-style-outline a, .widget .tagcloud a:hover {';
    $classic_tour_booking_color_scheme_css .='border: 1px solid'.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';
    
  $classic_tour_booking_color_scheme_css .=' #sidebar .tagcloud a:focus, .main-nav a:focus, .main-nav ul ul a:focus, select:focus, #commentform input#submit:focus, a.pagemore:focus, #sidebar input[type="text"], #sidebar input[type="search"], #footer input[type="search"], nav.woocommerce-MyAccount-navigation ul li {';
    $classic_tour_booking_color_scheme_css .='border: 2px solid'.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';

  $classic_tour_booking_color_scheme_css .=' .listarticle a:focus, .wp-block-button a:focus {';
    $classic_tour_booking_color_scheme_css .='outline: 2px solid'.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';

  $classic_tour_booking_color_scheme_css .=' .main-nav li ul {';
    $classic_tour_booking_color_scheme_css .='border-top: 3px solid'.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';

  $classic_tour_booking_color_scheme_css .=' .main-nav .current_page_item a, .main-nav .current-menu-item a, #sidebar .widget {';
    $classic_tour_booking_color_scheme_css .='border-bottom: 1px solid'.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';

  $classic_tour_booking_color_scheme_css .=' .tagcloud a:hover, .tagcloud a:hover {';
    $classic_tour_booking_color_scheme_css .='border-color'.esc_attr($classic_tour_booking_second_color).'!important;';
  $classic_tour_booking_color_scheme_css .='}';



  //---------------------------------Logo-Max-height--------- 
  $classic_tour_booking_logo_width = get_theme_mod('classic_tour_booking_logo_width');

  if($classic_tour_booking_logo_width != false){

    $classic_tour_booking_color_scheme_css .='.logo .custom-logo-link img{';

      $classic_tour_booking_color_scheme_css .='width: '.esc_html($classic_tour_booking_logo_width).'px;';

    $classic_tour_booking_color_scheme_css .='}';
  }

  // top bar
  $classic_tour_booking_contact_box = get_theme_mod('classic_tour_booking_contact_box');

  if($classic_tour_booking_contact_box != true){

    $classic_tour_booking_color_scheme_css .='.header-top{';

      $classic_tour_booking_color_scheme_css .='border-bottom: 1px solid #ccc;';

    $classic_tour_booking_color_scheme_css .='}';
  }

  /*---------------------------Slider Height ------------*/

    $classic_tour_booking_slider_img_height = get_theme_mod('classic_tour_booking_slider_img_height');
    if($classic_tour_booking_slider_img_height != false){
        $classic_tour_booking_color_scheme_css .='.slidesection img{';
            $classic_tour_booking_color_scheme_css .='height: '.esc_attr($classic_tour_booking_slider_img_height).' !important;';
        $classic_tour_booking_color_scheme_css .='}';
    }

  /*--------------------------- Footer background image -------------------*/

    $classic_tour_booking_footer_bg_image = get_theme_mod('classic_tour_booking_footer_bg_image');
    if($classic_tour_booking_footer_bg_image != false){
        $classic_tour_booking_color_scheme_css .='.footer-widget{';
            $classic_tour_booking_color_scheme_css .='background: url('.esc_attr($classic_tour_booking_footer_bg_image).')!important;';
        $classic_tour_booking_color_scheme_css .='}';
    }

  /*--------------------------- Scroll to top positions -------------------*/

    $classic_tour_booking_scroll_position = get_theme_mod( 'classic_tour_booking_scroll_position','Right');
    if($classic_tour_booking_scroll_position == 'Right'){
        $classic_tour_booking_color_scheme_css .='#button{';
            $classic_tour_booking_color_scheme_css .='right: 20px;';
        $classic_tour_booking_color_scheme_css .='}';
    }else if($classic_tour_booking_scroll_position == 'Left'){
        $classic_tour_booking_color_scheme_css .='#button{';
            $classic_tour_booking_color_scheme_css .='left: 20px;';
        $classic_tour_booking_color_scheme_css .='}';
    }else if($classic_tour_booking_scroll_position == 'Center'){
        $classic_tour_booking_color_scheme_css .='#button{';
            $classic_tour_booking_color_scheme_css .='right: 50%;left: 50%;';
        $classic_tour_booking_color_scheme_css .='}';
    }

    /*--------------------------- Footer Background Color -------------------*/

    $classic_tour_booking_footer_bg_color = get_theme_mod('classic_tour_booking_footer_bg_color');
    if($classic_tour_booking_footer_bg_color != false){
        $classic_tour_booking_color_scheme_css .='.footer-widget{';
            $classic_tour_booking_color_scheme_css .='background-color: '.esc_attr($classic_tour_booking_footer_bg_color).' !important;';
        $classic_tour_booking_color_scheme_css .='}';
    }

    /*--------------------------- Blog Post Page Image Box Shadow -------------------*/

    $classic_tour_booking_blog_post_page_image_box_shadow = get_theme_mod('classic_tour_booking_blog_post_page_image_box_shadow',0);
    if($classic_tour_booking_blog_post_page_image_box_shadow != false){
        $classic_tour_booking_color_scheme_css .='.post-thumb img{';
            $classic_tour_booking_color_scheme_css .='box-shadow: '.esc_attr($classic_tour_booking_blog_post_page_image_box_shadow).'px '.esc_attr($classic_tour_booking_blog_post_page_image_box_shadow).'px '.esc_attr($classic_tour_booking_blog_post_page_image_box_shadow).'px #cccccc;';
        $classic_tour_booking_color_scheme_css .='}';
    }

    /*--------------------------- Woocommerce Product Image Border Radius -------------------*/

    $classic_tour_booking_woo_product_img_border_radius = get_theme_mod('classic_tour_booking_woo_product_img_border_radius');
    if($classic_tour_booking_woo_product_img_border_radius != false){
        $classic_tour_booking_color_scheme_css .='.woocommerce ul.products li.product a img{';
            $classic_tour_booking_color_scheme_css .='border-radius: '.esc_attr($classic_tour_booking_woo_product_img_border_radius).'px;';
        $classic_tour_booking_color_scheme_css .='}';
    }