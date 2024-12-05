<?php
/**
 * The template for displaying search forms in Classic Tour Booking
 *
 * @package Classic Tour Booking
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>		
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'classic-tour-booking' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'classic-tour-booking' ); ?>">
</form>