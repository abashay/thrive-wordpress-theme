<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();

$bannerimage = get_template_directory_uri() . '/assets/young-achievers-dinner-2013.jpg';

?>

	<section class="banner banner--post banner--400">

		<div class="banner__main">

		    <div class="banner__hero">
		        <img src="<?php echo $bannerimage; ?>" alt="" />
		    </div>

		    <div class="banner__overlay">

		        <div class="banner__overlay__text">

		            <h1>Search...</h1>

		            <p><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></p>

		        </div>

		    </div>

	    </div>

	</section>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'postsnippet' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php get_footer(); ?>
