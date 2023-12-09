<?php
/**
 * Newman Tactical functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Newman_Tactical
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function newman_tactical_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Newman Tactical, use a find and replace
		* to change 'newman-tactical' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'newman-tactical', get_template_directory() . '/languages' );

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
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'product-thumbnail', 330, 413, false );
	add_image_size( 'category-thumbnail', 600, 600, true );
	add_image_size( 'banner-image', 1920, 720, true );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'newman-tactical' ),
			'menu-2' => esc_html__( 'Footer Menu', 'newman-tactical' ),
			'menu-3' => esc_html__( 'Policies Menu', 'newman-tactical' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'newman_tactical_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'newman_tactical_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newman_tactical_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newman_tactical_content_width', 640 );
}
add_action( 'after_setup_theme', 'newman_tactical_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newman_tactical_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'newman-tactical' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'newman-tactical' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'newman_tactical_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function newman_tactical_scripts() {
	wp_enqueue_style( 'newman-tactical-aos', '//cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array(), _S_VERSION );
	wp_enqueue_style( 'newman-tactical-bs', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'newman-tactical-font-body', '//fonts.googleapis.com/css2?family=Questrial&display=swap', array(), _S_VERSION );
	wp_enqueue_style( 'newman-tactical-font-icons', '//cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'newman-tactical-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'newman-tactical-style', 'rtl', 'replace' );

	wp_enqueue_script( 'newman-tactical-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'newman-tactical-parallax', get_template_directory_uri() . '/js/parallax.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'newman-tactical-gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'newman-tactical-theme', get_template_directory_uri() . '/js/theme.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newman_tactical_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

require get_template_directory() . '/inc/custom-hooks.php';