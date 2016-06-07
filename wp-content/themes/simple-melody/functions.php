<?php
/**
 * Simple Melody functions and definitions
 *
 * @package Simple Melody
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'simple_melody_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simple_melody_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Simple Melody, use a find and replace
	 * to change 'simple-melody' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'simple-melody', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'featured-thumb-1', 900, 614, true ); // (cropped)
	add_image_size( 'featured-thumb-2', 450, 300, true ); // (cropped)
	add_image_size( 'post-feed-thumb', 605, 485, true ); // (cropped)
	add_image_size( 'post-thumb', 1200, 635, true ); // (cropped)
	add_image_size( 'post-homepage-thumb', 525, 575, true);
	add_image_size( 'melody-theme-logo', 99999, 99999, false);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'simple-melody' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'simple_melody_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Editor styles
	add_editor_style( array( 'editor-style.css', simple_melody_fonts_url() ) );
}
endif; // simple_melody_setup
add_action( 'after_setup_theme', 'simple_melody_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function simple_melody_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'simple-melody' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Left', 'simple-melody' ),
		'id'            => 'footer-widget-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Center', 'simple-melody' ),
		'id'            => 'footer-widget-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Right', 'simple-melody' ),
		'id'            => 'footer-widget-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'simple_melody_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simple_melody_scripts() {
	wp_enqueue_style( 'simple-melody-style', get_stylesheet_uri() );

	wp_enqueue_style( 'simple-melody-font-awesome-css', get_template_directory_uri() . "/inc/fontawesome/font-awesome.css", array(), '4.3.0', 'screen' );

	wp_enqueue_script( 'simple-melody-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'simple-melody-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'simple-melody-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20150706', true );

	wp_enqueue_script( 'simple-melody-sub-menu-toggle-script', get_template_directory_uri() . '/js/sub-menu-toggle.js', array('jquery'), '20150816', true );
	wp_localize_script( 'simple-melody-sub-menu-toggle-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'simple-melody' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'simple-melody' ) . '</span>',
	) );

	//Match height
	wp_enqueue_script( 'simple-melody-match-height', get_template_directory_uri() . '/js/jquery.matchHeight.js', array('jquery'), '20150530', true );
	wp_enqueue_script( 'simple-melody-home-script', get_template_directory_uri() . '/js/equal-height-script.js', array('jquery'), '20150530', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simple_melody_scripts' );

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
 * Load the Getting Started page and Theme Update class
 */
if( is_admin() ) {
	require_once( get_template_directory() . '/inc/admin/start-page/start-page.php' );
}

 /**
 *
 * Build Google font url based on
 * http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 */
function simple_melody_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
	$muli = _x( 'on', 'Muli font: on or off', 'simple-melody' );

	$libre = _x( 'on', 'Libre Baskerville font: on or off', 'simple-melody' );

	$lora = _x( 'on', 'Lora font: on or off', 'simple-melody' );

	if ( 'off' !== $muli ||  'off' !== $libre ||  'off' !== $lora ) {
		$font_families = array();

		if ( 'off' !== $muli ) {
			$font_families[] = 'Muli: 300, 400, 300italic';
		}

		if ( 'off' !== $libre) {
			$font_families[] = 'Libre Baskerville:400,700,400italic';
		}

		if ( 'off' !== $lora ) {
			$font_families[] = 'Lora:400italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue Google font on front end
 */
function simple_melody_scripts_styles() {
	wp_enqueue_style( 'simple-melody-fonts', simple_melody_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'simple_melody_scripts_styles' );


if ( ! function_exists( 'simple_melody_excerpt_more' ) && ! is_admin() ) :

/**
 *
 * Simple Melody read more 
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'read more' link.
 * @return string 'read more link
 *
 */
function simple_melody_excerpt_more( $more ) {
	$link = sprintf( '<p class="read-more-wrap"><a href="%1$s" class="read-more">%2$s &rarr;</a></p>',
			esc_url( get_permalink( get_the_ID() ) ), 
			sprintf( __( 'Read more %s', 'simple-melody' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return $link;
	}
add_filter( 'excerpt_more', 'simple_melody_excerpt_more' );
endif;


if ( ! function_exists( 'simple_melody_manual_excerpt' ) && ! is_admin() ) :

/**
 *
 * Simple Melody 'read more' link for manual excerpt 
 *
 */
function simple_melody_manual_excerpt($excerpt) {
  $excerpt_more = '';
  if( has_excerpt() ) {
    $excerpt_more = sprintf( '<p class="read-more-wrap"><a href="%1$s" class="read-more">%2$s &rarr;</a></p>',
			esc_url( get_permalink( get_the_ID() ) ), 
			sprintf( __( 'Read more %s', 'simple-melody' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
  }
  return $excerpt . $excerpt_more;
}
add_filter('get_the_excerpt', 'simple_melody_manual_excerpt');
endif;
