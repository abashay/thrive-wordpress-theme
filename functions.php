<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'thrive_setup' ) ) :
// Sets up theme defaults and registers support for various WordPress features.
function thrive_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let Wordpress handle the html title tag in the <head>
	add_theme_support( 'title-tag' );

	// Set thumbnail sizes
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	add_image_size( 'square--x-large', 850, 850, true );
	add_image_size( 'square--large', 600, 600, true );
	add_image_size( 'square--medium', 400, 400, true );
	add_image_size( 'square--small', 250, 250, true );
	add_image_size( 'square--x-small', 100, 100, true );

	// Navigation across the site...
	register_nav_menus( array(
		'primary' => 'Banner navigation',
		'footer-a' => 'Footer (alpha)',
		'footer-b' => 'Footer (beta)'
	) );

	// Support HTML features
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	//add_theme_support( 'post-formats', array(
	//	'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	//) );

}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'thrive_setup' );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function thrive_styles_and_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'thrive-style', get_stylesheet_uri() );


}
add_action( 'wp_enqueue_scripts', 'thrive_styles_and_scripts' );

/*
 * Returns top (x) featured posts
 */
function thrive_featured_posts($count = 1) {
	$args = array(
		'posts_per_page' => $count,
		'meta_query' => array(
			array(
				'key' => 'featured',
				'value' => True
			)
		)
	);
	return get_posts( $args );
}


/*
 * Echos a picture element for an infobox
 */
function thrive_infobox_picture($media_id) {
	$xlarge = wp_get_attachment_image_src($media_id, 'square--x-large', false);
	$large = wp_get_attachment_image_src($media_id, 'square--large', false);
	$small = wp_get_attachment_image_src($media_id, 'square--small', false);

	echo '
		<picture>
			<!--[if IE 9]><video style="display: none;"><![endif]-->
			<source srcset="' . $xlarge[0] . '" media="(min-width: 1000px)">
			<source srcset="' . $large[0] . '" media="(min-width: 800px)">
			<source srcset="' . $small[0] . '" media="(min-width: 400px)">
			<!--[if IE 9]></video><![endif]-->
			<img src="' . $small[0] . '" alt="" />
		</picture>
	';
}
