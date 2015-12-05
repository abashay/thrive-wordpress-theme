<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<section class="banner">

		<a href="/">

			<div class="banner__hero">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/banner.jpg" alt="" />
			</div>

			<div class="banner__overlay">

				<div class="banner__overlay__text">

					<h1>4 OH 4</h1>

					<p>Oh no! This page cannot be found.</p>

				</div>

			</div>

		</a>

	</section>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="post__content main_content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen' ); ?></p>
				<?php get_search_form(); ?>
			</section><!-- .page-content -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
