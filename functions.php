<?php
/**
 * Lingonberry functions and definitions
 *
 * @package Lingonberry
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 612; /* pixels */
	
if ( ! function_exists( 'lingonberry_setup' ) ) :

function lingonberry_content_width() {
	global $content_width;
	
	if ( is_single() || is_page() )
		$content_width = 712;
}
add_action( 'template_redirect', 'lingonberry_content_width' );
	
endif;

if ( ! function_exists( 'lingonberry_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function lingonberry_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Lingonberry, use a find and replace
	 * to change 'lingonberry' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lingonberry', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 */
	 add_theme_support( 'post-thumbnails' );
	 add_image_size( 'lingonberry-post-image', 712, 9999 );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Location', 'lingonberry' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'link', 'quote', 'audio', 'chat', 'gallery', 'status' ) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'gallery', 'caption',
	) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'lingonberry_custom_background_args', array(
		'default-color' => 'f1f1f1',
		'default-image' => '',
	) ) );
}
endif; // lingonberry_setup
add_action( 'after_setup_theme', 'lingonberry_setup' );


/**
 * Register widgetized area and update sidebar with default widgets
 */
function lingonberry_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'lingonberry' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widgets %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'lingonberry' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widgets %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'lingonberry' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widgets %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'lingonberry_widgets_init' );
/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Lato and Raleway by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function lingonberry_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lato = _x( 'on', 'Lato font: on or off', 'lingonberry' );

	/* Translators: If there are characters in your language that are not
	 * supported by Raleway, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$raleway = _x( 'on', 'Raleway font: on or off', 'lingonberry' );

	if ( 'off' !== $lato || 'off' !== $raleway ) {
		$font_families = array();

		if ( 'off' !== $lato )
			$font_families[] = 'Lato:400,400italic,700,700italic';

		if ( 'off' !== $raleway )
			$font_families[] = 'Raleway:400,500,600';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}


/**
 * Enqueue scripts and styles
 */
function lingonberry_scripts() {
	wp_enqueue_style( 'lingonberry-style', get_stylesheet_uri() );

	// Add Lato and Raleway fonts, used in the main stylesheet.
	wp_enqueue_style( 'lingonberry-fonts', lingonberry_fonts_url(), array(), null );
	
	wp_enqueue_script( 'lingonberry-global', get_template_directory_uri() . '/js/global.js', array( 'jquery' ), '', true  );
	
	wp_enqueue_script( 'lingonberry-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lingonberry_scripts' );

/**
 * Replaces the excerpt "more" text with a link
 */
function lingonberry_excerpt_more( $more ) {
	global $post;
	return '<a class="more-link" href="'. esc_url( get_permalink( $post->ID ) ) . '">&ellipsis;' . __( 'Read the full post &raquo;', 'lingonberry' ) . '</a>';
}
add_filter( 'excerpt_more', 'lingonberry_excerpt_more' );

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



// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';


function cemeteryjs_editor_scripts() {
	if(is_page('editor')) {
		wp_enqueue_style( 'editor_bundle_css', get_template_directory_uri() . '/libs/editor/cemeteryjs-bundle.css', null);
		wp_enqueue_script( 'editor_bundle_js', get_template_directory_uri() . '/libs/editor/cemeteryjs-bundle.js', array(), null, true);
		wp_enqueue_script( 'editor_init_js', get_template_directory_uri() . '/libs/editor/cemeteryjs-init.js', array('editor_bundle_js'), null, true);
	}
} 

add_action('wp_enqueue_scripts', 'cemeteryjs_editor_scripts');