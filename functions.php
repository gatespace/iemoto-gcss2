<?php
/**
 * Iemoto GroundworkCSS 2 functions and definitions
 *
 * @package Iemoto GroundworkCSS 2
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'iemoto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function iemoto_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Iemoto GroundworkCSS 2, use a find and replace
	 * to change 'iemoto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'iemoto', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'iemoto' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'iemoto_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // iemoto_setup
add_action( 'after_setup_theme', 'iemoto_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function iemoto_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'iemoto' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'iemoto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function iemoto_scripts() {

	$iemoto_theme_data = wp_get_theme();
	$iemoto_theme_ver  = $iemoto_theme_data->get( 'Version' );

	$iemoto_stylesheet = get_stylesheet_uri();

	if ( defined( 'WP_DEBUG' ) && ( WP_DEBUG == true ) ) { // WP_DEBUG = ture
		$iemoto_stylesheet = get_template_directory_uri() . '/css/style.css';
	}

	wp_enqueue_style(
		'iemoto-style',
		$iemoto_stylesheet,
		array(),
		$iemoto_theme_ver
	);

	// Modernizr
	wp_enqueue_script(
		'modernizr',
		get_template_directory_uri() . '/js/libs/modernizr.js',
		array(),
		'v2.8.3',
		false
	);

	// Groundwork js
	wp_enqueue_script(
		'groundwork',
		get_template_directory_uri() . '/js/libs/groundwork.all.js',
		array('jquery'),
		'2.5.0',
		true
	);

	wp_enqueue_script(
		'iemoto-skip-link-focus-fix',
		get_template_directory_uri() . '/js/skip-link-focus-fix.js',
		array(),
		'20130115',
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		'iemoto-script',
		get_stylesheet_directory_uri() . '/js/iemoto-groundworkcss-2.js',
		array('groundwork'),
		$iemoto_theme_ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'iemoto_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
