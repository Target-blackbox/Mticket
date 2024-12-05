<?php
/**
 * Add Theme info Page
 */

function liberty_fse_menu() {
	add_theme_page( esc_html__( 'Liberty FSE', 'liberty-fse' ), esc_html__( 'About Liberty FSE', 'liberty-fse' ), 'edit_theme_options', 'about-liberty-fse', 'liberty_fse_theme_page_display' );
}
add_action( 'admin_menu', 'liberty_fse_menu' );

function liberty_fse_admin_theme_style() {
	wp_enqueue_style('liberty-fse-custom-admin-style', esc_url(get_template_directory_uri()) . '/assets/css/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'liberty_fse_admin_theme_style');

/**
 * Display About page
 */
function liberty_fse_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	} ?>

		<div class="Grace-wrapper">
			<div class="Grcae-info-holder">
				<div class="Grcae-info-holder-content">
					<div class="Grace-Welcome">
						<h1 class="welcomeTitle"><?php esc_html_e( 'About Theme Info', 'liberty-fse' ); ?></h1>                        
						<div class="featureDesc">
							<?php echo esc_html__( 'Liberty FSE is a free museum WordPress theme for art gallery, art museum, art painting, artist, exhibition, gallery, gallery art, painting, painting art. This peaceful yet elegant theme offers your website a welcoming and professional look that can please your website visitors immediately. When you make use of this theme, it will make your museum and your website globally popular. This WordPress theme is the right theme that can allow you to create the buzz you need for your website to boost the fame of your website.', 'liberty-fse' ); ?>
						</div>
						
                        <h1 class="welcomeTitle"><?php esc_html_e( 'Theme Features', 'liberty-fse' ); ?></h1>

                        <h2><?php esc_html_e( 'Block Compatibale', 'liberty-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'liberty-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'Responsive Ready', 'liberty-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'liberty-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'Cross Browser Compatible', 'liberty-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'liberty-fse' ); ?>
                        </div>
                        
                        <h2><?php esc_html_e( 'E-commerce', 'liberty-fse' ); ?></h2>
                        <div class="featureDesc">
                            <?php echo esc_html__( 'Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'liberty-fse' ); ?>
                        </div>

					</div> <!-- .Grace-Welcome -->
				</div> <!-- .Grcae-info-holder-content -->
				
				
				<div class="Grcae-info-holder-sidebar">
                        <div class="sidebarBX">
                            <h2 class="sidebarBX-title"><?php echo esc_html__( 'Get Libery PRO', 'liberty-fse' ); ?></h2>
                            <p><?php echo esc_html__( 'More features are availbale in Premium Version', 'liberty-fse' ); ?></p>
                            <a href="<?php echo esc_url( 'https://gracethemes.com/themes/arts-museum-wordpress-theme/' ); ?>" target="_blank" class="button"><?php esc_html_e( 'Get the PRO Version &rarr;', 'liberty-fse' ); ?></a>
                        </div>


						<div class="sidebarBX">
							<h2 class="sidebarBX-title"><?php echo esc_html__( 'Important Links', 'liberty-fse' ); ?></h2>

							<ul class="themeinfo-links">
                                <li>
									<a href="<?php echo esc_url( 'https://gracethemes.com/demo/liberty/' ); ?>" target="_blank"><?php echo esc_html__( 'Demo Preview', 'liberty-fse' ); ?></a>
								</li>                               
								<li>
									<a href="<?php echo esc_url( 'https://gracethemes.com/documentation/liberty/#homepage-lite' ); ?>" target="_blank"><?php echo esc_html__( 'Documentation', 'liberty-fse' ); ?></a>
								</li>
								
								<li>
									<a href="<?php echo esc_url( 'https://gracethemes.com/wordpress-themes/' ); ?>" target="_blank"><?php echo esc_html__( 'View Our Premium Themes', 'liberty-fse' ); ?></a>
								</li>
							</ul>
						</div>

						<div class="sidebarBX">
							<h2 class="sidebarBX-title"><?php echo esc_html__( 'Leave us a review', 'liberty-fse' ); ?></h2>
							<p><?php echo esc_html__( 'If you are satisfied with Liberty FSE, please give your feedback.', 'liberty-fse' ); ?></p>
							<a href="https://wordpress.org/support/theme/liberty-fse/reviews/" class="button" target="_blank"><?php esc_html_e( 'Submit a review', 'liberty-fse' ); ?></a>
						</div>

				</div><!-- .Grcae-info-holder-sidebar -->	

			</div> <!-- .Grcae-info-holder -->
		</div><!-- .Grace-wrapper -->
<?php } ?>