<?php
/**
 * Classic Tour Booking functions and definitions
 *
 * @package Classic Tour Booking
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'classic_tour_booking_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_tour_booking_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;

	load_theme_textdomain( 'classic-tour-booking', get_template_directory() . '/languages' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'classic-tour-booking' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // classic_tour_booking_setup
add_action( 'after_setup_theme', 'classic_tour_booking_setup' );

// breadcrumb
function classic_tour_booking_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function classic_tour_booking_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'classic-tour-booking' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-tour-booking' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'classic-tour-booking' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'classic-tour-booking' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'classic-tour-booking' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'classic-tour-booking' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'classic-tour-booking' ),
		'description'   => __( 'Appears on shop page', 'classic-tour-booking' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'classic-tour-booking' ),
		'description'   => __( 'Appears on footer', 'classic-tour-booking' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'classic-tour-booking' ),
		'description'   => __( 'Appears on footer', 'classic-tour-booking' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'classic-tour-booking' ),
		'description'   => __( 'Appears on footer', 'classic-tour-booking' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'classic-tour-booking' ),
		'description'   => __( 'Appears on footer', 'classic-tour-booking' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	register_sidebar(array(
        'name'          => __('Shop Sidebar', 'classic-tour-booking'),
        'description'   => __('Sidebar for WooCommerce shop pages', 'classic-tour-booking'),
		'id'            => 'woocommerce_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
	register_sidebar(array(
        'name'          => __('Single Product Sidebar', 'classic-tour-booking'),
        'description'   => __('Sidebar for single product pages', 'classic-tour-booking'),
		'id'            => 'woocommerce-single-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action( 'widgets_init', 'classic_tour_booking_widgets_init' );

// Change number of products per row to 3
add_filter('loop_shop_columns', 'classic_tour_booking_loop_columns');
if (!function_exists('classic_tour_booking_loop_columns')) {
    function classic_tour_booking_loop_columns() {
        $colm = get_theme_mod('classic_tour_booking_products_per_row', 3); // Default to 3 if not set
        return $colm;
    }
}

// Use the customizer setting to set the number of products per page
function classic_tour_booking_products_per_page($cols) {
    $cols = get_theme_mod('classic_tour_booking_products_per_page', 9); // Default to 9 if not set
    return $cols;
}
add_filter('loop_shop_per_page', 'classic_tour_booking_products_per_page', 9);

/* Theme Font URL */
function classic_tour_booking_font_url() {
	$font_family   = array(
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fjalla One',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
	 	'PT Serif:ital,wght@0,400;0,700;1,400;1,700',
	 	'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
	 	'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Alex Brush',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Playball',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Julius Sans One',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Slabo 13px',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Quicksand:wght@300;400;500;600;700',
		'Padauk:wght@400;700',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Pacifico',
		'Indie Flower',
		'VT323',
		'Dosis:wght@200;300;400;500;600;700;800',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Fjalla One',
		'Oxygen:wght@300;400;700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Lobster',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
		'Anton',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Bree Serif',
		'Gloria Hallelujah',
		'Abril Fatface',
		'Varela Round',
		'Vampiro One',
		'Shadows Into Light',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Francois One',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Acme',
		'Satisfy',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Architects Daughter',
		'Russo One',
		'Monda:wght@400;700',
		'Righteous',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Hammersmith One',
		'Courgette',
		'Permanent Marke',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Poiret One',
		'BenchNine:wght@300;400;700',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Handlee',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Cookie',
		'Chewy',
		'Great Vibes',
		'Coming Soon',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Days One',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Shrikhand',
		'Tangerine:wght@400;700',
		'IM Fell English SC',
		'Boogaloo',
		'Bangers',
		'Fredoka One',
		'Bad Script',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Shadows Into Light Two',
		'Marck Script',
		'Sacramento',
		'Unica One',
		'Dancing Script:wght@400;500;600;700',
		'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'DM Serif Display',
		'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700'
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

function classic_tour_booking_scripts() {

	wp_enqueue_style( 'classic-tour-booking-font', classic_tour_booking_font_url(), array() );

	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'classic-tour-booking-style', get_stylesheet_uri() );
	wp_style_add_data('classic-tour-booking-style', 'rtl', 'replace');
	wp_enqueue_style( 'classic-tour-booking-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'classic-tour-booking-default', esc_url(get_template_directory_uri())."/css/default.css" );

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'classic-tour-booking-style',$classic_tour_booking_color_scheme_css );
	
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'classic-tour-booking-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );

	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font-family
	$classic_tour_booking_headings_font = esc_html(get_theme_mod('classic_tour_booking_headings_fonts'));
	$classic_tour_booking_body_font = esc_html(get_theme_mod('classic_tour_booking_body_fonts'));

	// 	Body
	$classic_tour_booking_body_font = esc_html(get_theme_mod('classic_tour_booking_body_fonts'));

	// Paragraph
	$classic_tour_booking_paragraph_font_family = get_theme_mod('classic_tour_booking_paragraph_font_family', '');

	// "a" tag
	$classic_tour_booking_atag_font_family = get_theme_mod('classic_tour_booking_atag_font_family', '');

	// "li" tag
	$classic_tour_booking_li_font_family = get_theme_mod('classic_tour_booking_li_font_family', '');
	
	// H1
	$classic_tour_booking_h1_font_family = get_theme_mod('classic_tour_booking_h1_font_family', '');

	// H2
	$classic_tour_booking_h2_font_family = get_theme_mod('classic_tour_booking_h2_font_family', '');

	// H3
	$classic_tour_booking_h3_font_family = get_theme_mod('classic_tour_booking_h3_font_family', '');

	// H4
	$classic_tour_booking_h4_font_family = get_theme_mod('classic_tour_booking_h4_font_family', '');

	// H5
	$classic_tour_booking_h5_font_family = get_theme_mod('classic_tour_booking_h5_font_family', '');

	// H6
	$classic_tour_booking_h6_font_family = get_theme_mod('classic_tour_booking_h6_font_family', '');


	if ($classic_tour_booking_headings_font) {
	    wp_enqueue_style('jockey-one', 'https://fonts.googleapis.com/css?family=' . $classic_tour_booking_headings_font . '&display=swap');
	} else {
	    wp_enqueue_style('classic-tour-booking-headings-fonts', 'https://fonts.googleapis.com/css?family=Jockey+One&display=swap');
	}

	if ($classic_tour_booking_body_font) {
	    wp_enqueue_style('inter', 'https://fonts.googleapis.com/css?family=' . $classic_tour_booking_body_font . '&display=swap');
	} else {
	    wp_enqueue_style('classic-tour-booking-source-body', 'https://fonts.googleapis.com/css?family=Inter:100,200,300,400,500,600,700,800,900&display=swap');
	}
	// body
	$classic_tour_booking_body_font_family = get_theme_mod('classic_tour_booking_body_font_family', '');

	$classic_tour_booking_color_scheme_css = '
	body{
		font-family: '.esc_html($classic_tour_booking_body_font_family).';
	}
	p,span{
		font-family: '.esc_html($classic_tour_booking_paragraph_font_family).';
	}
	a{
		font-family: '.esc_html($classic_tour_booking_atag_font_family).';
	}
	li{
		font-family: '.esc_html($classic_tour_booking_li_font_family).';
	}
	h1{
		font-family: '.esc_html($classic_tour_booking_h1_font_family).'!important;
	}
	h2{
		font-family: '.esc_html($classic_tour_booking_h2_font_family).'!important;
	}
	h3{
		font-family: '.esc_html($classic_tour_booking_h3_font_family).'!important;
	}
	h4{
		font-family: '.esc_html($classic_tour_booking_h4_font_family).'!important;
	}
	h5{
		font-family: '.esc_html($classic_tour_booking_h5_font_family).'!important;
	}
	h6{
		font-family: '.esc_html($classic_tour_booking_h6_font_family).'!important;
	}
	';
	wp_add_inline_style('classic-tour-booking-style', $classic_tour_booking_color_scheme_css);
}
add_action( 'wp_enqueue_scripts', 'classic_tour_booking_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';


// select
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

// links
if ( ! defined( 'CLASSIC_TOUR_BOOKING_THEME_PAGE' ) ) {
define('CLASSIC_TOUR_BOOKING_THEME_PAGE',__('https://www.theclassictemplates.com/collections/best-wordpress-templates','classic-tour-booking'));
}
if ( ! defined( 'CLASSIC_TOUR_BOOKING_SUPPORT' ) ) {
define('CLASSIC_TOUR_BOOKING_SUPPORT',__('https://wordpress.org/support/theme/classic-tour-booking','classic-tour-booking'));
}
if ( ! defined( 'CLASSIC_TOUR_BOOKING_REVIEW' ) ) {
define('CLASSIC_TOUR_BOOKING_REVIEW',__('https://wordpress.org/support/theme/classic-tour-booking/reviews/#new-post','classic-tour-booking'));
}
if ( ! defined( 'CLASSIC_TOUR_BOOKING_PRO_DEMO' ) ) {
define('CLASSIC_TOUR_BOOKING_PRO_DEMO',__('https://live.theclassictemplates.com/classic-tour-booking-pro/','classic-tour-booking'));
}
if ( ! defined( 'CLASSIC_TOUR_BOOKING_PREMIUM_PAGE' ) ) {
define('CLASSIC_TOUR_BOOKING_PREMIUM_PAGE',__('https://www.theclassictemplates.com/products/travel-tour-wordpress-theme','classic-tour-booking'));
}
if ( ! defined( 'CLASSIC_TOUR_BOOKING_THEME_DOCUMENTATION' ) ) {
define('CLASSIC_TOUR_BOOKING_THEME_DOCUMENTATION',__('https://live.theclassictemplates.com/demo/docs/classic-tour-booking-free/','classic-tour-booking'));
}

/* Starter Content */
add_theme_support( 'starter-content', array(
	'widgets' => array(
		'footer-1' => array(
			'categories',
		),
		'footer-2' => array(
			'archives',
		),
		'footer-3' => array(
			'meta',
		),
		'footer-4' => array(
			'search',
		),
	),
));

// logo
if ( ! function_exists( 'classic_tour_booking_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function classic_tour_booking_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

// product sidebar
$classic_tour_booking_woocommerce_sidebar = get_theme_mod( 'classic_tour_booking_woocommerce_sidebar_product' );
	if ( 'false' == $classic_tour_booking_woocommerce_sidebar ) {
$classic_tour_booking_woo_product_column = 'col-lg-12 col-md-12';
	} else {
$classic_tour_booking_woo_product_column = 'col-lg-9 col-md-9';
}

$classic_tour_booking_woocommerce_shop_sidebar = get_theme_mod( 'classic_tour_booking_woocommerce_sidebar_shop' );
	if ( 'false' == $classic_tour_booking_woocommerce_shop_sidebar ) {
$classic_tour_booking_woo_shop_column = 'col-lg-12 col-md-12';
	} else {
$classic_tour_booking_woo_shop_column = 'col-lg-9 col-md-9';
}
