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

include_once('post_theme_settings.php');

$GLOBALS['general_image'] = get_template_directory_uri() . '/assets/banner_sq.jpg';



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

	// Allow poges to have excerpts
	add_post_type_support('page', 'excerpt');

	// Navigation across the site...
	register_nav_menus( array(
		'primary' => 'Banner navigation',
		'about-nav' => 'About sidebar',
		'footer-a' => 'Footer (alpha)',
		'footer-b' => 'Footer (beta)'
	) );

	// Support HTML features
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );


	$team_labels = array(
		'name' 			=> 'Team Members',
		'singular_name' => 'Team Member',
		'menu_name' 	=> 'Thrive Team',
		'add_new_item'	=> 'Add new team member',
		'edit_item'		=> 'Edit team member',
		'new_item' 		=> 'New team member',
		'not_found' 	=> 'No team members found'
	);

	$endorsement_labels = array(
		'name' 			=> 'Endorsements',
		'singular_name' => 'Endorsement',
		'menu_name' 	=> 'Endorsements',
		'add_new_item'	=> 'Add new endorsement',
		'edit_item'		=> 'Edit endorsement',
		'new_item' 		=> 'New endorsement',
		'not_found' 	=> 'No endorsement added'
	);

	register_post_type(
		'thrive_team',
		array(
			'labels' => $team_labels,
			'rewrite' => array( 'slug' => 'team-member' ),
			'has_archive' => false,
			'exclude_from_search' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
			'public' => false,
			'publicly_queryable' => false,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'menu_icon' => 'dashicons-groups',
		)
	);
  	register_taxonomy( 'team_tags', 'thrive_team', array() );

	register_post_type(
		'thrive_endorsement',
		array(
			'labels' => $endorsement_labels,
			'rewrite' => array( 'slug' => 'endorsements' ),
			'has_archive' => false,
			'exclude_from_search' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => false,
			'publicly_queryable' => false,
			'show_ui' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'menu_icon' => 'dashicons-testimonial',
		)
	);
  	register_taxonomy( 'endorsement_tags', 'thrive_endorsement', array() );

}
endif;
add_action( 'after_setup_theme', 'thrive_setup' );

// Override default behaviour when returning category title
add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( 'Stories: ', false );
    }
    return $title;
});

/**
 * Enqueue scripts and styles.
 */
function thrive_styles_and_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'thrive-style', get_stylesheet_uri() );

	// Load javacript into the footer.
	wp_enqueue_script( 'thrive-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true);


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

	return '
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


function thrive_get_subpages($atts) {

	// Set up some default values
	$a = shortcode_atts( array(
		'parent' => null,
		'cover' => false,
        'width' => '50',
    ), $atts );

	if (!isset($atts['parent'])) {
		// Should be accessed via the loop so functions like `the_id()` will work
		$atts['parent'] = get_the_id();
	}

	$args = array(
        'post_type'      => 'page',
        'post_parent'    => $atts['parent'],
        'order'          => 'ASC',
        'orderby'        => 'menu_order',
        'meta_query' => array(
            array(
                'key' => 'hide-from-nav',
                'compare' => 'NOT EXISTS'
            ),
        )
     );

    $children = new WP_Query( $args );
	return thrive_return_post_infobox( $children->posts, $atts );

}
add_shortcode( 'infobox_subpages', 'thrive_get_subpages' );


function thrive_get_posts($atts) {
	// Set up some default values
	$a = shortcode_atts( array(
		'category' => 'news-and-updates',
		'count' => 3,
        'width' => '50',
    ), $atts );

	$args = array(
		'posts_per_page' => $atts['count'],
		'category_name'	 => $atts['category'],
        'post_type'      => 'post',
        'orderby'        => 'date',
		'order'          => 'DESC',
		'post_status'    => 'publish'
     );

	return thrive_return_post_infobox( get_posts( $args ), $atts );
}
add_shortcode( 'infobox_posts', 'thrive_get_posts' );


function thrive_get_endorsements($atts) {

	// Set up some default values
	$a = shortcode_atts( array(
        'width' => '50',
    ), $atts );


	$args = array(
        'post_type'     => 'thrive_endorsement',
        'sort_column' 	=> 'menu_order',
        'orderby'		=> 'rand',
		'post_status'   => 'publish',
		'posts_per_page'=> 1
     );

    if (isset($atts['team'])) {
    	$args['team_tags'] = $atts['team'];
    }

    $endorsement = get_posts( $args );

    $output = '<div class="break-site-padding">';
	foreach ($endorsement as $post) {

		$classes = "infobox infobox--endorsement infobox--" . $atts['width'];

		$output .= sprintf('<div class="%s">', $classes);
		$output .= "<h1>What are people saying about us?</h1>";

		$output .= '<div class="infobox__content">';

		if ( has_post_thumbnail($post->ID) ) {
			$thumb_id = get_post_thumbnail_id($post->ID);
			$endorsement_img = wp_get_attachment_image_src($thumb_id, 'square--large', false);
			$output .= sprintf('<div class="infobox--endorsement__roundedimg"><img src="%s" alt="" /></div>', $endorsement_img[0]);
		}

		$output .= sprintf('<p>%s</p><h2>%s</h2>', $post->post_content, str_replace(', ','<br />', $post->post_title));
		$output .= '</div></div>';

	}
	$output .= '</div>';
	return $output;

}
add_shortcode( 'infobox_endorsements', 'thrive_get_endorsements' );


function thrive_return_post_infobox($wp_array, $atts){
    // TODO: This duplicates other code. DRY THIS OUT
	$output = '<div class="break-site-padding">';
	foreach ($wp_array as $post) {
        $highlight_color = get_post_meta( $post->ID, 'thrive_highlight_color', true);
		$classes = "infobox infobox--" . $atts['width'] . " infobox--".$highlight_color;
		if (isset($atts['cover'])) {
			$classes .= " infobox--cover";
		}

		$output .= sprintf('<div class="%s"><a href="%s">', $classes, get_page_link( $post->ID ));

		if ( has_post_thumbnail($post->ID) ) {
			$thumb_id = get_post_thumbnail_id($post->ID);
			$output .= thrive_infobox_picture($thumb_id);
		}

		$output .= sprintf('<div class="infobox__content"><h2>%s</h2></div>', $post->post_title);
		$output .= '</a></div>';

	}
	$output .= '</div>';
	return $output;
}


function thrive_get_project_team($atts) {

	$a = shortcode_atts( array(
		'team' => null,
    ), $atts );

    $args = array(
        'post_type'     => 'thrive_team',
        'sort_column' 	=> 'menu_order',
        'order'			=> 'ASC',
		'post_status'   => 'publish'
     );

    if ($atts['team'] != null) {
    	$args['team_tags'] = $atts['team'];
    }

    $team_members = get_posts( $args );

    // Buffer the output...
    ob_start();
    include_once('templates/tpl_team.php');
    return ob_get_clean();
}
add_shortcode( 'thrive_team', 'thrive_get_project_team' );
