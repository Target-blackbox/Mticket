<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Classic Tour Booking
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function classic_tour_booking_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'classic_tour_booking_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function classic_tour_booking_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	return $classes;
}
add_filter( 'body_class', 'classic_tour_booking_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function classic_tour_booking_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';
	return $url;
}
add_filter( 'attachment_link', 'classic_tour_booking_enhanced_image_navigation', 10, 2 );

/*radio button sanitization*/
function classic_tour_booking_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

if ( ! function_exists( 'classic_tour_booking_sanitize_integer' ) ) {
	function classic_tour_booking_sanitize_integer( $input ) {
		return (int) $input;
	}
}

function classic_tour_booking_sanitize_phone_number( $phone ) {
    return preg_replace( '/[^\d+]/', '', $phone );
}