<?php
/**
 * _s functions and definitions
 *
 * @package _s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_s' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {

	global $is_IE;

	$version = '1.0.0';

	/**
	 * Should we load minified scripts? Also enqueue live reload to allow for extensionless reloading.
	 */
	$minnified = '.min';
	if ( defined( 'SCRIPT_DBEUG' ) && SCRIPT_DBEUG == true ) {

		$minnified = '';
		wp_enqueue_script( 'live-reload', '//localhost:35729/livereload.js', array(), $version, true );

	}

	wp_register_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css', array(), null );
	wp_enqueue_style( 'font-awesome' );

	wp_enqueue_style( '_s-style', get_stylesheet_directory_uri() . '/style' . $minnified . '.css' );

	wp_enqueue_script( '_s-project', get_template_directory_uri() . '/js/project' . $minnified . '.js', array('jquery'), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * WebDevStudios still supports IE8. Enqueue files to help make our job easier.
	 */
	if ( $is_IE ) {

		$GLOBALS['wp_scripts']->add_data( 'html5shiv', 'conditional', 'lte IE 9' );
		wp_enqueue_script( 'html5shiv', '//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js', null, $version, false );

		$GLOBALS['wp_scripts']->add_data( 'respond', 'conditional', 'lte IE 9' );
		wp_enqueue_script( 'respond', '//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js', null, $version, false );

		$GLOBALS['wp_scripts']->add_data( 'nwmatcher', 'conditional', 'lte IE 9' );
		wp_enqueue_script( 'nwmatcher', '//cdnjs.cloudflare.com/ajax/libs/nwmatcher/1.2.5/nwmatcher.min.js', null, $version, false );

		$GLOBALS['wp_scripts']->add_data( 'selectivizr', 'conditional', 'lte IE 9' );
		wp_enqueue_script( 'selectivizr','//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js', null, $version, false );

		$GLOBALS['wp_scripts']->add_data( 'placeholder', 'conditional', 'lte IE 9' );
		wp_enqueue_script( 'placeholder', '//cdnjs.cloudflare.com/ajax/libs/jquery-placeholder/2.0.7/jquery.placeholder.min.js', null, $version, false );

	}


}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

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
