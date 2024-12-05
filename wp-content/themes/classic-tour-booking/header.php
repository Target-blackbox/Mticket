<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classic Tour Booking
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<?php if ( get_theme_mod('classic_tour_booking_preloader', true) != "") { ?>
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
<?php } ?>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'classic-tour-booking' ); ?></a>

<div id="pageholder" <?php if( get_theme_mod( 'classic_tour_booking_box_layout' ) ) { echo 'class="boxlayout"'; } ?>>

  <?php if ( get_theme_mod('classic_tour_booking_top_bar', false) != "" && get_theme_mod('classic_tour_booking_offer_text') != "" ) { ?>
    <div class="header-top py-2">
        <div class="container">
        <p class="text-center"><?php echo esc_html(get_theme_mod ('classic_tour_booking_offer_text','')); ?></p>
      </div>
    </div>
  <?php } ?>

  <?php if ( get_theme_mod('classic_tour_booking_contact_box', false) != "") { ?>
    <div class="contact-box py-md-1 py-2">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-7 p-0 align-self-center text-center text-md-start">
            <div class="info-box py-1">
              <?php if ( get_theme_mod('classic_tour_booking_email_address') != "") { ?>
                <a class="mail py-md-0 py-2" href="mailto:<?php echo esc_attr( get_theme_mod('classic_tour_booking_email_address','') ); ?>"><i class="far fa-envelope"></i><?php echo esc_html(get_theme_mod ('classic_tour_booking_email_address','')); ?></a>
              <?php } ?>
              <?php if ( get_theme_mod('classic_tour_booking_phone_number') != "") { ?>
                <a class="phn ms-md-4 py-md-0 py-2" href="tel:<?php echo esc_url( get_theme_mod('classic_tour_booking_phone_number','' )); ?>"><i class="fas fa-phone"></i><?php echo esc_html(get_theme_mod ('classic_tour_booking_phone_number','')); ?></a>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-4 col-md-5 align-self-center text-center text-md-end">
            <span class="social-icons me-md-1 me-3">
              <?php if ( get_theme_mod('classic_tour_booking_fb_link') != "") { ?>
                <a title="<?php echo esc_attr('facebook', 'classic-tour-booking'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_tour_booking_fb_link')); ?>"><i class="fab fa-facebook-f"></i></a> 
              <?php } ?>
              <?php if ( get_theme_mod('classic_tour_booking_insta_link') != "") { ?> 
                <a title="<?php echo esc_attr('instagram', 'classic-tour-booking'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_tour_booking_insta_link')); ?>"><i class="fab fa-instagram"></i></a>
              <?php } ?>
              <?php if ( get_theme_mod('classic_tour_booking_twitt_link') != "") { ?>
                <a title="<?php echo esc_attr('twitter', 'classic-tour-booking'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_tour_booking_twitt_link')); ?>"><i class="fab fa-twitter"></i></a>
              <?php } ?>
              <?php if ( get_theme_mod('classic_tour_booking_pinterest_link') != "") { ?> 
                <a title="<?php echo esc_attr('pinterest', 'classic-tour-booking'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('classic_tour_booking_pinterest_link')); ?>"><i class="fab fa-pinterest"></i></a>
              <?php } ?>
            </span>

            <?php if ( get_theme_mod('classic_tour_booking_contact_us_text', 'SIGN UP') != "" && get_theme_mod('classic_tour_booking_contact_us_url') != "") { ?> 
                <span class="contact-us">
                  <a href="<?php echo esc_url(get_theme_mod ('classic_tour_booking_contact_us_url','')); ?>"><?php echo esc_html(get_theme_mod ('classic_tour_booking_contact_us_text','SIGN UP','classic-tour-booking')); ?></a>
                </span>
            <?php }?>

          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="header py-2 <?php echo esc_attr(classic_tour_booking_sticky_menu()); ?>">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-9 align-self-center">
          <div class="row">
            <div class="col-lg-3 col-md-4 align-self-center px-md-0">
              <div class="logo text-center text-md-start">
                <?php classic_tour_booking_the_custom_logo(); ?>
                <div class="site-branding-text">
                  <?php if ( get_theme_mod('classic_tour_booking_title_enable',true) != "") { ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                      <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                      <?php endif; ?>
                    <?php } ?>
                  <?php $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) : ?>
                    <?php if ( get_theme_mod('classic_tour_booking_tagline_enable',false) != "") { ?>
                    <span class="site-description"><?php echo esc_html( $description ); ?></span>
                    <?php } ?>
                  <?php endif; ?> 
                </div>
              </div>
            </div>
            <div class="col-lg-9 col-md-8 align-self-center">
              <div class="toggle-nav text-center">
                <?php if(has_nav_menu('primary')){ ?>
                  <button role="tab"><?php esc_html_e('Menu','classic-tour-booking'); ?></button>
                <?php }?>
              </div>
              <div id="mySidenav" class="nav sidenav px-lg-5">
                <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','classic-tour-booking' ); ?>">
                  <ul class="mobile_nav">
                    <?php 
                      wp_nav_menu( array( 
                        'theme_location' => 'primary',
                        'container_class' => 'main-menu' ,
                        'items_wrap' => '%3$s',
                        'fallback_cb' => 'wp_page_menu',
                      ) ); 
                     ?>
                  </ul>
                  <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','classic-tour-booking'); ?></a>
                </nav>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 align-self-center text-center text-md-end my-md-0 my-3">
          <span class="search-box text-center me-3">
            <?php if(get_theme_mod('classic_tour_booking_search_option',true) != ''){ ?>
              <button type="button" class="search-open"><i class="fas fa-search"></i></button>
            <?php }?>
          </span>
          <?php if(class_exists('woocommerce')){ ?> 
            <span class="product-account text-center me-3">
              <?php if ( is_user_logged_in() ) { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','classic-tour-booking'); ?>"><i class="fas fa-user"></i></a>
              <?php } 
              else { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','classic-tour-booking'); ?>"><i class="fas fa-user"></i></a>
              <?php } ?>
            </span>
          <?php }?>  
          <?php if(class_exists('woocommerce')){ ?> 
            <span class="product-cart text-center position-relative pe-2">
              <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','classic-tour-booking' ); ?>"><i class="fas fa-shopping-bag"></i></a>
              <?php 
              $cart_count = WC()->cart->get_cart_contents_count(); 
              if($cart_count > 0): ?>
                  <span class="cart-count"><?php echo $cart_count; ?></span>
              <?php endif; ?>
            </span>
          <?php }?>
        </div>

        <div class="search-outer">
          <div class="serach_inner w-100 h-100">
            <?php get_search_form(); ?>
          </div>
          <button type="button" class="search-close"><span>X</span></button>
        </div>
      </div>

      </div>
    </div>
  </div>
</div>

