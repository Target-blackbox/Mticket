<?php
/**
 * Classic Tour Booking Theme Customizer
 *
 * @package Classic Tour Booking
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_tour_booking_customize_register( $wp_customize ) {

	function classic_tour_booking_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	function classic_tour_booking_sanitize_number_absint( $number, $setting ) {
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint( $number );
		
		// If the input is an absolute integer, return it; otherwise, return the default
		return ( $number ? $number : $setting->default );
	}

	function classic_tour_booking_sanitize_select( $input, $setting ){
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);
        //get the list of possible select options
        $choices = $setting->manager->get_control( $setting->id )->choices;
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }


	wp_enqueue_style('classic-tour-booking-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Logo
    $wp_customize->add_setting('classic_tour_booking_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'classic_tour_booking_sanitize_integer'
	));
	$wp_customize->add_control(new Classic_Tour_Booking_Slider_Custom_Control( $wp_customize, 'classic_tour_booking_logo_width',array(
		'label'	=> esc_html__('Logo Width','classic-tour-booking'),
		'section'=> 'title_tagline',
		'settings'=>'classic_tour_booking_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting('classic_tour_booking_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_tour_booking_title_enable', array(
	   'settings' => 'classic_tour_booking_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-tour-booking'),
	   'type'      => 'checkbox'
	));

	// site title color 
	$wp_customize->add_setting('classic_tour_booking_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'classic_tour_booking_sitetitle_color', array(
	   'settings' => 'classic_tour_booking_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'classic-tour-booking'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('classic_tour_booking_tagline_enable',array(
		'default' => false,
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_tour_booking_tagline_enable', array(
	   'settings' => 'classic_tour_booking_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-tour-booking'),
	   'type'      => 'checkbox'
	));

	// site Tagline color
	$wp_customize->add_setting('classic_tour_booking_siteTagline_color',array(
		'default' => '',
		'sanitize_callback' => 'esc_html',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_siteTagline_color', array(
	   'settings' => 'classic_tour_booking_siteTagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'classic-tour-booking'),
	   'type'      => 'color'
	));


	// woocommerce section
	$wp_customize->add_section('classic_tour_booking_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'classic-tour-booking'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	$wp_customize->add_setting('classic_tour_booking_shop_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_tour_booking_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('classic_tour_booking_shop_page_sidebar',array(
		'type' => 'checkbox',
		'label' => __(' Check To Enable Shop page sidebar','classic-tour-booking'),
		'section' => 'classic_tour_booking_woocommerce_page_settings',
	 ));

    // shop page sidebar alignment
    $wp_customize->add_setting('classic_tour_booking_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control('classic_tour_booking_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'classic-tour-booking'),
		'section'        => 'classic_tour_booking_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-tour-booking'),
			'Right Sidebar' => __('Right Sidebar', 'classic-tour-booking'),
		),
	));
	$wp_customize->add_setting( 'classic_tour_booking_single_page_sidebar',array(
		'default' => false,
		'sanitize_callback'	=> 'classic_tour_booking_sanitize_checkbox'
    ) );
    $wp_customize->add_control('classic_tour_booking_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Check To Enable Single Product Page Sidebar','classic-tour-booking'),
		'section' => 'classic_tour_booking_woocommerce_page_settings'
    ));	
	// single product page sidebar alignment
    $wp_customize->add_setting('classic_tour_booking_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control('classic_tour_booking_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page Sidebar', 'classic-tour-booking'),
		'section'        => 'classic_tour_booking_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'classic-tour-booking'),
			'Right Sidebar' => __('Right Sidebar', 'classic-tour-booking'),
		),
	));	

	$wp_customize->add_setting( 'classic_tour_booking_woo_product_img_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_tour_booking_sanitize_integer'
    ) );
    $wp_customize->add_control(new classic_tour_booking_Slider_Custom_Control( $wp_customize, 'classic_tour_booking_woo_product_img_border_radius',array(
		'label'	=> esc_html__('Woo Product Img Border Radius','classic-tour-booking'),
		'section'=> 'classic_tour_booking_woocommerce_page_settings',
		'settings'=>'classic_tour_booking_woo_product_img_border_radius',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
    // Add a setting for number of products per row
    $wp_customize->add_setting('classic_tour_booking_products_per_row', array(
	   'default'   => '3',
	   'transport' => 'refresh',
	   'sanitize_callback' => 'classic_tour_booking_sanitize_integer'
    ));
    $wp_customize->add_control('classic_tour_booking_products_per_row', array(
	   'label'    => __('Woo Products Per Row', 'classic-tour-booking'),
	   'section'  => 'classic_tour_booking_woocommerce_page_settings',
	   'settings' => 'classic_tour_booking_products_per_row',
	   'type'     => 'select',
	   'choices'  => array(
		  '2' => '2',
		  '3' => '3',
		  '4' => '4',
	   ),
   ));

   // Add a setting for the number of products per page
   $wp_customize->add_setting('classic_tour_booking_products_per_page', array(
	  'default'   => '9',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'classic_tour_booking_sanitize_integer'
   ));
   $wp_customize->add_control('classic_tour_booking_products_per_page', array(
	  'label'    => __('Woo Products Per Page', 'classic-tour-booking'),
	  'section'  => 'classic_tour_booking_woocommerce_page_settings',
	  'settings' => 'classic_tour_booking_products_per_page',
	  'type'     => 'number',
	  'input_attrs' => array(
		 'min'  => 1,
		 'step' => 1,
	 ),
   ));
   	


	//Theme Options
	$wp_customize->add_panel( 'classic_tour_booking_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-tour-booking' ),
	) );
	
	//Site Layout Section
	$wp_customize->add_section('classic_tour_booking_site_layoutsec',array(
		'title'	=> __('Manage Site Layout Section','classic-tour-booking'),
		'description' => __('<p class="sec-title">Manage Site Layout Section</p>','classic-tour-booking'),
		'priority'	=> 1,
		'panel' => 'classic_tour_booking_panel_area',
	));		
	
	$wp_customize->add_setting('classic_tour_booking_box_layout',array(
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));	 
	$wp_customize->add_control( 'classic_tour_booking_box_layout', array(
	   'section'   => 'classic_tour_booking_site_layoutsec',
	   'label'	=> __('Check to Box Layout','classic-tour-booking'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_tour_booking_preloader',array(
		'default' => true,
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));	 
	$wp_customize->add_control( 'classic_tour_booking_preloader', array(
	   'section'   => 'classic_tour_booking_site_layoutsec',
	   'label'	=> __('Check to show preloader','classic-tour-booking'),
	   'type'      => 'checkbox'
 	));
	 $wp_customize->add_setting( 'classic_tour_booking_layout_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_layout_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_site_layoutsec'
	));	

	$classic_tour_booking_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);	  
	    
	//Typography
	$wp_customize->add_section('classic_tour_booking_typography', array(
        'title' => __('Manage Typography Section', 'classic-tour-booking'),
		'description' => __('<p class="sec-title">Manage Typography Section</p>','classic-tour-booking'),
        'priority' => null,
		'panel' => 'classic_tour_booking_panel_area',
	));

	$wp_customize->add_setting('classic_tour_booking_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control(	'classic_tour_booking_body_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('Body Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));	  

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control(	'classic_tour_booking_paragraph_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('Paragraph Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));	

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control(	'classic_tour_booking_atag_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('"a" Tag Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));
	
	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control(	'classic_tour_booking_li_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('"li" Tag Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));	

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control('classic_tour_booking_h1_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('H1 Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));	

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control('classic_tour_booking_h2_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('H2 Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));	
	
	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control('classic_tour_booking_h3_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('H3 Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));		

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control('classic_tour_booking_h4_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('H4 Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));	

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control('classic_tour_booking_h5_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('H5 Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));	
	
	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('classic_tour_booking_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'classic_tour_booking_sanitize_choices',
	));
	$wp_customize->add_control('classic_tour_booking_h6_font_family', array(
		'section' => 'classic_tour_booking_typography',
		'label'   => __('H6 Fonts', 'classic-tour-booking'),
		'type'    => 'select',
		'choices' => $classic_tour_booking_font_array,
	));	

	$wp_customize->add_setting( 'classic_tour_booking_font_family_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_font_family_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_typography'
	));		
	
   //Global Color
    $wp_customize->add_section('classic_tour_booking_global_color', array(
	    'title'    => __('Manage Global Color Section', 'classic-tour-booking'),
	    'panel'    => 'classic_tour_booking_panel_area',
    ));
    $wp_customize->add_setting('classic_tour_booking_first_color', array(
        'default'           => '#112b38',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_tour_booking_first_color', array(
	  'label'    => __('Theme Color', 'classic-tour-booking'),
	  'section'  => 'classic_tour_booking_global_color',
	  'settings' => 'classic_tour_booking_first_color',
    )));	

    $wp_customize->add_setting('classic_tour_booking_second_color', array(
        'default'           => '#c34100',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_tour_booking_second_color', array(
	  'label'    => __('Theme Color', 'classic-tour-booking'),
	  'section'  => 'classic_tour_booking_global_color',
	  'settings' => 'classic_tour_booking_second_color',
    )));		
	
	$wp_customize->add_setting( 'classic_tour_booking_global_color_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_global_color_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_global_color'
	));

 	// Header Section
	$wp_customize->add_section('classic_tour_booking_header_section', array(
        'title' => __('Manage Header Section', 'classic-tour-booking'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','classic-tour-booking'),
        'priority' => null,
		'panel' => 'classic_tour_booking_panel_area',
 	));

	$wp_customize->add_setting('classic_tour_booking_top_bar',array(
		'default' => false,
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));	 
	$wp_customize->add_control( 'classic_tour_booking_top_bar', array(
	   'section'   => 'classic_tour_booking_header_section',
	   'label'	=> __('Check to show Top Bar','classic-tour-booking'),
	   'type'      => 'checkbox'
 	)); 

 	$wp_customize->add_setting('classic_tour_booking_contact_box',array(
		'default' => false,
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));	 
	$wp_customize->add_control( 'classic_tour_booking_contact_box', array(
	   'section'   => 'classic_tour_booking_header_section',
	   'label'	=> __('Check to show Top Contact Box','classic-tour-booking'),
	   'type'      => 'checkbox'
 	)); 

 	$wp_customize->add_setting('classic_tour_booking_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_tour_booking_stickyheader', array(
	   'section'   => 'classic_tour_booking_header_section',
	   'label'	=> __('Check To Show Sticky Header','classic-tour-booking'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_tour_booking_offer_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_offer_text', array(
	   'settings' => 'classic_tour_booking_offer_text',
	   'section'   => 'classic_tour_booking_header_section',
	   'label' => __('Add Top Header Text', 'classic-tour-booking'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_tour_booking_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'classic_tour_booking_sanitize_phone_number',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_phone_number', array(
	   'settings' => 'classic_tour_booking_phone_number',
	   'section'   => 'classic_tour_booking_header_section',
	   'label' => __('Add Phone Number', 'classic-tour-booking'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_tour_booking_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_email_address', array(
	   'settings' => 'classic_tour_booking_email_address',
	   'section'   => 'classic_tour_booking_header_section',
	   'label' => __('Add Email Address', 'classic-tour-booking'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_tour_booking_contact_us_text',array(
		'default' => 'SIGN UP',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_contact_us_text', array(
	   'settings' => 'classic_tour_booking_contact_us_text',
	   'section'   => 'classic_tour_booking_header_section',
	   'label' => __('Add Button Text', 'classic-tour-booking'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_tour_booking_contact_us_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_contact_us_url', array(
	   'settings' => 'classic_tour_booking_contact_us_url',
	   'section'   => 'classic_tour_booking_header_section',
	   'label' => __('Add Button URL', 'classic-tour-booking'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting( 'classic_tour_booking_header_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_header_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_header_section'
	));	

	// Social media Section
	$wp_customize->add_section('classic_tour_booking_social_media_section', array(
        'title' => __('Manage Social media Section', 'classic-tour-booking'),
		'description' => __('<p class="sec-title">Manage Social media Section</p>','classic-tour-booking'),
        'priority' => null,
		'panel' => 'classic_tour_booking_panel_area',
 	));

	$wp_customize->add_setting('classic_tour_booking_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_fb_link', array(
	   'settings' => 'classic_tour_booking_fb_link',
	   'section'   => 'classic_tour_booking_social_media_section',
	   'label' => __('Facebook Link', 'classic-tour-booking'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_tour_booking_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_insta_link', array(
	   'settings' => 'classic_tour_booking_insta_link',
	   'section'   => 'classic_tour_booking_social_media_section',
	   'label' => __('Instagram Link', 'classic-tour-booking'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_tour_booking_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_twitt_link', array(
	   'settings' => 'classic_tour_booking_twitt_link',
	   'section'   => 'classic_tour_booking_social_media_section',
	   'label' => __('Twitter Link', 'classic-tour-booking'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_tour_booking_pinterest_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_pinterest_link', array(
	   'settings' => 'classic_tour_booking_pinterest_link',
	   'section'   => 'classic_tour_booking_social_media_section',
	   'label' => __('Pinterest Link', 'classic-tour-booking'),
	   'type'      => 'url'
	));
	$wp_customize->add_setting( 'classic_tour_booking_media_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_media_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_social_media_section'
	));	

	// Home Category Dropdown Section
	$wp_customize->add_section('classic_tour_booking_one_cols_section',array(
		'title'	=> __('Manage Slider Section','classic-tour-booking'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1600 x 600).','classic-tour-booking'),
		'priority'	=> null,
		'panel' => 'classic_tour_booking_panel_area'
	));

	//Hide Section
	$wp_customize->add_setting('classic_tour_booking_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	$wp_customize->add_control( 'classic_tour_booking_hide_categorysec', array(
	   'settings' => 'classic_tour_booking_hide_categorysec',
	   'section'   => 'classic_tour_booking_one_cols_section',
	   'label'     => __('Check To Enable This Section','classic-tour-booking'),
	   'type'      => 'checkbox'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'classic_tour_booking_slidersection', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Classic_Tour_Booking_Category_Dropdown_Custom_Control( $wp_customize, 'classic_tour_booking_slidersection', array(
		'section' => 'classic_tour_booking_one_cols_section',
	   'label' => __('Select Category to display Slider', 'classic-tour-booking'),
		'settings'   => 'classic_tour_booking_slidersection',
	) ) );

	$wp_customize->add_setting('classic_tour_booking_slider_top_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_slider_top_text',array(
		'label'	=> esc_html__('Add Top Slider Text','classic-tour-booking'),
		'section'=> 'classic_tour_booking_one_cols_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('classic_tour_booking_button_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_button_text', array(
	   'settings' => 'classic_tour_booking_button_text',
	   'section'   => 'classic_tour_booking_one_cols_section',
	   'label' => __('Add Button Text', 'classic-tour-booking'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_tour_booking_button_link_slider',array(
        'default'=> '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('classic_tour_booking_button_link_slider',array(
        'label' => esc_html__('Add Button Link','classic-tour-booking'),
        'section'=> 'classic_tour_booking_one_cols_section',
        'type'=> 'url'
    ));

    //Slider height
    $wp_customize->add_setting('classic_tour_booking_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('classic_tour_booking_slider_img_height',array(
        'label' => __('Slider Image Height','classic-tour-booking'),
        'description'   => __('Add the slider image height here (eg. 600px)','classic-tour-booking'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'classic-tour-booking' ),
        ),
        'section'=> 'classic_tour_booking_one_cols_section',
        'type'=> 'text'
    ));
	$wp_customize->add_setting( 'classic_tour_booking_slider_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_slider_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_one_cols_section'
	));	

	// blog Section
	$wp_customize->add_section('classic_tour_booking_below_slider_section', array(
		'title'	=> __('Manage Popular Destinations Section','classic-tour-booking'),
		'description'	=> __('<p class="sec-title">Manage Blog Section</p> Select Pages from the dropdown for Blog.','classic-tour-booking'),
		'priority'	=> null,
		'panel' => 'classic_tour_booking_panel_area',
	));

	$wp_customize->add_setting('classic_tour_booking_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_disabled_pgboxes', array(
	   'settings' => 'classic_tour_booking_disabled_pgboxes',
	   'section'   => 'classic_tour_booking_below_slider_section',
	   'label'     => __('Check To Enable This Section','classic-tour-booking'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_tour_booking_headingtext_para',array(
		'default' => ' ',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_tour_booking_headingtext_para', array(
	   'settings' => 'classic_tour_booking_headingtext_para',
	   'section'   => 'classic_tour_booking_below_slider_section',
	   'label' => __('Add Heading', 'classic-tour-booking'),
	   'type'      => 'text'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'classic_tour_booking_blog_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Classic_Tour_Booking_Category_Dropdown_Custom_Control( $wp_customize, 'classic_tour_booking_blog_cat', array(
		'section' => 'classic_tour_booking_below_slider_section',
		'label' => __('Select Category to display Venus', 'classic-tour-booking'),
		'settings'   => 'classic_tour_booking_blog_cat',
	) ) );

	$wp_customize->add_setting( 'classic_tour_booking_destination_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_destination_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_below_slider_section'
	));	

	//Blog post
	$wp_customize->add_section('classic_tour_booking_blog_post_settings',array(
        'title' => __('Manage Post Section', 'classic-tour-booking'),
        'priority' => null,
        'panel' => 'classic_tour_booking_panel_area'
    ) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('classic_tour_booking_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'classic_tour_booking_sanitize_choices'
	));
	$wp_customize->add_control('classic_tour_booking_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'classic-tour-booking'),
     'description'   => __('This option work for blog page, archive page and search page.', 'classic-tour-booking'),
     'section' => 'classic_tour_booking_blog_post_settings',
     'choices' => array(
         'full' => __('Full','classic-tour-booking'),
         'left' => __('Left','classic-tour-booking'),
         'right' => __('Right','classic-tour-booking'),
         'three-column' => __('Three Columns','classic-tour-booking'),
         'four-column' => __('Four Columns','classic-tour-booking'),
         'grid' => __('Grid Layout','classic-tour-booking')
     ),
	) );

	$wp_customize->add_setting('classic_tour_booking_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'classic_tour_booking_sanitize_choices'
	));
	$wp_customize->add_control('classic_tour_booking_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','classic-tour-booking'),
        'section' => 'classic_tour_booking_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','classic-tour-booking'),
            'Excerpt Content' => __('Excerpt Content','classic-tour-booking'),
            'Full Content' => __('Full Content','classic-tour-booking'),
        ),
	) );

	$wp_customize->add_setting('classic_tour_booking_blog_post_thumb',array(
        'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('classic_tour_booking_blog_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Show / Hide Blog Post Thumbnail', 'classic-tour-booking'),
        'section'     => 'classic_tour_booking_blog_post_settings',
    ));

    $wp_customize->add_setting( 'classic_tour_booking_blog_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'classic_tour_booking_sanitize_integer'
    ) );
    $wp_customize->add_control(new classic_tour_booking_Slider_Custom_Control( $wp_customize, 'classic_tour_booking_blog_post_page_image_box_shadow',array(
		'label'	=> esc_html__('Blog Page Image Box Shadow','classic-tour-booking'),
		'section'=> 'classic_tour_booking_blog_post_settings',
		'settings'=>'classic_tour_booking_blog_post_page_image_box_shadow',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));

	$wp_customize->add_setting( 'classic_tour_booking_post_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_post_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_blog_post_settings'
	));	

	// Footer Section 
	$wp_customize->add_section('classic_tour_booking_footer', array(
		'title'	=> __('Mange Footer Section','classic-tour-booking'),
        'description' => __('<p class="sec-title">Manage Footer Section</p>','classic-tour-booking'),
		'priority'	=> null,
		'panel' => 'classic_tour_booking_panel_area',
	));

	$wp_customize->add_setting('classic_tour_booking_footer_widget', array(
	    'default' => true,
	    'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));
	$wp_customize->add_control('classic_tour_booking_footer_widget', array(
	    'settings' => 'classic_tour_booking_footer_widget', // Corrected setting name
	    'section'   => 'classic_tour_booking_footer',
	    'label'     => __('Check to Enable Footer Widget', 'classic-tour-booking'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('classic_tour_booking_footer_bg_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'classic_tour_booking_footer_bg_color', array(
        'label'    => __('Footer Background Color', 'classic-tour-booking'),
        'section'  => 'classic_tour_booking_footer',
    )));

	$wp_customize->add_setting('classic_tour_booking_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'classic_tour_booking_footer_bg_image',array(
        'label' => __('Footer Background Image','classic-tour-booking'),
        'section' => 'classic_tour_booking_footer',
    )));

	$wp_customize->add_setting('classic_tour_booking_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'classic_tour_booking_copyright_line', array(
	   'section' 	=> 'classic_tour_booking_footer',
	   'label'	 	=> __('Copyright Line','classic-tour-booking'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('classic_tour_booking_copyright_link',array(
    	'default' => 'https://www.theclassictemplates.com/products/free-tour-wordpress-theme',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_tour_booking_copyright_link', array(
	   'section' 	=> 'classic_tour_booking_footer',
	   'label'	 	=> __('Link','classic-tour-booking'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('classic_tour_booking_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'classic_tour_booking_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'classic-tour-booking' ),
        'section'        => 'classic_tour_booking_footer',
        'settings'       => 'classic_tour_booking_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('classic_tour_booking_scroll_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'classic_tour_booking_sanitize_choices'
    ));
    $wp_customize->add_control('classic_tour_booking_scroll_position',array(
        'type' => 'radio',
        'section' => 'classic_tour_booking_footer',
        'label'	 	=> __('Scroll To Top Positions','classic-tour-booking'),
        'choices' => array(
            'Right' => __('Right','classic-tour-booking'),
            'Left' => __('Left','classic-tour-booking'),
            'Center' => __('Center','classic-tour-booking')
        ),
    ) );

	$wp_customize->add_setting( 'classic_tour_booking_social_settings_upgraded_features',array(
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('classic_tour_booking_social_settings_upgraded_features', array(
		'type'=> 'hidden',
		'description' => "<span class='customizer-upgraded-features'>Unlock Premium Customization Features:
			<a target='_blank' href='". esc_url(CLASSIC_TOUR_BOOKING_PREMIUM_PAGE) ." '>Upgrade to Pro</a></span>",
		'section' => 'classic_tour_booking_footer'
	));	

    // Google Fonts
    $wp_customize->add_section( 'classic_tour_booking_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'classic-tour-booking' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Jockey One:' => 'Jockey One',
		'Inter:100,200,300,400,500,600,700,800,900' => 'Inter',
		'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i:' => 'Montserrat',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'classic_tour_booking_headings_fonts', array(
		'sanitize_callback' => 'classic_tour_booking_sanitize_fonts',
	));
	$wp_customize->add_control( 'classic_tour_booking_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'classic-tour-booking'),
		'section' => 'classic_tour_booking_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'classic_tour_booking_body_fonts', array(
		'sanitize_callback' => 'classic_tour_booking_sanitize_fonts'
	));
	$wp_customize->add_control( 'classic_tour_booking_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'classic-tour-booking' ),
		'section' => 'classic_tour_booking_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting('classic_tour_booking_woocommerce_sidebar_shop',array(
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_tour_booking_woocommerce_sidebar_shop', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from shop page.','classic-tour-booking'),
	   'label'	=> __('Shop Page Sidebar layout','classic-tour-booking'),
	   'type'      => 'checkbox'
 	));

	$wp_customize->add_setting('classic_tour_booking_woocommerce_sidebar_product',array(
		'sanitize_callback' => 'classic_tour_booking_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_tour_booking_woocommerce_sidebar_product', array(
	   'section'   => 'woocommerce_product_catalog',
	   'description'  => __('Click on the check box to remove sidebar from product page.','classic-tour-booking'),
	   'label'	=> __('Product Page Sidebar layout','classic-tour-booking'),
	   'type'      => 'checkbox'
 	));

}
add_action( 'customize_register', 'classic_tour_booking_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_tour_booking_customize_preview_js() {
	wp_enqueue_script( 'classic_tour_booking_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_tour_booking_customize_preview_js' );