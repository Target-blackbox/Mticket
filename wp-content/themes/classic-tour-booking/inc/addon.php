<?php
/*
 * @package Classic Tour Booking
 */

function classic_tour_booking_admin_enqueue_scripts() {
    wp_enqueue_style( 'classic-tour-booking-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'classic_tour_booking_admin_enqueue_scripts' );

add_action('after_switch_theme', 'classic_tour_booking_options');

function classic_tour_booking_options() {
    global $pagenow;
    if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
        wp_redirect( admin_url( 'themes.php?page=classic-tour-booking' ) );
        exit;
    }
}

function classic_tour_booking_theme_info_menu_link() {

    $classic_tour_booking_theme = wp_get_theme();
    add_theme_page(
        sprintf( esc_html__( 'Welcome to %1$s %2$s', 'classic-tour-booking' ), $classic_tour_booking_theme->get( 'Name' ), $classic_tour_booking_theme->get( 'Version' ) ),
        esc_html__( 'Theme Info', 'classic-tour-booking' ),'edit_theme_options','classic-tour-booking','classic_tour_booking_theme_info_page'
    );
}
add_action( 'admin_menu', 'classic_tour_booking_theme_info_menu_link' );

function classic_tour_booking_theme_info_page() {

    $classic_tour_booking_theme = wp_get_theme();
    ?>
<div class="wrap theme-info-wrap">
    <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'classic-tour-booking' ), esc_html($classic_tour_booking_theme->get( 'Name' )), esc_html($classic_tour_booking_theme->get( 'Version' ))); ?>
    </h1>
    <p class="theme-description">
    <?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'classic-tour-booking' ); ?>
    </p>
    <div class="important-link">
        <p class="main-box columns-wrapper clearfix">
            <div class="themelink column column-half clearfix">
                <p><strong>Pro version of our theme</strong></p>
                <p>Are you exited for our theme? Then we will proceed for pro version of theme.</p>
                <a class="get-premium" href="<?php echo esc_url( CLASSIC_TOUR_BOOKING_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'classic-tour-booking' ); ?></a>
                <p><strong>Check all classic features</strong></p>
                <p>Explore all the premium features.</p>
                <a href="<?php echo esc_url( CLASSIC_TOUR_BOOKING_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'classic-tour-booking' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong>Need Help?</strong></p>
                <p>Go to our support forum to help you out in case of queries and doubts regarding our theme.</p>
                <a href="<?php echo esc_url( CLASSIC_TOUR_BOOKING_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'classic-tour-booking' ); ?></a>
                <p><strong>Leave us a review</strong></p>
                <p>Are you enjoying our theme? We would love to hear your feedback.</p>
                <a href="<?php echo esc_url( CLASSIC_TOUR_BOOKING_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'classic-tour-booking' ); ?></a>
            </div>
            <div class="themelink column column-half clearfix">
                <p><strong>Check Our Demo</strong></p>
                <p>Here, you can view a live demonstration of our premium them.</p>
                <a href="<?php echo esc_url( CLASSIC_TOUR_BOOKING_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'classic-tour-booking' ); ?></a>
                <p><strong>Theme Documentation</strong></p>
                <p>Need more details? Please check our full documentation for detailed theme setup.</p>
                <a href="<?php echo esc_url( CLASSIC_TOUR_BOOKING_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'classic-tour-booking' ); ?></a>
            </div>
        </p>
    </div>
    <div id="getting-started">
        <h3><?php printf( esc_html__( 'Getting started with %s', 'classic-tour-booking' ),
        esc_html($classic_tour_booking_theme->get( 'Name' ))); ?></h3>
        <div class="columns-wrapper clearfix">
            <div class="column column-half clearfix">
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Description', 'classic-tour-booking' ); ?></h4>
                    <div class="theme-description-1"><?php echo esc_html($classic_tour_booking_theme->get( 'Description' )); ?></div>
                </div>
            </div>
            <div class="column column-half clearfix">
                <img src="<?php echo esc_url( $classic_tour_booking_theme->get_screenshot() ); ?>" alt=""/>
                <div class="section">
                    <h4><?php esc_html_e( 'Theme Options', 'classic-tour-booking' ); ?></h4>
                    <p class="about">
                    <?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'classic-tour-booking' ),esc_html($classic_tour_booking_theme->get( 'Name' ))); ?></p>
                    <p>
                    <div class="themelink-1">
                        <a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>"><?php esc_html_e( 'Customize Theme', 'classic-tour-booking' ); ?></a>
                        <a href="<?php echo esc_url( CLASSIC_TOUR_BOOKING_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Checkout Premium', 'classic-tour-booking' ); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="theme-author">
      <p><?php
        printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'classic-tour-booking' ),
            esc_html($classic_tour_booking_theme->get( 'Name' )),
            '<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'classic-tour-booking' ) . '">classictemplate</a>',
            '<a target="_blank" href="' . esc_url( CLASSIC_TOUR_BOOKING_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'classic-tour-booking' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'classic-tour-booking' ) . '</a>'
        );
        ?></p>
    </div>
</div>
<?php
}
?>
