<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classic Tour Booking
 */
?>
<div id="footer">
  <?php 
    $classic_tour_booking_footer_widget_enabled = get_theme_mod('classic_tour_booking_footer_widget', true);
    
    if ($classic_tour_booking_footer_widget_enabled !== false && $classic_tour_booking_footer_widget_enabled !== '') { ?>

    <div class="footer-widget">
    	<div class="container">
        <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
        <?php endif; // end footer widget area ?>
                  
        <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
        <?php endif; // end footer widget area ?>
      
        <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
        <?php endif; // end footer widget area ?>
        
        <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
        <?php endif; // end footer widget area ?>      
        <div class="clear"></div>
      </div>
    </div>
  <?php } ?>
  <div class="clear"></div> 

  <div class="copywrap">
  	<div class="container">
      <p><a href="<?php echo esc_html(get_theme_mod('classic_tour_booking_copyright_link',__('https://www.theclassictemplates.com/products/free-tour-wordpress-theme','classic-tour-booking'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('classic_tour_booking_copyright_line',__('Tour Booking WordPress Theme','classic-tour-booking'))); ?></a> <?php echo esc_html('By Classic Templates','classic-tour-booking'); ?></p>
    </div>
  </div>
</div>

<?php if(get_theme_mod('classic_tour_booking_scroll_hide',false)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'classic-tour-booking'); ?></a>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>